<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>

<head>
  <link href="../css/buttons.css" rel="stylesheet" type="text/css">
  <link href="../css/structPage.css" rel="stylesheet" type="text/css">
  <title>TWEB Progetto</title>
</head>

<body>
 <div>
   <?=$_SESSION['nameStruct']?>
 </div>
<div>
  <img src="<?=$_SESSION['imageStruct']?>" alt="img not found" id="personalImg"/>
</div>
</body>

</html>
