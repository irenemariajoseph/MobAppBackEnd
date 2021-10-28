<?php
    
    require "../constant/unitbarang.php";
    require "../constant/tipepengambilan.php";
    require "../constant/statuspaket.php";

    require "../util/responsebuilder.php";
    require "../util/validate.php";
    require "../util/globalvariable.php";

    // . . -> keluar dr titik folder ini 
    $op = "router/updatestatus";


    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "GET") { // kalau backend mau ambil data aj 
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }
     // initiate struct
    $req = new UpdateStatus();


    $req = $_GET['type'];
    $res;

    switch($req){
        case "status":
            $res = status();
            UpdateStatus($res);

            break;
        
        default:
            $res = "invalid type";


    }

    BuildSuccessResponse($res);
?>