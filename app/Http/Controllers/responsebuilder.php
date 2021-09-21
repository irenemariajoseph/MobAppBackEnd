<?php

namespace App\Http\Controllers;

use App\Models\BaseSuccessResponse;

class responsebuilder {
    public static function SuccessResponseBuilder($data) {
        $res = BaseSuccessResponse::GetBaseSuccessResponse();
        $res->code = 200;
        $res->message = "success";
        $res->data = $data;

        echo json_encode($res);
    }
}

