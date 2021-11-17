<?php

    require "../util/responsebuilder.php";
    require "../entity/inputtransaction.php";
    require "../util/validate.php";
    require "../service/inputpackagedetail.php";
    require "../util/globalvariable.php";

    $op = "router/inputtransaction";
    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    // initiate struct
    $req = new InputTransactionInfotoDB();


  
    if (isset($_POST['harga'])) {
        $req->harga = $_POST['harga'];
    } else {
        $msg = "[$op] harga  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['id_transaksi'])) {
        $req->id_transaksi = $_POST['id_transaksi'];
    } else {
        $msg = "[$op] id_transaksi  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    //ngambil function di service trs end point 
    $res = InputTransaction($req);

    if ($res instanceof Exception) {
        if (strcmp($res->getMessage(), $InvalidPackageDetail ) == 0) {
            BuildErrorResponse($StatusInvalidActivity, $res->getMessage());
            return;
           
        }

        BuildErrorResponse($StatusInternalServerError, $res->getMessage());
        return;
    }
    
    
    $msg = "[$op] Transaction input successful";
    BuildSuccessResponse($msg);
?>