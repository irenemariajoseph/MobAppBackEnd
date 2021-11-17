<?php

    require "../util/connection.php";

     /**
     * @return object
     */
    function InputPackageDetailtoDB($param) {
        $op = "database/InputPackageDetailtoDB";

        try {
            $con = GetConnection();

            $query = "INSERT INTO transaksi_paket(id_pengirim,  id_penerima, id_user,  nama_barang, kuantitas, unit_paket, berat, jarak, fragile, asuransibarang, tipe_pengambilan , status_paket , jarak, harga   ) VALUES(?,?,?,?,?,?,?,?,?,?,?,'Belum Di Proses',  '2.0', '2.0' )";

            $result = $con->prepare($query);
            $result->execute([
                $param -> id_pengirim,
                $param -> id_penerima,
                $param -> id_user,
                $param->nama_barang,
                $param->kuantitas,
                $param->unit_paket,
                $param->berat,
                $param->jarak,
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
        $op = "database/InputTransactionInfotoDB";

        try {
            $con = GetConnection();
            //UPDATE transaksi_paket SET status_paket = ?, ". $kolom_tanggal . " = now() WHERE id_transaksi = ?"
            // $query = "UPDATE INTO transaksi_paket(jarak, harga ) VALUES(?,?) .  WHERE id_transaksi = ? ";
            $query = "UPDATE transaksi_paket SET  harga=? WHERE id_transaksi=?";

            $result = $con->prepare($query);
            $result->execute([
               
                $param->harga,
                $param->id_transaksi
                
            ]);
        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }

?>