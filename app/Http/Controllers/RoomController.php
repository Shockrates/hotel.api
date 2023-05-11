<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomSearchRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\RoomResource;
use App\Http\Traits\HttpRequests;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RoomController extends Controller
{

    use HttpRequests;
    /**
     * Display a listing of the resource.
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


    public function getAllRoomBookings(Room $room){

        $bookings = $room->bookings;
        
        return BookingResource::collection($bookings);
        
    }

    public function getAllRoomReviews(Room $room){

        $reviews = $room->reviews;
        
        return ReviewResource::collection($reviews);
           
    }

    public function searchRoom(RoomSearchRequest $request)
    {
        
        $data = $this->roomSearchRequest($request);

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
       
        // foreach ($data as $key => $value) {
        //     array_push($arr, [$key === $value]);
        // }
        // return $data;


    }



    
}
