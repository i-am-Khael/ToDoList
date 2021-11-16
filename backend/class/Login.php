<?php

   class Login extends DBConfig {

      private $username;
      private $password;

      public function __construct($username, $password) {

         $this->username = $username;
         $this->password = $password;

      }

      public function login() {

         $conn = $this->dbConn();
         $query = "SELECT * FROM users WHERE username = :username";
         $setData = $conn->prepare($query);
         $setData->bindParam(':username', $this->username, PDO::PARAM_STR);
         $setData->execute();
         $getResult = $setData->fetch(PDO::FETCH_ASSOC);

         $verified = password_verify($this->password, $getResult['password']); 

         if ( $getResult > 0 && $verified == true && $getResult['user_type'] == 'common' ) {

            session_start();
            $_SESSION['userID'] = $getResult['id'];
            $_SESSION['userType'] = $getResult['user_type'];
            $_SESSION['userName'] = $getResult['username'];
            header('Location: user/home.php');
            
         } elseif ( $getResult > 0 && $verified == true && $getResult['user_type'] == 'admin' ) {
            
            session_start();
            $_SESSION['userType'] = $getResult['user_type'];
            $_SESSION['userName'] = $getResult['username'];
            header('Location: admin/dashboard.php');

         } else {

            echo '
               <div class="error">
                  <p>Login Failed!</p>
               </div>
            ';

         }

      }

   }

?>