<?php
    require "../database/transaksi.php";
 

    /**
     * @return object
     */
    function InputPackageDetail($param) {
        $op = "service/InputPackageDetail";
  
        $data = InputPackageDetailtoDB($param);
        if ($data instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
            return $data;
        }
        
    }


?>