<?php
    // http status
    $StatusBadRequest = 400;
    $StatusInternalServerError = 500;
    $StatusDataAlreadyExist = 501;

    // error message
    $RegisterUserExist = "[service/RegisterUser] email already exist";
    date_default_timezone_set('Asia/Jakarta');

    function GetCurrentDateTime() {
        return date('d-m-Y H:i:s');
    }

    function GetCurrentDateTimeDB() {
        $date =  date('Y-m-d H:i:s');
        return DateTime::createFromFormat('Y-m-d H:i:s', $date);
    }
?>