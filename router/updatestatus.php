<?php
    
    require "../constant/unitbarang.php";
    require "../constant/tipepengambilan.php";
    require "../constant/statuspaket.php";
    require "../entity/tracking.php";
    require "../service/updatestatus.php";
    require "../util/responsebuilder.php";
    require "../util/validate.php";
    require "../util/globalvariable.php";

    // . . -> keluar dr titik folder ini 
    $op = "router/updatestatus";


    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "POST") { // kalau backend mau ambil data aj 
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }
     // initiate struct
    $req = new UpdateStatus();


    if (isset($_POST['id_transaksi'])) {
        $req->id_transaksi = $_POST['id_transaksi'];
    } else {
        $msg = "[$op] id_transaksi can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['status_paket'])) {
        $req->status_paket = $_POST['status_paket'];
    } else {
        $msg = "[$op] status_paket can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    // $req->status_paket = $status_paket;



   
    UpdateStatus($req);

  
    $msg = "[$op] Status has been updated";
    BuildSuccessResponse($msg);
?>