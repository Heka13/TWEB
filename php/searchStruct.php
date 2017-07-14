<?php
include 'connection.php';
session_start();
$searched = $_POST['searchStruct'];
$conn = connOpen();

$query = "SELECT name,address,image FROM structure WHERE name = '".$searched."' ";
$queryName = "SELECT name FROM structure WHERE name = '$searched'";

$counter = 0;
foreach ($conn->query($queryName) as $name) {
      $counter++;
}
connClose($conn);

if($counter > 0){
  $result = $conn->query($query);
  $row =$result->fetchObject();
  $_SESSION['nameStruct'] = $row->name;
  $_SESSION['imageStruct'] = $row->image;
  header('Location: ../user/structPage.php');
}
else{
  $_SESSION['error'] = "Autenticazione fallita";
  header('Location: ../user/myPage.php');
}
