<?php
    
    require "../entity/ping.php";
    require "../util/responsebuilder.php";

    $data = new Ping();
    $data->time = date('d-m-Y H:i:s', time() + (7*60*60));
    $data->message = "you are connected";

    BuildSuccessResponse($data, null);


?>