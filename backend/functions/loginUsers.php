<?php

   function loginUsers() {

      if ( isset($_POST['login']) ) {

         $username = $_POST['username'];
         $username = stripcslashes($username);
         $username = htmlspecialchars($username);
         $username = filter_var($username, FILTER_SANITIZE_STRING);
         
         $password = $_POST['password'];
         $password = stripcslashes($password);
         $password = htmlspecialchars($password);
         $password = filter_var($password, FILTER_SANITIZE_STRING);

         if ( $username ==  null || $password == null ) {

            echo '
               <div class="error">
                  <p>Login Failed!</p>
               </div>
            ';
            
         } elseif ( !preg_match('/^[a-zA-Z\d]{6,100}+$/', $username) ) {
            
            echo '
               <div class="error">
                  <p>
                     Invalid Username!<br/>
                     Characters from Aa-Zz and 0-9 are only accepted!
                  </p>
               </div>
            ';
            
         } elseif ( !preg_match('/^[a-zA-Z\d.+-_!@#$%&*()<>?:;"",]{8,100}+$/', $password) ) {
            
            echo '
               <div class="error">
                  <p>
                     Invalid Password!<br/>
                     Characters from Aa-Zz, 0-9 and some special characters are only accepted!
                  </p>
               </div>
            ';

         } else {

            $login = new Login($username, $password);
            $login->login();

         }

      }

   }

?>