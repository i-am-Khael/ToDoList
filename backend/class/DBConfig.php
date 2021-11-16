<?php

   class DBConfig {

      private $dbUser = 'root';
      private $dbPass = '';
      private $dbConn;

      public function dbConn() {

         try {

            $this->dbConn = new PDO('mysql:host=localhost;dbname=todolist', $this->dbUser, $this->dbPass);

         } catch (PDOException $e) {

            die($e->getMessage());

         }

         return $this->dbConn;

      }

   }

?>