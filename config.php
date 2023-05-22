<?php
class config{
   private $hostname="localhost";
   private $username="root";
   private $password="";
   private $dbname="akash";
   private $conn;
   public function database_connection(){
   $this->conn=mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname) or die("connection failed: ".$this->conn->connect_error);

   return $this->conn;
   }
}
?>