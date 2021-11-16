<?php

   function deleteAccount() {

      if ( isset($_POST['deleteAccount'])) {

         $delete = new DeleteAccount($_SESSION['userID']);
         $delete->DeleteAccount();

      }

   }

?>