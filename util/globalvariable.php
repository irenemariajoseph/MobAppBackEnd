<?php
    // http status
    $StatusBadRequest = 400;
    $StatusInternalServerError = 500;
    $StatusDataAlreadyExist = 501;
    $StatusInvalidLogin = 401;

    // error message user 
    $RegisterUserExist = "[service/RegisterUser] email already exist";
    date_default_timezone_set('Asia/Jakarta');

    // error message user login 
    $LoginInvalid = "[service/LoginUser] Invalid username / password!";

    function GetCurrentDateTime() {
        return date('d-m-Y H:i:s');
    }

    function GetCurrentDateTimeDB() {
        $date =  date('Y-m-d H:i:s');
        return DateTime::createFromFormat('Y-m-d H:i:s', $date);
    }
?>