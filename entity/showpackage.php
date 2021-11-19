<?php

    class ShowPackagekurir {
        public $id_transaksi;
        public $alamat_pengirim;
        public $alamat_penerima;
    }

    class ShowPackageuser {
        public $id_transaksi;
        public $alamat_pengirim;
        public $alamat_penerima;
    }



    class ShowPackageDetails {
        public $id_transaksi;
        public $nama;
        public $alamat_lengkap;
        public $nama_pengirim;
        public $alamat_pengirim;
        public $nama_barang;
        public $berat;
        public $jarak;
        public $asuransibarang;

    }

    class ShowPackageTracking {
        public $id_transaksi;
        public $nama_pengirim;
        public $alamat_pengirim;
        public $telp_peng;
        public $nama_penerima;
        public $alamat_penerima;
        public $telp_pen;
        //10
        public $nama_barang;
        public $kuantitas;
        public $unit_paket;
        public $fragile;
        public $asuransibarang;
        public $berat;
        public $jarak;
        public $harga;
        public $tipe_pengambilan;
        public $status_paket;
        //7
        public $tanggal_pickup;
        public $tanggal_deliveredtopost;
        public $tanggal_warehousetransit;
        public $tanggal_acceptedbykurir;
        public $tanggal_ongoing;
        public $tanggal_arrived;
        public $tanggal_failed;

        

    }


    
?>