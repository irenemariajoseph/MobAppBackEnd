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
                
                case 1:
                    UpdateStatusinDB($arr_status_text[0], $id_transaksi, 'tanggal_pickup');
                    break;
                case 2:
                    UpdateStatusinDB($arr_status_text[1], $id_transaksi, 'tanggal_deliveredtopost');
                    break;
                  
                case 3:
                    UpdateStatusinDB($arr_status_text[2], $id_transaksi, 'tanggal_warehousetransit');
                    break;
                  
                case 4:
                    UpdateStatusinDB($arr_status_text[3], $id_transaksi, 'tanggal_acceptedbykurir');
                    break;
                  
                case 5:
                    UpdateStatusinDB($arr_status_text[4], $id_transaksi, 'tanggal_ongoing');
                    break;
                  
                case 6:
                    UpdateStatusinDB($arr_status_text[5], $id_transaksi, 'tanggal_arrived');
                    break;
                  
                case 7:
                    UpdateStatusinDB($arr_status_text[6], $id_transaksi, 'tanggal_failed');
                    break;
                  
                  }// ini error ato ga, klo bukan error brrti boolean 
           
        }
        
    
       
        

?>