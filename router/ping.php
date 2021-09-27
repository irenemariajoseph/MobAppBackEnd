<?php
    
    require "../entity/ping.php";
    require "../util/responsebuilder.php";
    require "../util/globalvariable.php";
    // . . -> keluar dr titik folder ini 
    
    $data = new Ping();
    $data->time = GetCurrentDateTime();
    $data->message = "you are connected";

    BuildSuccessResponse($data);


?>