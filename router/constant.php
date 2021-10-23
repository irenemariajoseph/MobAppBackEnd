<?php
    
    require "../constant/unitbarang.php";
    require "../constant/tipepengambilan.php";
    require "../constant/statuspaket.php";
    //require "../entity/inputalamat.php";
    //require "../service/inputalamat.php";
    //
    require "../util/responsebuilder.php";
    require "../util/validate.php";
    require "../util/globalvariable.php";

    // . . -> keluar dr titik folder ini 
    $op = "router/constant";
    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "GET") { // kalau backend mau ambil data aj 
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    $req = $_GET['type'];
    $res;

    switch($req){
        case "status":
            $res = status();
            break;
        
        default:
            $res = "invalid type";


    }

    BuildSuccessResponse($res);
?>