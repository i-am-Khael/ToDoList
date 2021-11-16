<?php

   function deleteIP() {

      if ( isset($_GET['userIP'])) {

         $id = $_GET['userIP'];
         $id = stripcslashes($id);
         $id = htmlspecialchars($id);
         $id = filter_var($id, FILTER_SANITIZE_URL);
         $id = filter_var($id, FILTER_SANITIZE_STRING);

         $delete = new DeleteIP($id);
         $delete->deleteIP();

      }

   }

?>