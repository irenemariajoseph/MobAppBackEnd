<?php

    require "../util/connection.php";

     /**
     * @return object
     */
    function UpdateStatusinDB($status_paket, $id_transaksi, $kolom_tanggal) {
        $op = "database/InputAlamattoDatabase";

        try {
            $con = GetConnection();

            
            $query = "UPDATE transaksi_paket SET status_paket = ?, ". $kolom_tanggal . " = now() WHERE id_transaksi = ?";
              
            $result = $con->prepare($query);
            $result->execute([
                $status_paket, 
                $id_transaksi
                
                
            ]);
        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }
?>