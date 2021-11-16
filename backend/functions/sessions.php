<?php

   function commonSession() {

      if ( !isset($_SESSION) || $_SESSION['userType'] != 'common') {

         session_start();
         unset($_SESSION['userID']);
         unset($_SESSION['userType']);
         unset($_SESSION['userName']);
         session_destroy();
         header('Location: ../index.php?please-login');

      }
      
   }
   
   function adminSession() {
      
      if ( !isset($_SESSION) || $_SESSION['userType'] != 'admin') {
   
         session_start();
         unset($_SESSION['userType']);
         unset($_SESSION['userName']);
         session_destroy();
         header('Location: ../index.php?please-login');
   
      }

   }


?>