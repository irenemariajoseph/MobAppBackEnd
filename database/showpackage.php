<?php

    require "../util/connection.php";
 /**
     * @return object
     */
    function ShowPackagefromDBuser($id_user) {
        $op = "database/UpdateStatusinDB";

        try {
            $con = GetConnection();

            $query = "SELECT transaksi_paket.id_transaksi, daftar_alamat_pengirim.alamat_lengkap as alamat_pengirim , daftar_alamat_penerima.alamat_lengkap as alamat_penerima FROM transaksi_paket INNER JOIN daftar_alamat_penerima  ON transaksi_paket.id_penerima = daftar_alamat_penerima.id_alamatpenerima 
            INNER JOIN daftar_alamat_pengirim ON transaksi_paket.id_pengirim = daftar_alamat_pengirim.id_alamatpengirim
                        INNER JOIN users
                        ON transaksi_paket.id_user = users.id
                        WHERE id_user = ?";
              
            $result = $con->prepare($query);
            $result->execute([$id_user]);

            // $res = [];
            // while($hasil = $result->fetch()) {
            //     $temp = new ShowPackageuser();
            //     array_push($res, $temp);
            // }

            $res = [];
            while($hasil = $result->fetch()) {
                $temp = new ShowPackageuser();
                $temp->id_transaksi = $hasil['id_transaksi'];
                $temp->alamat_pengirim = $hasil['alamat_pengirim'];
                $temp->alamat_penerima = $hasil['alamat_penerima'];
                array_push($res, $temp);
            }

            return $res;

        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }


     /**
     * @return object
     */
    function ShowPackagefromDBkurir() {
        $op = "database/UpdateStatusinDB";

        try {
            $con = GetConnection();

            $query = "SELECT transaksi_paket.id_transaksi, daftar_alamat_pengirim.alamat_lengkap as alamat_pengirim , daftar_alamat_penerima.alamat_lengkap as alamat_penerima FROM transaksi_paket INNER JOIN daftar_alamat_penerima  ON transaksi_paket.id_penerima = daftar_alamat_penerima.id_alamatpenerima 
            INNER JOIN daftar_alamat_pengirim ON transaksi_paket.id_pengirim = daftar_alamat_pengirim.id_alamatpengirim
                        INNER JOIN users
                        ON transaksi_paket.id_user = users.id";
              
            $result = $con->prepare($query);
            $result->execute();
           

            $res = [];
            while($hasil = $result->fetch()) {
                $temp = new ShowPackagekurir();
                $temp->id_transaksi = $hasil['id_transaksi'];
                $temp->alamat_pengirim = $hasil['alamat_pengirim'];
                $temp->alamat_penerima = $hasil['alamat_penerima'];
                array_push($res, $temp);
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

            $query = "SELECT transaksi_paket.id_transaksi, daftar_alamat_penerima.nama, daftar_alamat_penerima.alamat_lengkap,daftar_alamat_pengirim.nama as nama_pengirim, daftar_alamat_pengirim.alamat_lengkap as alamat_pengirim, transaksi_paket.nama_barang, transaksi_paket.berat, transaksi_paket.jarak ,  transaksi_paket.asuransibarang FROM transaksi_paket 
            INNER JOIN daftar_alamat_penerima 
            ON transaksi_paket.id_penerima = daftar_alamat_penerima.id_alamatpenerima 
            INNER JOIN daftar_alamat_pengirim
            ON transaksi_paket.id_pengirim = daftar_alamat_pengirim.id_alamatpengirim
            WHERE id_transaksi = ?";
              
            $result = $con->prepare($query);
            $result->execute([$id_transaksi]);

            $res = new ShowPackageDetails();

            while($hasil = $result->fetch()) {
                $res->id_transaksi = $hasil['id_transaksi'];
                $res->nama = $hasil['nama'];
                $res->alamat_lengkap = $hasil['alamat_lengkap'];
                $res->nama_pengirim = $hasil['nama_pengirim'];
                $res->alamat_pengirim = $hasil['alamat_pengirim'];
                $res->nama_barang = $hasil['nama_barang'];
                $res->berat = $hasil['berat'];
                $res->jarak = $hasil['jarak'];
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

     /**
     * @return object
     */
    function ShowPackageTrackingfromDB($id_transaksi) {
        $op = "database/ShowPackageDetailfromDB";

        try {
            $con = GetConnection();

            $query = "SELECT transaksi_paket.id_transaksi,daftar_alamat_pengirim.nama as nama_pengirim, daftar_alamat_pengirim.alamat_lengkap as alamat_pengirim,   daftar_alamat_pengirim.telpon as telp_peng, daftar_alamat_penerima.nama as nama_penerima, daftar_alamat_penerima.alamat_lengkap as alamat_penerima, daftar_alamat_penerima.telpon as telp_pen, 

            transaksi_paket.nama_barang,  transaksi_paket.kuantitas, transaksi_paket.unit_paket, transaksi_paket.fragile,transaksi_paket.asuransibarang, transaksi_paket.berat ,   transaksi_paket.jarak,  transaksi_paket.harga,transaksi_paket.tipe_pengambilan,  transaksi_paket.status_paket,  transaksi_paket.tanggal_pickup,  transaksi_paket.tanggal_deliveredtopost,  transaksi_paket.tanggal_warehousetransit,  transaksi_paket.tanggal_acceptedbykurir,  transaksi_paket.tanggal_ongoing,  transaksi_paket.tanggal_arrived,  transaksi_paket.tanggal_failed FROM transaksi_paket 
                        INNER JOIN daftar_alamat_penerima 
                        ON transaksi_paket.id_penerima = daftar_alamat_penerima.id_alamatpenerima 
                        INNER JOIN daftar_alamat_pengirim
                        ON transaksi_paket.id_pengirim = daftar_alamat_pengirim.id_alamatpengirim
                        WHERE id_transaksi = ?";
              
            $result = $con->prepare($query);
            $result->execute([$id_transaksi]);

            $res = new ShowPackageTracking();

            while($hasil = $result->fetch()) {

                $res->id_transaksi = $hasil['id_transaksi'];
                $res->nama_pengirim = $hasil['nama_pengirim'];
                $res->alamat_pengirim = $hasil['alamat_pengirim'];
                $res->telp_peng = $hasil['telp_peng'];
                $res->nama_penerima = $hasil['nama_penerima'];
                $res->alamat_penerima = $hasil['alamat_penerima'];
                $res->telp_pen = $hasil['telp_pen'];
                //10
                $res->nama_barang = $hasil['nama_barang'];
                $res->kuantitas = $hasil['kuantitas'];
                $res->unit_paket = $hasil['unit_paket'];
                $res->fragile = $hasil['fragile'];
                $res->asuransibarang = $hasil['asuransibarang'];
                $res->berat = $hasil['berat'];
                $res->jarak = $hasil['jarak'];
                $res->harga = $hasil['harga'];
                $res->tipe_pengambilan = $hasil['tipe_pengambilan'];
                $res->status_paket = $hasil['status_paket'];
                //7
                $res->tanggal_pickup = $hasil['tanggal_pickup'];
                $res->tanggal_deliveredtopost = $hasil['tanggal_deliveredtopost'];
                $res->tanggal_acceptedbykurir = $hasil['tanggal_acceptedbykurir'];
                $res->tanggal_ongoing = $hasil['tanggal_ongoing'];
                $res->asuransibarang = $hasil['asuransibarang'];
                $res->tanggal_arrived = $hasil['tanggal_arrived'];
                $res->tanggal_failed = $hasil['tanggal_failed'];

              
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


