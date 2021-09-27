<?php

    function ValidateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return False;
        }
        return True;
    }

    function ValidateName($name) {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            return False;
        }
        return True;
    }

?>