<?php

   class InsertList extends DBConfig {

      private $id;
      private $list;

      public function __construct($id, $list) {

         $this->id = $id;
         $this->list = $list;

      }
      
      public function list() {
         
         $conn = $this->dbConn();
         $query = "INSERT INTO list(user_id, list) VALUES(:id, :list)";
         $setData = $conn->prepare($query);
         $setData->bindParam(':id', $this->id, PDO::PARAM_STR);
         $setData->bindParam(':list', $this->list, PDO::PARAM_STR);
         
         if ( $setData->execute() == true ) {

            echo '
               <div class="ok">
                  <p>Added List Successfully!</p>
               </div>
            ';
            
         } else {
            
            echo '
               <div class="error">
                  <p>
                     Invalid List!<br/>
                     Minimum of 6 Characters from Aa-Zz, 0-9 and some special characters are only accepted!
                  </p>
               </div>
            ';

         }

      }

   }

?>