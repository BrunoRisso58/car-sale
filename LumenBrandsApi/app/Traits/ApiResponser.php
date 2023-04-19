<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser {

    /**
     * Return a success response
     * @param string|array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK) {
        return response()->json(['data' => $data, 'code' => $code], $code);
    }

    /**
     * Return an error response
     * @param string $msg
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($msg, $code = Response::HTTP_BAD_REQUEST) {
        return response()->json(
            [
                'error' => [
                    'message' => $msg,
                    'code' => $code
                ]
            ],
            $code);
    }
}