<?php

namespace App\Http\Traits;

use App\Http\Requests\RoomSearchRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

trait HttpRequests{

    protected function roomSearchRequest(RoomSearchRequest $request){
        
        //Validate Request and remove empty fields
        $data = array_filter($request->validated());

        $checkInDate = Carbon::parse($data['check_in_date'])->format('Y-m-d');
        $checkOutDate = Carbon::parse($data['check_out_date'])->format('Y-m-d');

        $queryArray = [];

        foreach ($data as $key => $value) {
            //if ($key != 'check_in_date' && $key != 'check_out_date') {
                array_push($queryArray, [$key, $value]);
           // }
        }

        return ['check_in_date' => $checkInDate,
                'check_out_date' => $checkOutDate,
                $queryArray];

        
    }

}

