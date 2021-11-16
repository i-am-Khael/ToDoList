<?php

   class DeleteAccount extends DBConfig {

      private $UserID;

      public function __construct($UserID) {

         $this->UserID = $UserID;

      }

      public function DeleteAccount() {

         $conn = $this->dbConn();
         $query = "DELETE FROM users WHERE id = :UserID";
         $setData = $conn->prepare($query);
         $setData->bindParam(':UserID', $this->UserID, PDO::PARAM_STR);
         
         if ($setData->execute() == true ) {

            session_start();
            unset($_SESSION['id']);
            unset($_SESSION['username']);
            session_destroy();
            header('Location: ../index.php?deleted-account');

         } else {

            return false;

         }

      }

   }

?>