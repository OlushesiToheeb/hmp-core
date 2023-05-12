<?php

namespace App\Http\Controllers;

use App\Utils\Helpers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function responder($data, $statusCode = 200, $message = null, $header = [])
    {
        return (new Helpers())->responder($data, $statusCode, $message, $header);
    }

    public function errorResponder($data, $statusCode = 500, $message = 'Action was Unsuccesful', $header = [])
    {
        return (new Helpers())->errorResponder($data, $statusCode, $message, $header);
    }

    protected function successResponder($data, $statusCode = 200, $message = 'Action was Succesful', $header = [])
    {
        return (new Helpers())->successResponder($data, $statusCode, $message, $header);
    }
}
