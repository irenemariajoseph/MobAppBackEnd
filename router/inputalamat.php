<?php

    require "../util/responsebuilder.php";
    require "../entity/inputalamat.php";
    require "../util/validate.php";
    require "../service/inputalamat.php";
    require "../util/globalvariable.php";

    $op = "router/inputalamat";
    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    // initiate struct
    $req = new InputAlamat();
    
    // get name variable and check if name is empty or not -> until it registered succesfully 
    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        if (ValidateName($nama)){
            $req->nama = $nama;// buat masukin ke struct 
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
    if (isset($_POST['telpon'])) {
        $req->telpon = $_POST['telpon'];
    } else {
        $msg = "[$op] Telphone number  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['alamat_lengkap'])) {
        $req->alamat_lengkap = $_POST['alamat_lengkap'];
    } else {
        $msg = "[$op] Address  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['provinsi'])) {
        $req->provinsi = $_POST['provinsi'];
    } else {
        $msg = "[$op] Provinsi  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['kota'])) {
        $req->kota = $_POST['kota'];
    } else {
        $msg = "[$op] kota  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    if (isset($_POST['kodepos'])) {
        $req->kodepos = $_POST['kodepos'];
    } else {
        $msg = "[$op] kodepos  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }
    if (isset($_POST['latitude'])) {
        $req->latitude = $_POST['latitude'];
    } else {
        $msg = "[$op] latitude  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }
    if (isset($_POST['longtitude'])) {
        $req->longtitude = $_POST['longtitude'];
    } else {
        $msg = "[$op] longtitude  can not be empty";
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }
    
    $res = InputAlamat($req);
    if ($res instanceof Exception) {
        if (strcmp($res->getMessage(), $InvalidAddress ) == 0) {
            BuildErrorResponse($StatusInvalidActivity, $res->getMessage());
            return;
        }

        BuildErrorResponse($StatusInternalServerError, $res->getMessage());
        return;
    }

  
   

    //ngambil function di service trs end point 
    
    $msg = "[$op] Address registered succesfully";
    BuildSuccessResponse($msg);
?>