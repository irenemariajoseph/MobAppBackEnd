<?php

    require "../util/connection.php";

     /**
     * @return object
     */
    function InputPackageDetailtoDB($param) {
        $op = "database/InputPackageDetailtoDB";

        try {
            $con = GetConnection();

            $query = "INSERT INTO transaksi_paket(id_pengirim, nama_barang, kuantitas, unit_paket, berat, fragile, asuransibarang, tipe_pengambilan  ) VALUES(?, ?,?,?,?,?,?,?)";

            $result = $con->prepare($query);
            $result->execute([
                $param -> id_alamatpengirim,
                $param->nama_barang,
                $param->kuantitas,
                $param->unit_paket,
                $param->berat,
                $param->fragile,
                $param->asuransibarang,
                $param->tipe_pengambilan
                
            ]);
            
        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }

    /**
     * @return object
     */
    function InputTransactionInfotoDB($param) {
        $op = "database/InputPackageDetailtoDB";

        try {
            $con = GetConnection();

            $query = "INSERT INTO transaksi_paket(jarak, harga, status_paket ) VALUES(?,?,?)";

            $result = $con->prepare($query);
            $result->execute([
                
                $param->jarak,
                $param->harga,
                $param->status_paket
                
            ]);
        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }

?>