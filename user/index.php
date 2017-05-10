<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <script src="../js/jQuery.js" type="text/javascript"></script>
  <link href="../css/buttons.css" rel="stylesheet" type="text/css">
  <link href="../css/index.css" rel="stylesheet" type="text/css">
  <title>TWEB Progetto</title>
</head>

<body>
  <div class="navbar">
    <div>
      <img src="../img/logoTweb.jpg"  id="logoImg"/>
    </div>
      <p class="title">My Sweet</p>
    <form action="../html/registration.html" id="reg">
      <input type="submit" value="Registration" class="myButton"/>
    </form>
    <form action="../php/login.php" method="POST" id="log">
      User: <input name="username" type="text" value=""/>
      Password: <input name="password" type="password" value=""/>
      <input type="submit" value="Login" class="myButton"/>
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
