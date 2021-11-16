<?php

   class DeleteList extends DBConfig {

      private $ListID;
      private $UserID;
      private $completed = "completed";

      public function __construct($ListID, $UserID) {

         $this->ListID = $ListID;
         $this->UserID = $UserID;

      }

      public function ConfirmPending() {

         $conn = $this->dbConn();
         $query = "UPDATE list SET isComplete = :completed, date_completed = CURRENT_TIMESTAMP WHERE id = :ListID AND user_id = :UserID";
         $setData = $conn->prepare($query);
         $setData->bindParam(':completed', $this->completed, PDO::PARAM_STR);
         $setData->bindParam(':ListID', $this->ListID, PDO::PARAM_STR);
         $setData->bindParam(':UserID', $this->UserID, PDO::PARAM_STR);
         
         if ($setData->execute() == true) {

            echo '
               <div class="ok">
                  <p>Confirmed Successfully!</p>
               </div>
            ';

         } else {

            echo '
               <div class="error">
                  <p>Comfirmation Failed!</p>
               </div>
            ';

         }

      }
      
      public function DeletePending() {

         $conn = $this->dbConn();
         $query = "DELETE FROM list WHERE id = :ListID AND user_id = :UserID";
         $setData = $conn->prepare($query);
         $setData->bindParam(':ListID', $this->ListID, PDO::PARAM_STR);
         $setData->bindParam(':UserID', $this->UserID, PDO::PARAM_STR);
         
         if ($setData->execute() == true) {

            echo '
               <div class="error">
                  <p>Deleted Successfully!</p>
               </div>
            ';

         } else {

            echo '
               <div class="error">
                  <p>Deletion Failed!</p>
               </div>
            ';

         }

      }

      public function DeleteCompleted() {

         $conn = $this->dbConn();
         $query = "DELETE FROM list WHERE id = :ListID AND user_id = :UserID";
         $setData = $conn->prepare($query);
         $setData->bindParam(':ListID', $this->ListID, PDO::PARAM_STR);
         $setData->bindParam(':UserID', $this->UserID, PDO::PARAM_STR);
         
         if ($setData->execute() == true) {

            echo '
               <div class="error">
                  <p>Deleted Successfully!</p>
               </div>
            ';

         } else {

            echo '
               <div class="error">
                  <p>Deletion Failed!</p>
               </div>
            ';

         }

      }

   }

?>