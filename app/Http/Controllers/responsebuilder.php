<?php

namespace App\Http\Controllers;

use App\Models\SuccessModel;

class responsebuilder {
    public static function SuccessResponseBuilder($data) {
        $res = SuccessModel::GetSuccessModel();
        $res->code = 200;
        $res->message = "success";
        $res->data = $data;

        echo json_encode($res);
    }
}

