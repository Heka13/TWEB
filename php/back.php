<?php
session_start();
if(isset($_SESSION['name'])){
  echo $_SESSION['name'];
  header("Location:../user/myPage.php");
}
else{
  session_destroy();
  header("Location:../user/index.php");
}
?>
