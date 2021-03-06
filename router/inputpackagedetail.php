<?php

    require "../util/responsebuilder.php";
    require "../entity/inputpackagedetail.php";
    require "../util/validate.php";
    require "../service/inputpackagedetail.php";
    require "../util/globalvariable.php";

    $op = "router/inputpackagedetail";
    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    // initiate struct
    $req = new InputPackageDetail();

    // get name variable and check if name is empty or not -> until it registered succesfully 
    
    if (isset($_POST['id_pengirim'])) {
        $req->id_pengirim = $_POST['id_pengirim'];
    } else {
        $msg = "[$op] id_pengirim can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['id_penerima'])) {
        $req->id_penerima = $_POST['id_penerima'];
    } else {
        $msg = "[$op] id_penerima can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['id_user'])) {
        $req->id_user = $_POST['id_user'];
    } else {
        $msg = "[$op] id_user can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['nama_barang'])) {
        $req->nama_barang = $_POST['nama_barang'];
    } else {
        $msg = "[$op] nama_barang   can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    // get password
    if (isset($_POST['kuantitas'])) {
        $req->kuantitas = $_POST['kuantitas'];
    } else {
        $msg = "[$op] kuantitas  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['unit_paket'])) {
        $req->unit_paket = $_POST['unit_paket'];
    } else {
        $msg = "[$op] unit_paket  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['berat'])) {
        $req->berat = $_POST['berat'];
    } else {
        $msg = "[$op] berat  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }
    if (isset($_POST['jarak'])) {
        $req->jarak = $_POST['jarak'];
    } else {
        $msg = "[$op] jarak can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['fragile'])) {
        $req->fragile = $_POST['fragile'];
    } else {
        $msg = "[$op] fragile  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['asuransibarang'])) {
        $req->asuransibarang = $_POST['asuransibarang'];
    } else {
        $msg = "[$op] asuransi  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }
    
    if (isset($_POST['tipe_pengambilan'])) {
        $req->tipe_pengambilan = $_POST['tipe_pengambilan'];
    } else {
        $msg = "[$op] tipe_pengambilan  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['harga'])) {
        $req->harga = $_POST['harga'];
    } else {
        $msg = "[$op] harga  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }
    
   

    //ngambil function di service trs end point 
    $res = InputPackageDetail($req);

    if ($res instanceof Exception) {
        if (strcmp($res->getMessage(), $InvalidPackageDetail ) == 0) {
            BuildErrorResponse($StatusInvalidActivity, $res->getMessage());
            return;
        }

        BuildErrorResponse($StatusInternalServerError, $res->getMessage());
        return;
    }
   
    BuildSuccessResponse($res);
?>