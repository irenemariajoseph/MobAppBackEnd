<?php
    require "../database/inputalamat.php";

    /**
     * @return object
     */
    function InputAlamat($param) {
        $op = "service/InputAlamat";
        // nanay ini perlu ato enggga?
        $data = InputAlamattoDatabase($param);
        if ($data instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
            return $data;
        }
        
    }


?>