<?php
 
   function status(){
      
   $a = [1, 2, 3, 4, 5, 6, 7 ];
   $b = ['PickUp', 'Delivered to Post', 'Warehouse Transit', 'Accepted By Kurir' ,
     'on going' ,'arrived','failed' ];
    
  
    $type = array_map('mapstatus', $a, $b);
    return $type;
    //print_r($type);

   }

   function mapstatus(int $status, string $status_word){
      $map = array('status'=> $status, 'status_word' => $status_word);
      return $map;


   }

?>g