<?php

   class GetList extends DBConfig {

      private $UserID;
      private $pending = 'pending';
      private $completed = 'completed';

      public function __construct($UserID) {

         $this->UserID = $UserID;

      }

      public function getPendingList() {

         $conn = $this->dbConn();
         $query = "SELECT * FROM list WHERE user_id = :UserID AND isComplete = :pending ORDER BY date_created DESC";
         $setData = $conn->prepare($query);
         $setData->bindParam(':UserID', $this->UserID, PDO::PARAM_STR);
         $setData->bindParam(':pending', $this->pending, PDO::PARAM_STR);
         $setData->execute();
         $getResult = $setData->fetchAll(PDO::FETCH_ASSOC);

         if ( count($getResult) == 0 ) {

            echo '<tr>';
            echo "<td>Unavailable</td>";
            echo "<td>Unavailable</td>";
            echo "<td>Unavailable</td>";
            echo '</tr>';

         } else {

            foreach ( $getResult as $data ) {
   
               echo '<tr>';
               echo "<td>$data[list]</td>";
               echo "<td>$data[isComplete]</td>";
               echo "<td>
                        <form method='POST'>
                           <a class='btn-ok' href='?confirm=$data[id]'>CONFIRM</a>
                           <a class='btn-delete' href='?pending=$data[id]'>DELETE</a>
                        </form></td>";
               echo '</tr>';
   
            }

         }

      }
      
      public function getCompletedList() {

         $conn = $this->dbConn();
         $query = "SELECT * FROM list WHERE user_id = :UserID AND isComplete = :completed ORDER BY date_completed DESC";
         $setData = $conn->prepare($query);
         $setData->bindParam(':UserID', $this->UserID, PDO::PARAM_STR);
         $setData->bindParam(':completed', $this->completed, PDO::PARAM_STR);
         $setData->execute();
         $getResult = $setData->fetchAll(PDO::FETCH_ASSOC);

         if ( count($getResult) == 0 ) {

            echo '<tr>';
            echo "<td>Unavailable</td>";
            echo "<td>Unavailable</td>";
            echo "<td>Unavailable</td>";
            echo '</tr>';

         } else {

            foreach ( $getResult as $data ) {
   
               echo '<tr>';
               echo "<td>$data[list]</td>";
               echo "<td>$data[isComplete]</td>";
               echo "<td>
                        <form method='POST'>
                           <a class='btn-delete' href='?completed=$data[id]'>DELETE</a>
                        </form></td>";
               echo '</tr>';
   
            }

         }

      }

   }

?>