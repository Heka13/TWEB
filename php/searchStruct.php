<?php
include 'connection.php';
$searched = $_POST['searchStruct'];
$conn = connOpen();
$query = "SELECT name,address,image FROM structure WHERE name = '".$searched."' ";
$result = $conn->query($query);

$row =$result->fetchObject();
$_SESSION['nameStruct'] = $row->name;
$_SESSION['imageStruct'] = $row->image;

header("Location:../user/structPage.php");


connClose($conn);
