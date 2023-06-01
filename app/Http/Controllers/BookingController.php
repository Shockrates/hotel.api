<?php

namespace App\Http\Controllers;

//Requests
use App\Http\Requests\BookingStoreRequest;
//Resources
use App\Http\Resources\BookingResource;
//Traits
use App\Http\Traits\HttpRequests;
//Models
use App\Models\Booking;
use App\Models\Room;
//Libraries
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    use HttpRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookingResource::collection(
            Booking::where('user_id', Auth::user()->id)->get()
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
     * 
     * @param \App\Http\Requests\BookingStoreRequest  $request
     * @param \Illuminate\Database\Eloquent\Model $room
     * @return mixed
     */
    public function store(Room $room,BookingStoreRequest $request)
    {
        $data = $this->roomBookingValidation($request);

        if($room->isNotBooked($data['check_in_date'],$data['check_out_date'])){
            return DB::transaction(function() use ($room, $data){
                $booking = Booking::create([
                    "user_id" => Auth::user()->id,
                    "room_id" => $room->id,
                    "check_in_date" => $data['check_in_date'],
                    "check_out_date" => $data['check_out_date'],
                    "total_price" => $data['total_days']*$room->price
                ]);
        
                return $booking;
            });
        }

        return response()->json([
            'is free?' => $room->isNotBooked($data['check_in_date'],$data['check_out_date'] ),
            'total price' => $data['total_days']*$room->price
        ], 200);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
