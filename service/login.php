<?php
    require "../database/users.php";

    /**
     * @return object
     */
    function LoginUser($param) {
        $op = "service/LoginUser";
        // buat ngecek bener ato ga emailnya 
        $data = CheckUserInputLogin($param);
        // if ($data instanceof Exception) { // ini error ato ga, klo bukan error brrti boolean 
        //     return $data;
        // }
        
        // if (empty($data)) {
        //     return new Exception("[$op] Invalid username / password!");
        // }
        
        // if (!password_verify($param->password, $data->password)){
        //     return new Exception("[$op] Invalid username / password!");
        // }
        return $data;
    }


    
    /**
     * @return object
     */
    function ChangePassword($param) {
        $op = "service/LoginUser";
        // buat ngecek bener ato ga emailnya 
        $param->password = password_hash($param->password, PASSWORD_BCRYPT);
        $data = ChangePasswordinDB($param);
        if ($data instanceof Exception) {
            return $data;
        }
         


        $data = ChangePasswordinDB($param);
       
        return $data;
    }


    
    /**
     * @return object
     */
    function ChangeEmail($param) {
        $op = "service/ChangeEmail";

       
        $data = ChangeEmailinDB($param);
        
        
        return $data;
      
          
                  
        }// ini error ato ga, klo bukan error brrti boolean 
           
        
        

    
   




?>