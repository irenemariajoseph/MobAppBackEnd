<?php

    require "../util/connection.php";
     // check email udh terdaftar 
     /**
     * @return object
     */
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

     // masukin data user pas create acc
     /**
     * @return object
     */
    function InsertUserToDatabase($param) {
        $op = "database/CheckExistingUserByEmail";

        try {
            $con = GetConnection();

            $query = "INSERT INTO users(name, password, email, role, join_date) VALUES(?,?,?, 'user'  , now())";

            $result = $con->prepare($query);
            $result->execute([
                $param->name,
                $param->password,
                $param->email,
               
            ]);
        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }

    // ambil data email pass buat login 
    /**
     * @return object
     */
    function CheckUserInputLogin($email) {
        $op = "database/CheckExistingUserByEmail";
        
        try {
            $con = GetConnection();

            $query = "SELECT * FROM users WHERE email like ?";

            $result = $con->prepare($query);
            $result->execute([$email]);

            $row = $result->fetch();
            
            $loginuser = new UsersLogin();
            $loginuser -> email = $row['email'];
            $loginuser -> password = $row['password'];
            return $loginuser;
        
        } catch (Exception $e) {
            throw new Exception("[$op] $e");
        }

    }

    /**
     * @return object
     */
    function ChangePassword($password) {
        $op = "database/ChangePassword";
        
        try {
            $con = GetConnection();

            $query = "SELECT * FROM users WHERE password like ?";

            $result = $con->prepare($query);
            $result->execute([$password]);

            $row = $result->fetch();
            
            $changepassword= new ChangePassword();
            $changepassword -> password = $row['password'];

            //$query = "UPDATE users SET  password ='$password'";
           

            return $changepassword;
        
        } catch (Exception $e) {
            throw new Exception("[$op] $e");
        }

    }
    
?>