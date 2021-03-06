<?php

    require "../util/responsebuilder.php";
    require "../entity/showpackage.php";
    require "../util/validate.php";
    require "../service/showpackage.php";
    require "../util/globalvariable.php";

    $op = "router/showpackagedetails";
    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    $id_transaksi = $_POST['id_transaksi'];
    

    //ngambil function di service trs end point 
    $res = ShowPackageDetails($id_transaksi);

    if ($res instanceof Exception) {
        if (strcmp($res->getMessage(), $InvalidPackageDetail ) == 0) {
            BuildErrorResponse($StatusInvalidActivity, $res->getMessage());
            return;
           
        }

        BuildErrorResponse($StatusInternalServerError, $res->getMessage());
        return;
    }
    
    
    // $msg = "[$op] Transaction input successful";
    BuildSuccessResponse($res);
?>