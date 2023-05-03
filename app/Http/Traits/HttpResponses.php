<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponses {

    protected function onSuccess($data, string $message = '', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Request was successful',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function onError(int $code, string $message = ''): JsonResponse
    {
        return response()->json([
            'status' => `Error has occured...,$code`,
            'message' => $message,
        ], $code);
    }
}