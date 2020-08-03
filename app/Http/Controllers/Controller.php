<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function jsonResponse(string $message,int $code, $data)
    {
        return response()->json([
            'message' => $message,
            'status_code' => $code,
            'data' =>$data
        ]);
    }

    protected function jsonErrorResponse(array $message_and_code, $data)
    {
        return response()->json([
            'message' => $message_and_code['error_message'],
            'status_code' => $message_and_code['error_code'],
            'data' =>$data
        ]);
    }

    protected function permission_check(string $code)
    {

    }


}
