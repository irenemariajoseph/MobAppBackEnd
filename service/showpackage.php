<?php

    require "../database/showpackage.php";

    /**
     * @return object
     */
    function ShowPackagekurir() {
        $op = "service/ShowPackage";
        // pas pembuatan akun ngecek email udh ad di db ato lom 


        $data = ShowPackagefromDBkurir();

        if ($data instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
            return $data;
        }
        return $data;
    }

    /**
     * @return object
     */
    function ShowPackageuser($id_user) {
        $op = "service/ShowPackage";
        // pas pembuatan akun ngecek email udh ad di db ato lom 


        $data = ShowPackagefromDBuser($id_user);

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

    /**
     * @return object
     */
    function ShowPackageTracking($id_transaksi) {
        $op = "service/ShowPackage";
        // pas pembuatan akun ngecek email udh ad di db ato lom 


        $data = ShowPackageTrackingfromDB($id_transaksi);

        if ($data instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
            return $data;
        }
        return $data;
    }

?>