<?php

namespace App\Models;

class SuccessModel {
    public $code;
    public $message;
    public $data;

    public static function GetSuccessModel() {
        return new BaseSuccessResponse();
    }
}