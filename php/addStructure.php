<?php
  include 'connection.php';

  session_start();
  $struct = $_POST['struct'];
  $address = $_POST['addr'];
  $conn = connOpen();

  $pathImg = "/TWEB/img/default/defaultstructure.jpeg";
  $target_dir = "uploadsStruct/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  if(is_uploaded_file($_FILES["file"]["tmp_name"])){
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $pathImg = "/TWEB/php/".$target_file;
    $query = "INSERT INTO structure (name,address,image) VALUES  ('$struct','$address', '$pathImg')";
    $conn->query($query);
    connClose($conn);
    $_SESSION['nameStruct'] = $struct;
    $_SESSION['imageStruct'] = $pathImg;
    echo "true";
  }
  else {
    $query = "INSERT INTO structure (name,address,image) VALUES  ('$struct','$address', '$pathImg')";
    $conn->query($query);
    connClose($conn);
    $_SESSION['nameStruct'] = $struct;
    $_SESSION['imageStruct'] = $pathImg;
    header("Location:../user/structPage.php");
  }
