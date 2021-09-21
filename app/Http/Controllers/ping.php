<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PingModel;
use App\Http\Controllers\responsebuilder;

class Ping extends Controller {
 

    public function ping(Request $request) {
        $data = PingModel::GetPing();
        $data->message = "you are connected";
        $data->time = date('d-m-Y H:i:s', time());

        responsebuilder::SuccessResponseBuilder($data);
    }

}