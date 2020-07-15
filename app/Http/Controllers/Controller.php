<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function sendResponse($message, $data, $status = 200){
        return response()->json([
            'message'   =>  $message,
            'data'      =>  $data,
            'status'    =>  $status
        ])->setStatusCode($status == 200 ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    // The success handler, this method is called whenever we want to return success
    public function success(string $message = null, $data = [], $status = 200) {
        return $this->sendResponse($message, $data, $status);
    }

    public function failed(string $message = null, $data = [], $status = 400) {
        return $this->sendResponse($message, $data, $status);
    }
}
