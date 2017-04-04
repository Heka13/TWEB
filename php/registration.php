<?php
include 'connection.php';

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$conn = connOpen();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// echo "file temp: ".$_FILES["file"]["tmp_name"]."   path: ".$target_file;
// echo move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
if(is_uploaded_file($_FILES["file"]["tmp_name"])){
  move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  $pathImg = "/TWEB/php/".$target_file;
  }
  else{
      $pathImg = "/TWEB/img/default/default.jpg";
      }
        $query = "INSERT INTO registration (name,password,image) VALUES  ('$username','$password', '$pathImg')";
        $conn->query($query);
        connClose($conn);
        $_SESSION['name'] = $username;
        $_SESSION['ruolo'] = "user";
        $_SESSION['image'] = $pathImg;
        echo "true";
        exit;

?>
