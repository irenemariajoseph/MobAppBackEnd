<?php
    require "../database/tracking.php";
    require "../constant/statuspaket.php";
    

    /**
     * @return object
     */
    function UpdateStatus($res) {
        $op = "service/UpdateStatus";
        global $arr_status_text;

        $data = $res-> status_paket;
        $id_transaksi = $res-> id_transaksi;
         
            switch($data){
                
                case 'Pick Up':
                    UpdateStatusinDB($arr_status_text[0], $id_transaksi, 'tanggal_pickup');
                    break;
                case 'Delivered to Post':
                    UpdateStatusinDB($arr_status_text[1], $id_transaksi, 'tanggal_deliveredtopost');
                    break;
                  
                case 'Warehouse Transit':
                    UpdateStatusinDB($arr_status_text[2], $id_transaksi, 'tanggal_warehousetransit');
                    break;
                  
                case 'Accepted By Courier':
                    UpdateStatusinDB($arr_status_text[3], $id_transaksi, 'tanggal_acceptedbykurir');
                    break;
                  
                case 'On Going Delivery':
                    UpdateStatusinDB($arr_status_text[4], $id_transaksi, 'tanggal_ongoing');
                    break;
                  
                case 'Package Arrived':
                    UpdateStatusinDB($arr_status_text[5], $id_transaksi, 'tanggal_arrived');
                    break;
                  
                case 'Failed to Delivered':
                    UpdateStatusinDB($arr_status_text[6], $id_transaksi, 'tanggal_failed');
                    break;
                  
                  }// ini error ato ga, klo bukan error brrti boolean 
           
        }
        
    
       
        

?>