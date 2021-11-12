<?php
  require "../constant/statuspaket.php";

 function status(){
    
    global $arr_status;
    global $arr_status_text;
     
   
     $type = array_map('mapstatus', $arr_status, $arr_status_text);
     return $type;
    }

    function mapstatus(int $statuspkt, string $status_word){
        $map = array('statuspkt'=> $statuspkt, 'status_word' => $status_word);
        return $map;
    
    
     }

     
?>