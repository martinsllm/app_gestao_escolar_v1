<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function response($data, int $code): JsonResponse {
        return response()->json($data, $code)
            ->header('Content-Type', 'application/json');
    }
}