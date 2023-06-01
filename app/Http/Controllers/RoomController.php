<?php

namespace App\Http\Controllers;

//Requests
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\RoomSearchRequest;
//Resources
use App\Http\Resources\BookingResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\RoomResource;
//Traits
use App\Http\Traits\HttpRequests;
use App\Http\Traits\HttpResponses;
//Models
use App\Models\Review;
use App\Models\Room;
//Libraries
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{

    use HttpRequests, HttpResponses;

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RoomResource::collection(
            Room::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
     * @return \Illuminate\Http\Resources\Json\JsonResource
     * 
     */
    public function show(Room $room)
    {
        return new RoomResource($room);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }

    /**
     * Display all Bookings associate with $room
     * 
     * @param \Illuminate\Database\Eloquent\Model $room
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllRoomBookings(Room $room){

        $bookings = $room->bookings;
        
        return BookingResource::collection($bookings);
        
    }

    /**
     * Display all Reviews associate with $room
     * 
     * @param \Illuminate\Database\Eloquent\Model $room
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllRoomReviews(Room $room){

        $reviews = $room->reviews;
        
        return ReviewResource::collection($reviews);
           
    }

    /**
     * Searches Rooms 
     * 
     * @param \App\Http\Requests\RoomSearchRequest  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function searchRoom(RoomSearchRequest $request)
    {
        
        $data = $this->roomSearchValidation($request);

        return RoomResource::collection(
            Room::whereDoesntHave('bookings', function ($query) use($data) {
                $query->where(
                    [
                        ['check_in_date', '<=', $data['check_out_date']],
                        ['check_out_date', '>=' ,$data['check_in_date']]
                    ]
                );
            })
            ->where($data['params'])
            ->get()
        );
    }

    /**
     *  Adds Room to Logged User Favorites
     * 
     * @param \Illuminate\Database\Eloquent\Model $room
     * @return \Illuminate\Http\JsonResponse
     * 
     */
    public function addTofavorite(Room $room){

        $favorites =  Auth::user()->favoriteRooms()->pluck('id')->toArray();

        if(in_array($room->id, $favorites)){
            return $this->onError(403,'Room already in favorites');
        }

        Auth::user()->favoriteRooms()->attach($room); 

        $favorites =  Auth::user()->favoriteRooms()->get(['name']);
        return $this->onSuccess($favorites, "{$room->name} added to favorites");
    }

    /**
     *  Removes Room from Logged User Favorites
     * 
     * @param \Illuminate\Database\Eloquent\Model $room
     * @return \Illuminate\Http\JsonResponse
     * 
     */
    public function removeFromFavorite(Room $room){

        $favorites =  Auth::user()->favoriteRooms()->pluck('id')->toArray();

        if(!in_array($room->id, $favorites)){
            return $this->onError(403,'This room is not in favorites');
        }

        Auth::user()->favoriteRooms()->detach($room); 

        $favorites =  Auth::user()->favoriteRooms()->get(['name']);
        return $this->onSuccess($favorites, "{$room->name} removed from favorites");
    }

    
 
}
