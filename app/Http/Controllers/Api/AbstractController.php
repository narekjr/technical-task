<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

abstract class AbstractController extends Controller
{
    /**
     * Return a response
     *
     * @param string $message
     * @param $data
     * @param int $statusCode
     * @return JsonResponse
     */
    public function response(string $message, $data = null, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ])->setStatusCode($statusCode);
    }
}
