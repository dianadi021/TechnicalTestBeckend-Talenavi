<?php

namespace App\Traits;

use App\Traits\Tools;

trait ResponseCode
{
    use Tools;

    private $status = [
        200 => "OK",
        201 => "Created",
        202 => "Accepted",
        400 => "Bad Request",
        401 => "Unauthorized",
        403 => "Forbidden",
        404 => "Not Found",
        422 => "Unprocessable Entity",
        429 => "Too Many Requests",
        500 => "Internal Server Error",
        504 => "Gateway Timeout"
    ];

    public function jsonResponse($code, $msg, $datas = [])
    {
        $status = ($code > 400) ? "error" : "success";
        $msg = ($msg ?: $this->status[$code]) ?: "Something went wrong!";
        return response()->json($this->ajaxJSONReturn($code, $status, $msg, $datas), $code);
    }
}
