<?php

   function insertList() {

      if ( isset($_POST['addList']) ) {
         
         $id = $_SESSION['userID'];
         $id = stripcslashes($id);
         $id = htmlspecialchars($id);
         $id = filter_var($id, FILTER_SANITIZE_STRING);

         $list = $_POST['list'];
         $list = stripcslashes($list);
         $list = htmlspecialchars($list);
         $list = filter_var($list, FILTER_SANITIZE_STRING);

         if ( $list == null ) {

            echo '
               <div class="error">
                  <p>List is empty!</p>
               </div>
            ';
            
         } elseif ( !preg_match('/^[a-zA-Z\d\s.+-_!@#$%&*()<>?:;"",]{6,255}$/', $list) ) {
            
            echo '
               <div class="error">
                  <p>
                     Invalid List!<br/>
                     Minimum of 6 characters from Aa-Zz 0-9 and some special chracters are only accepted!
                  </p>
               </div>
            ';

         } else {
            
            $list = new InsertList($id, $list);
            $list->list();

         }

      }

   }

?>