<?php

    require "../database/users.php";

    /**
     * @return object
     */
    function RegisterUser($param) {
        $op = "service/RegisterUser";
        // pas pembuatan akun ngecek email udh ad di db ato lom 
        $data = CheckExistingUserByEmail($param->email);
        if ($data instanceof Exception) {
            return $data;
        }

        if ($data) {
            return new Exception("[$op] email already exist");
        }
        // buat nge-enskrip password yang ada di db 
        $param->password = password_hash($param->password, PASSWORD_BCRYPT);
        $data = InsertUserToDatabase($param);
        if ($data instanceof Exception) {
            return $data;
        }
    }

?>