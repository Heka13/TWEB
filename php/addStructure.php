<?php
include 'connection.php';

session_start();
$struct = $_POST['struct'];
$address = $_POST['addr'];
$conn = connOpen();

$target_dir = "uploadsStruct/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//echo basename($_FILES["file"]["name"]).'   ';
if(is_uploaded_file($_FILES["file"]["tmp_name"])){
  move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  $pathImg = "/TWEB/php/".$target_file;
  }
  else{
      $pathImg = "/TWEB/img/default/default.jpg";
      }
        $query = "INSERT INTO structure (name,address,image) VALUES  ('$struct','$address', '$pathImg')";
        $conn->query($query);
        connClose($conn);
        $_SESSION['nameStruct'] = $struct;
        $_SESSION['imageStruct'] = $pathImg;
        echo "true";
        exit;

?>//stepasqu93@gmail.com
// prova prova
