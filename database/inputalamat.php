<?php

    require "../util/connection.php";

     /**
     * @return object
     */
    function InputAlamattoDatabase($param) {
        $op = "database/InputAlamattoDatabase";

        try {
            $con = GetConnection();

            $query = "INSERT INTO daftar_alamat(nama, telpon, alamat_lengkap, provinsi, kota, kodepos, latitude, longtitude, notes_tambahan) VALUES(?,?,?,?,?,?,?,?,?)";

            $result = $con->prepare($query);
            $result->execute([
                $param->nama,
                $param->telpon,
                $param->alamat_lengkap,
                $param->provinsi,
                $param->kota,
                $param->kodepos,
                $param->latitude,
                $param->longtitude,
                $param->notes_tambahan
                
            ]);
        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }
?>