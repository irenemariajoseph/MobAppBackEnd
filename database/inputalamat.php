<?php

    require "../util/connection.php";

     /**
     * @return object
     */
    function InputAlamatPengtoDatabase($param) {
        $op = "database/InputAlamattoDatabase";

        try {
            $con = GetConnection();

            $query = "INSERT INTO daftar_alamat_pengirim(nama, telpon, alamat_lengkap, provinsi, kota, kodepos,notes_tambahan) VALUES(?,?,?,?,?,?,?)";

            $result = $con->prepare($query);
            $result->execute([
                $param->nama,
                $param->telpon,
                $param->alamat_lengkap,
                $param->provinsi,
                $param->kota,
                $param->kodepos,
                $param->notes_tambahan
                
            ]);
            
            $id_alamatpengirim = $con->lastInsertId();
            return $id_alamatpengirim;

        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }

    function InputAlamatPentoDatabase($param) {
        $op = "database/InputAlamatPentoDatabase";

        try {
            $con = GetConnection();

            $query = "INSERT INTO daftar_alamat_penerima(nama, telpon, alamat_lengkap, provinsi, kota, kodepos,  notes_tambahan) VALUES(?,?,?,?,?,?,?)";

            $result = $con->prepare($query);
            $result->execute([
                $param->nama,
                $param->telpon,
                $param->alamat_lengkap,
                $param->provinsi,
                $param->kota,
                $param->kodepos,
                $param->notes_tambahan
                
            ]);

             
            $id_alamatpenerima = $con->lastInsertId();
            return $id_alamatpenerima;

        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }

?>

