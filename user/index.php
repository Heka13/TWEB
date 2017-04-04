<?php
  session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <script src="../js/jQuery.js" type="text/javascript"></script>
  <link href="../css/buttons.css" rel="stylesheet" type="text/css">
  <title>TWEB Progetto</title>
</head>

<body>
  <div class="navbar">
    <div id="reg">
      <a href="../html/registration.html">Registration</a>
    </div>
    <form action="../php/login.php" method="POST" id="log">
      User:<input name="username" type="text" value=""/>
      Password:<input name="password" type="password" value=""/>
      <input type="submit" value="Login" class="blueButton"/>
    </form>
  </div>
  <div class="error_box" id="error_box">
    <?php
      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        $_SESSION['error'] = "";
      }
    ?>
  </div>
  <script>
    setTimeout(function(){
      $("#error_box").fadeOut("slow");
      setTimeout(function(){
        $("#error_box").empty();
        $("#error_box").show();
      },1000);
    },3000);
  </script>
</body>

</html>
