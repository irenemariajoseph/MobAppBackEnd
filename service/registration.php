<?php

    require "../database/users.php";

    function RegisterUser($data) {
        $op = "service/RegisterUser";
        
        $err = CheckExistingUserByEmail($data->email);
        if ($err instanceof Exception) {
            return $err;
        }

        if ($err) {
            return new Exception("[$op] email already exist");
        }

        $data->password = password_hash($data->password, PASSWORD_BCRYPT);
        $err = InsertUserToDatabase($data);
        if ($err instanceof Exception) {
            return $err;
        }
    }

?>