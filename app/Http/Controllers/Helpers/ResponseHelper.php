<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;


class ResponseHelper extends Controller
{
    public function success($isTrue, $message, $data, $statusCode = 200)
    {
        return response()->json([
            'success' => $isTrue,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
    public function error($isTrue, $message, $statusCode)
    {
        return response()->json([
            'success' => $isTrue,
            'message' => $message,
        ], $statusCode);
    }
}
