<?php
    
    require "../entity/ping.php";
    require "../util/responsebuilder.php";
    // . . -> keluar dr titik folder ini 
    
    $data = new Ping();
    $data->time = date('d-m-Y H:i:s', time() + (5*60*60));
    $data->message = "you are connected";

    BuildSuccessResponse($data, null);


?>