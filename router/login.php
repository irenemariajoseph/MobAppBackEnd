<?php
    require "../util/responsebuilder.php";
    require "../entity/login.php";
    require "../util/validate.php";
    require "../service/login.php";
    require "../util/globalvariable.php";

    $op = "router/login";

     //WAJIB ADA DISETIAP SERVICE YG ADA 
     if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

     // initiate struct
     $req = new UsersLogin();


    // get password
    if (isset($_POST['password'])) {
        $req->password = $_POST['password'];
    } else {
        $msg = "[$op] password can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        if (ValidateEmail($email)) {
            $req->email = $email;
        } else {
            $msg = "[$op] email is not in valid format";
            BuildErrorResponse($StatusBadRequest, $msg);
            return;
        }
        $req->email = $_POST['email'];
    } else {
        $msg = "[$op] email can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;

    }

    // ngambil function di service trs end point 
    $res = LoginUser($req);
    if ($res instanceof Exception) {
        if (strcmp($res->getMessage(), $LoginInvalid) == 0) {
            BuildErrorResponse($StatusInvalidLogin, $res->getMessage());
            return;
        }

        BuildErrorResponse($StatusInternalServerError, $res->getMessage());
        return;
    }

    $msg = "[$op] User Sign In Succesfully";
    BuildSuccessResponse($msg);
?>