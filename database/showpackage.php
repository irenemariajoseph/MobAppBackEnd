<?php

    require "../util/connection.php";

     /**
     * @return object
     */
    function ShowPackagefromDB($id_transaksi) {
        $op = "database/UpdateStatusinDB";

        try {
            $con = GetConnection();

            $query = "SELECT id_transaksi, nama_barang, status_paket FROM transaksi_paket WHERE id_transaksi = ?";
              
            $result = $con->prepare($query);
            $result->execute([$id_transaksi]);

            $res = new ShowPackage();

            while($hasil = $result->fetch()) {
                $res->id_transaksi = $hasil['id_transaksi'];
                $res->nama_barang = $hasil['nama_barang'];
                $res->status_paket = $hasil['status_paket'];
            }

            // $res = [];
            // while($hasil = $result->fetch()) {
            //     $temp = new ShowPackage();
            //     array_push($res, $temp);
            // }

            return $res;

        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }

     /**
     * @return object
     */
    function ShowPackageDetailfromDB($id_transaksi) {
        $op = "database/ShowPackageDetailfromDB";

        try {
            $con = GetConnection();

            $query = "SELECT transaksi_paket.id_transaksi, daftar_alamat_penerima.nama, daftar_alamat_penerima.alamat_lengkap,daftar_alamat_penerima.telpon, transaksi_paket.nama_barang, transaksi_paket.berat, transaksi_paket.jarak, transaksi_paket.harga, transaksi_paket.asuransibarang FROM transaksi_paket INNER JOIN daftar_alamat_penerima ON transaksi_paket.id_penerima = daftar_alamat_penerima.id_alamatpenerima WHERE id_transaksi = ?";
              
            $result = $con->prepare($query);
            $result->execute([$id_transaksi]);

            $res = new ShowPackageDetails();

            while($hasil = $result->fetch()) {
                $res->id_transaksi = $hasil['id_transaksi'];
                $res->nama = $hasil['nama'];
                $res->alamat_lengkap = $hasil['alamat_lengkap'];
                $res->telpon = $hasil['telpon'];
                $res->nama_barang = $hasil['nama_barang'];
                $res->berat = $hasil['berat'];
                $res->jarak = $hasil['jarak'];
                $res->harga = $hasil['harga'];
                $res->asuransibarang = $hasil['asuransibarang'];
 
              
            }

            // $res = [];
            // while($hasil = $result->fetch()) {
            //     $temp = new ShowPackage();
            //     array_push($res, $temp);
            // }

            return $res;

        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }


?>


