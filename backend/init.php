<?php

   require_once 'functions/registerUsers.php';
   require_once 'functions/loginUsers.php';
   require_once 'functions/sessions.php';
   require_once 'functions/insertList.php';
   require_once 'functions/deleteList.php';
   require_once 'functions/deleteAccount.php';
   require_once 'functions/usersIP.php';
   require_once 'functions/deleteIP.php';

   spl_autoload_register(function($class){

      require_once $_SERVER['DOCUMENT_ROOT'].'/todolist/backend/class/'.$class.'.php';

   });

?>