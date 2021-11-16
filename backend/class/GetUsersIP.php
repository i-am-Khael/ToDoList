<?php

   class GetUsersIP extends DBConfig {

      public function GetUsersIP() {

         $conn = $this->dbConn();
         $query = "SELECT * FROM users_ip";
         $setData = $conn->prepare($query);
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
               echo "<td>$data[username]</td>";
               echo "<td>$data[ip]</td>";
               echo "<td>$data[date_inserted]</td>";
               echo "<td>
                        <form method='POST'>
                           <a class='btn-delete' href='?userIP=$data[id]'>DELETE</a>
                        </form></td>";
               echo '</tr>';
   
            }

         }

      }

   }

?>