<?php

    require "../entity/responsebuilder.php";

    function BuildSuccessResponse($data, $error) {
        $res = new SuccessResponse();
        $res->code = 200;
        $res->error = $error;
        $res->data = $data;

        echo json_encode($res);
    }

?>