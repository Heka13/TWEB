<?php

function connOpen(){
  $servername = "localhost";
  $username = "root";
  $password = "root";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=TWEB", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
      }
  catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }

}

function connClose($conn){
  $conn = null;
}
