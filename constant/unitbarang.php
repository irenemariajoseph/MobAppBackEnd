<?php
   function unitbarang($type, callable $callback = null)
 {
    
    $a = [1, 2];
    $b = ['Pcs', 'Box'];
    

    $type = array_map($callback, $a, $b);
    return $type;
    //print_r($type);
 }


?>