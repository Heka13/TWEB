<?php

include 'connection.php';

session_start();
$username = $_POST['username'];
$password = sha1($_POST['password']);

$conn = connOpen();
$queryImg = "SELECT image FROM registration WHERE name = '$username' AND password = '$password'";
$queryName = "SELECT name FROM registration WHERE name = '$username' AND password = '$password'";

$counter = 0;
foreach ($conn->query($queryImg) as $img) {
      $_SESSION['image'] = $img['image'];
      $counter++;
}
foreach ($conn->query($queryName) as $name) {
      $_SESSION['name'] = $name['name'];
      $counter++;
}
connClose($conn);

if($counter > 0){
  header('Location: ../user/myPage.php');
}
else{
  $_SESSION['error'] = "Autenticazione fallita";
  header('Location: ../user/index.php');
}
