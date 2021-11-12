<?php

    require "../database/showpackage.php";

    /**
     * @return object
     */
    function ShowPackage($id_transaksi) {
        $op = "service/ShowPackage";
        // pas pembuatan akun ngecek email udh ad di db ato lom 


        $data = ShowPackagefromDB($id_transaksi);

        if ($data instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
            return $data;
        }
        return $data;
    }

     /**
     * @return object
     */
    function ShowPackageDetails($id_transaksi) {
        $op = "service/ShowPackage";
        // pas pembuatan akun ngecek email udh ad di db ato lom 


        $data = ShowPackageDetailfromDB($id_transaksi);

        if ($data instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
            return $data;
        }
        return $data;
    }
    

?>