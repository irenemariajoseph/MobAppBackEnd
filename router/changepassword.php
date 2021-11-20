<?php
    require "../util/responsebuilder.php";
    require "../entity/changepassword.php";
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
     $req = new ChangePassword();


    // ngambil function di service trs end point 
   
    if (isset($_POST['email'])) {
        $req->email = $_POST['email'];
    } else {
        $msg = "[$op] email can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['password'])) {
        $req->password = $_POST['password'];
    } else {
        $msg = "[$op] password can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }


  
    // $req->status_paket = $status_paket;



   
    ChangePassword($req);

  
    $msg = "[$op] Password has been updated";
    BuildSuccessResponse($msg);
?>