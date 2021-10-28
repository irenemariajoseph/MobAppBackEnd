<?php
    require "../database/tracking.php";

    /**
     * @return object
     */
    function UpdateStatus($res) {
        $op = "service/UpdateStatus";
        $data = UpdateStatus($res);

        if ($data) { 
            switch($res){
                // case "pickup":
                //     UpdateStatusinDB($date_to_delivered, $id_transaksi, $tanggal_pickup);
                //     break;
                // case "deliveredtopost":
                //     UpdateStatusinDB($in_transit, $id_transaksi, $tanggal_deliveredtopost);
                //     break;
                  
                // case "warehousetransit":
                //     UpdateStatusinDB($in_transit, $id_transaksi, $tanggal_warehousetransit);
                //     break;
                  
                // case "acceptedbykurir ":
                //     UpdateStatusinDB($in_transit, $id_transaksi, $tanggal_acceptedbykurir);
                //     break;
                  
                // case "ongoing":
                //     UpdateStatusinDB($in_transit, $id_transaksi, $tanggal_ongoing);
                //     break;
                  
                // case "arrived":
                //     UpdateStatusinDB($in_transit, $id_transaksi, $tanggal_arrived);
                //     break;
                  
                // case "failed ":
                //     UpdateStatusinDB($in_transit, $id_transaksi, $tanggal_failed);
                //     break;
                  
                  }// ini error ato ga, klo bukan error brrti boolean 
           
        }
        
    }
       
        

?>