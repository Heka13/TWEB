<?php
  include 'connection.php';

  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $conn = connOpen();

  $pathImg = "/TWEB/img/default/default.jpg";
  $target_dir = "uploads/";

  if((isset($_FILES["file"]["name"]))&&(is_uploaded_file($_FILES["file"]["tmp_name"]))){
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $pathImg = "/TWEB/php/".$target_file;
    $query = "INSERT INTO registration (name,password,image) VALUES  ('$username','$password', '$pathImg')";
    $conn->query($query);
    connClose($conn);
    $_SESSION['name'] = $username;
    $_SESSION['image'] = $pathImg;
    echo "true";
  }
  else {
    $query = "INSERT INTO registration (name,password,image) VALUES  ('$username','$password', '$pathImg')";
    $conn->query($query);
    connClose($conn);
    $_SESSION['name'] = $username;
    $_SESSION['image'] = $pathImg;
   header("Location:../user/myPage.php");
  }
