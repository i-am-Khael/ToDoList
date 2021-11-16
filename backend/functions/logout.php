<?php

   session_start();
   unset($_SESSION['userType']);
   unset($_SESSION['userName']);
   session_destroy();
   header('Location: ../../index.php?logout-success');

?>
