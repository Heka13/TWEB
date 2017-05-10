<?php
include 'connection.php';

session_start();
$review = $_POST['rev'];
$nameVisitor = $_SESSION['name'];
$nameStructure = $_SESSION['nameStruct'];
$date = date("Y-m-d", strtotime("now"));
$time = date("H:i:s", strtotime("now"));;
$conn = connOpen();

$query = "INSERT INTO reviews (nameVisitor,nameStructure,review,insertDate,insertTime)
          VALUES  ('$nameVisitor','$nameStructure', '$review','$date','$time')";
if($conn->query($query)){
  echo "true";
}
else{
  echo "false";
}

connClose($conn);
$_SESSION['rev'] = $review;


?>
