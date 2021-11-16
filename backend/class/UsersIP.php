<?php

   class UsersIP extends DBConfig {

      private $username;
      private $ip;

      public function __construct($username, $ip) {

         $this->username = $username;
         $this->ip = $ip;

      }

      public function UserIP() {

         $conn = $this->dbConn();
         $query = "INSERT INTO users_ip(username, ip) VALUES(:username, :ip)";
         $setData = $conn->prepare($query);
         $setData->bindParam(':username', $this->username, PDO::PARAM_STR);
         $setData->bindParam(':ip', $this->ip, PDO::PARAM_STR);
         $setData->execute();

      }

   }

?>