<?php

    require "../util/connection.php";

    function CheckExistingUserByEmail($email) {
        $op = "database/CheckExistingUserByEmail";
        
        try {
            $con = GetConnection();

            $query = "SELECT * FROM users WHERE email like ?";

            $result = $con->prepare($query);
            $result->execute([$email]);

            $row = $result->fetch();
            if ($row['email'] != null && $row['email'] == $email) {
                return True;
            }
            
            
            return False;
        } catch (Exception $e) {
            throw new Exception("[$op] $e");
        }

    }

    function InsertUserToDatabase($data) {
        $op = "database/CheckExistingUserByEmail";

        try {
            $con = GetConnection();

            $query = "INSERT INTO users(name, password, email, join_date) VALUES(?,?,?,now())";

            $result = $con->prepare($query);
            $result->execute([
                $data->name,
                $data->password,
                $data->email
            ]);
        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }
?>