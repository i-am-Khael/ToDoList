<?php

   class DeleteIP extends DBConfig {

      private $id;

      public function __construct($id) {

         $this->id = $id;
         
      }
      
      public function DeleteIP() {
         
         $conn = $this->dbConn();
         $query = "DELETE FROM users_ip WHERE id = :id";
         $setData = $conn->prepare($query);
         $setData->bindParam(':id', $this->id, PDO::PARAM_STR);
         $setData->execute();

      }

   }

?>