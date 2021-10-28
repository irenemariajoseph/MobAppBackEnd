<?php

    require "../database/inputalamat.php";

    /**
     * @return object
     */
    function InputAlamatPeng($param) {
        $op = "service/InputAlamatPeng";
  
        $data = InputAlamatPengtoDatabase($param);
        if ($data instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
            return $data;

        }
        
    }


?>

