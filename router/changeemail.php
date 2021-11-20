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
     $req = new ChangeEmail();


    // ngambil function di service trs end point 
   
    if (isset($_POST['email'])) {
        $req->email = $_POST['email'];
    } else {
        $msg = "[$op] email can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['emailbaru'])) {
        $req->emailbaru = $_POST['emailbaru'];
    } else {
        $msg = "[$op] emailbaru can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

  
    // $req->status_paket = $status_paket;



   
    ChangeEmail($req);

  
    $msg = "[$op] Email has been updated";
    BuildSuccessResponse($msg);
?>