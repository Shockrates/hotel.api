<?php

namespace App\Http\Traits;

//Requests
use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\RoomSearchRequest;
//Libraries
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

trait HttpRequests{

    protected function roomSearchValidation(RoomSearchRequest $request){
        
        //Validate Request and remove empty fields
        $data = $request->validated();

        $checkInDate = Carbon::parse($data['check_in_date'])->format('Y-m-d');
        unset($data['check_in_date']);
        $checkOutDate = Carbon::parse($data['check_out_date'])->format('Y-m-d');
        unset($data['check_out_date']);

        $queryArray = [];

        foreach ($data as $key => $value) {  
            
                switch ($key) {
                    case 'min_price':
                        array_push($queryArray, ['price', '>=', $data['min_price']]);
                        break;

                    case 'max_price':
                        array_push($queryArray, ['price', '<=', $data['max_price']]);
                        break;

                    default:
                        array_push($queryArray, [$key, $value]);  
                        break;
                }
                        
        }

        return ['check_in_date' => $checkInDate,
                'check_out_date' => $checkOutDate,
                'params'=>$queryArray];
    }

    protected function roomBookingValidation(BookingStoreRequest $request){

        //Validate Request and remove empty fields
        $data = $request->validated();

        $checkInDate = Carbon::parse($data['check_in_date']);
        $checkOutDate = Carbon::parse($data['check_out_date']);
       
        return ['check_in_date' => $checkInDate->format('Y-m-d'),
                'check_out_date' => $checkOutDate->format('Y-m-d'),
                'total_days' => $checkOutDate->diffInDays($checkInDate),
                'room_id'=>$data['room_id']];
    }

}

