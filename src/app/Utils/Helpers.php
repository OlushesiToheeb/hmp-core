<?php

namespace App\Utils;

class Helpers
{

    /**
     * @param $data
     * @param int $statusCode
     * @param $message
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponder($data = [], $statusCode = 400, $message = null, $errors = [], $header = [], $service = null)
    {

        $result = [
            'success' =>  false,
            'data' => $data,
        ];

        if ($errors) $result = array_merge($result, ['errors' => $errors]);
        if ($service) $result = array_merge($result, ['service' => $service]);

        $result = array_merge($result, ['message' => $message]);

        return response()->json($result, $statusCode);
    }

    public function responder($data, $statusCode = 200, $message = null, $headers = [])
    {
        $truthy = $statusCode >= 200 && $statusCode <= 209;

        $isMessageNull = is_null($message) ? true : false;

        if ($isMessageNull && $truthy) {
            $message = 'Action was successful';
        } elseif ($isMessageNull && !$truthy) {
            $message = 'Action was unsuccessful';
        }

        $result = [
            'success' => $truthy ? true : false,
            'data' => $truthy ? $data : [],
            'message' => $message
        ];

        if (!$truthy) {
            $result = array_merge($result, ['errors' => !$truthy ? $data : [],]);
        }

        return response()->json($result, $statusCode, $headers);
    }

    /**
     * @param $data
     * @param int $statusCode
     * @param string $message
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponder($data, $status, $message = 'Action was successfull')
    {
        $result = [
            'success' =>  true,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($result, $status);
    }
}
