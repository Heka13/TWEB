<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>

<head>
  <link href="../css/buttons.css" rel="stylesheet" type="text/css">
  <link href="../css/myPage.css" rel="stylesheet" type="text/css">
  <title>TWEB Progetto</title>
</head>

<body>
  <div class="navbar">
    <div id="find">
      <a href="findStructure.html">Find</a>
    </div>
    <div id="add">
      <a href="../html/addStructure.html">Add</a>
    </div>
  </div>
 <div>
   <?=$_SESSION['name']?>
 </div>
<div>
  <img src="<?=$_SESSION['image']?>" alt="img not found" id="personalImg"/>
</div>
</body>

</html>
