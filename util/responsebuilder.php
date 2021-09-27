<?php

    require "../entity/responsebuilder.php";

    function BuildSuccessResponse($data) {
        header('Content-Type: application/json; charset=utf-8');
        $res = new SuccessResponse();
        $res->code = 200;
        $res->data = $data;

        echo json_encode($res);
    }

    function BuildErrorResponse($code, $error) {
        header('Content-Type: application/json; charset=utf-8');
        $res = new ErrorResponse();
        $res->code = $code;
        $res->message = $error;

        echo json_encode($res);
    }

?>