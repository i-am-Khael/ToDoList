<?php

   function registerUsers() {
      
      if (isset($_POST['register'])) {
         
         $username = $_POST['username'];
         $username = stripcslashes($username);
         $username = htmlspecialchars($username);
         $username = filter_var($username, FILTER_SANITIZE_STRING);
   
         $password = $_POST['password'];
         $password = stripcslashes($password);
         $password = htmlspecialchars($password);
         $password = filter_var($password, FILTER_SANITIZE_STRING);
   
         $db = new DBConfig(); $conn = $db->dbConn();
         $query = "SELECT username FROM users WHERE username = :username";
         $setData = $conn->prepare($query);
         $setData->bindParam(':username', $username, PDO::PARAM_STR);
         $setData->execute();
         $getResult = $setData->fetch(PDO::FETCH_ASSOC);

         if ($username == null || $password == null) {

            echo '
               <div class="error">
                  <p>Some field(s) is/are empty!</p>
               </div>
            ';
            
         } elseif ( $getResult['username'] > 0 ) {
            
            echo '
               <div class="error">
                  <p>Username is already registered!</p>
               </div>
            ';
            
         } elseif ( !preg_match('/^[a-zA-Z\d]{6,100}+$/', $username)) {
            
            echo '
               <div class="error">
                  <p>Invalid Username!<br/>Characters from Aa-Zz and 0-9 are only accepted.</p>
               </div>
            ';
            
         } elseif ( !preg_match('/^[a-zA-Z\d.+-_!@#$%&*()<>?:;"",]{8,255}+$/', $password) ) {
            
            echo '
               <div class="error">
                  <p>Invalid Password!<br/>Characters from Aa-Zz, 0-9 and some special characters are only accepted.</p>
               </div>
            ';

         } else {

            $password = password_hash($password, PASSWORD_DEFAULT);
            $register = new Register($username, $password);
            $register->register();

         }

      }

   }

?>