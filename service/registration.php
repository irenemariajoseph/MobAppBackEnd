<?php

    require "../database/users.php";

    function RegisterUser($data) {
        $op = "service/RegisterUser";
        // pas pembuatan akun ngecek email udh ad di db ato lom 
        $err = CheckExistingUserByEmail($data->email);
        if ($err instanceof Exception) {
            return $err;
        }

        if ($err) {
            return new Exception("[$op] email already exist");
        }
        // buat nge-enskrip password yang ada di db 
        $data->password = password_hash($data->password, PASSWORD_BCRYPT);
        $err = InsertUserToDatabase($data);
        if ($err instanceof Exception) {
            return $err;
        }
    }

?>