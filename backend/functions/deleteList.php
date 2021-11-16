<?php

   function confirmPending() {

      if ( isset($_GET['confirm']) ) {

         $ListID = $_GET['confirm'];
         $ListID = stripcslashes($ListID);
         $ListID = htmlspecialchars($ListID);
         $ListID = filter_var($ListID, FILTER_SANITIZE_URL);
         $ListID = filter_var($ListID, FILTER_SANITIZE_STRING);

         $confirm = new DeleteList($ListID, $_SESSION['userID']);
         $confirm->ConfirmPending();

      }

   }
   
   function deletePending() {

      if ( isset($_GET['pending']) ) {

         $ListID = $_GET['pending'];
         $ListID = stripcslashes($ListID);
         $ListID = htmlspecialchars($ListID);
         $ListID = filter_var($ListID, FILTER_SANITIZE_URL);
         $ListID = filter_var($ListID, FILTER_SANITIZE_STRING);

         $confirm = new DeleteList($ListID, $_SESSION['userID']);
         $confirm->DeletePending();

      }

   }
   
   function deleteCompleted() {

      if ( isset($_GET['completed']) ) {

         $ListID = $_GET['completed'];
         $ListID = stripcslashes($ListID);
         $ListID = htmlspecialchars($ListID);
         $ListID = filter_var($ListID, FILTER_SANITIZE_URL);
         $ListID = filter_var($ListID, FILTER_SANITIZE_STRING);

         $confirm = new DeleteList($ListID, $_SESSION['userID']);
         $confirm->DeletePending();

      }

   }

?>