<?php

    require "../util/responsebuilder.php";
    require "../entity/registration.php";
    require "../util/validate.php";
    require "../service/registration.php";
    require "../util/globalvariable.php";

    $op = "router/registration";
    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    // initiate struct
    $req = new Users();
    
    // get name variable and check if name is empty or not -> until it registered succesfully 
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        if (ValidateName($name)){
            $req->name = $name;// buat masukin ke struct 
        }else {
            $msg = "[$op] invalid name format";
            BuildErrorResponse($StatusBadRequest, $msg);
            return;
        }
    } else {
        $msg = "[$op] name can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

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

  

    
    // manggil service 
    $res = RegisterUser($req);
    if ($res instanceof Exception) {
        if (strcmp($res->getMessage(), $RegisterUserExist) == 0) {
            BuildErrorResponse($StatusDataAlreadyExist, $res->getMessage());
            return;
        }

        BuildErrorResponse($StatusInternalServerError, $res->getMessage());
        return;
    }

    $msg = "[$op] user registered succesfully";
    BuildSuccessResponse($msg);
?>