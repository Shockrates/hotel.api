<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomSearchRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RoomController extends Controller
{
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

        //$data = $request->validated();

        $data = array_filter($request->validated());

        $queryArray = [];
        $bookingArr = [];

        // foreach ($data as $key => $value) {
        //     array_push($queryArray, [$key, $value]);
        // }

        if (!empty( $data['city'])) {
            array_push($queryArray, ['city', $data['city']]);
        }

        if (!empty( $data['type_id'])) {
            array_push($queryArray, ['type_id', $data['type_id']]);
        }

        if (!empty( $data['check_in_date']) && !empty( $data['check_out_date'])) {
      

            $bookings = Room::find(1)->bookings->where([
                ['check_in_date', '<=', $data['check_in_date']],
                ['check_out_date', '>=' ,$data['check_out_date']]
            ])->get();

            foreach ($bookings as $key => $value) {
                # code...$bookingArr
                array_push($bookingArr, $value->room_id);
            }
        }

        // $sql .= 'room_id NOT IN (
        //     SELECT room_id
        //     FROM booking
        //     WHERE check_in_date <= :checkOutDate AND check_out_date >= :checkInDate)';
     

        // return RoomResource::collection(
        //     Room::where($queryArray)->get()
        // );

        return $bookingArr;


    }



    
}
