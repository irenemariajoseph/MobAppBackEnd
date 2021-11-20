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
    function CheckUserInputLogin($param) {
        $op = "database/CheckExistingUserByEmail";
        
        try {
            $con = GetConnection();



            $query = "SELECT * FROM users WHERE email like ?";

            $result = $con->prepare($query);
            $result->execute([$param -> email]);
            
            

            if ($row = $result->fetch()) {
                if (password_verify($param -> password, $row['password'])) {
                    $loginuser = new UsersLogin();
                    $loginuser -> email = $row['email'];
                    $loginuser -> password = $row['password'];
                    $loginuser -> role = $row['role'];
                    $loginuser -> name = $row['name'];
                    $loginuser -> id = $row['id'];
                    return $loginuser;
                } else {
                    return new Exception("[$op] Invalid username / password!");
                }
            } else {
                return new Exception("[$op] Invalid username / password!");
            }
            
            
           
            


            // $userrole = new Role();
            // $userrole -> role = $row['role'];
            // return $userrole;
            
        
        } catch (Exception $e) {
            throw new Exception("[$op] $e");
        }

    }

    /**
     * @return object
     */
    function ChangePasswordinDB($param) {
        $op = "database/ChangePassword";
        
        try {
            $con = GetConnection();

            $query = "UPDATE users SET password = ? WHERE email = ?";
              
     

            $result = $con->prepare($query);
            $result->execute([
                $param->password,
                $param->email
               
            ]);
           

        } catch (Exception $e) {
            throw new Exception("[$op] $e");
        }

    }

         /**
     * @return object
     */
    function ChangeEmailinDB($param) {
        $op = "database/UpdateStatusinDB";

        try {
            $con = GetConnection();

            
            $query = "UPDATE users SET email =  ?  WHERE email = ?";
              
            $result = $con->prepare($query);
            $result->execute([
                $param -> emailbaru,
                $param -> email
               
            ]);

        } catch (\Exception $e) {
            throw new Exception("[$op] $e");
        }
    }
?>



