<?php

   class Register extends DBConfig {

      private $username;
      private $password;

      public function __construct($username, $password) {

         $this->username = $username;
         $this->password = $password;

      }

      public function register() {
         
         $conn = $this->dbConn();
         $query = "INSERT INTO users(username, password) VALUES(:username, :password)";
         $setData = $conn->prepare($query);
         $setData->bindParam(':username', $this->username, PDO::PARAM_STR);
         $setData->bindParam(':password', $this->password, PDO::PARAM_STR);

         if ($setData->execute() == true) {

            echo '
               <div class="ok">
                  <p>Register Successfully!</p>
               </div>
            ';
            
         } else {
            
            echo '
               <div class="error">
                  <p>Registration Failed!</p>
               </div>
            ';

         }
         
      }

   }

?>