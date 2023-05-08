<?php

namespace App\Http\Traits;

use App\Http\Requests\RoomSearchRequest;
use Illuminate\Http\JsonResponse;

trait HttpRequests{

    protected function roomSearchRequest(RoomSearchRequest $request){
        
        //Validate Request and remove empty fields
        $data = array_filter($request->validated());

        $queryArray = [];

        

        
    }

}

