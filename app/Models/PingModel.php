<?php

namespace App\Models;


class PingModel {
    public $time;
    public $message;

    public static function GetPing() {
        return new PingModel();
    }
}