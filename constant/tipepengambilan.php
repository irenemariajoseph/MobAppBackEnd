<?php
   function tipepengambilan($type, callable $callback = null)
 {
    
    $a = [1, 2];
    $b = ['Delivered to Post', 'PickUp'];
    

    $type = array_map($callback, $a, $b);
    return $type;
    //print_r($type);
 }


?>