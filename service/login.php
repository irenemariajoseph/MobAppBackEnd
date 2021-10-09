<?php
    require "../database/users.php";

    function LoginUser($data) {
        $op = "service/LoginUser";
        // buat ngecek bener ato ga emailnya 
        $err = CheckUserInputLogin($data -> email);
        if ($err instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
            return $err;
        }
        if (empty($err)) {
            return new Exception("[$op] Invalid username / password!");
          }
        
        $pw = $err->password;
        if (!password_verify($data-> password ,$pw )){
            return new Exception("[$op] Invalid username / password!");
        }
            
        
    }


?>