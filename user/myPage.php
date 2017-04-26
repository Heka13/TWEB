<?php
  include '../php/connection.php';
  session_start();
 ?>
<!DOCTYPE html>
<html>

<head>
  <script src="../js/jQuery.js" type="text/javascript"></script>
  <link href="../css/buttons.css" rel="stylesheet" type="text/css">
  <link href="../css/myPage.css" rel="stylesheet" type="text/css">
  <link href="../css/buttons.css" rel="stylesheet" type="text/css">
  <title>TWEB Progetto</title>
</head>

<body>
  <div class="navbar">
    <form action="../php/searchStruct.php" method="post" id="search">
      Search<input name="searchStruct" type="text" value=""/>
    </form>
    <div id="add">
      <a href="../html/addStructure.html">Add</a>
    </div>
    <form action="../php/logout.php" method="POST" id="log">
      <input type="submit" value="Logout" class="blueButton"/>
    </form>
  </div>
 <div>

   <?=$_SESSION['name']?>
 </div>
<div>
  <img src="<?=$_SESSION['image']?>" alt="img not found" id="personalImg"/>
</div>
  <?php
    $conn= connOpen();
    $query=
      "SELECT review , image
      FROM reviews
      INNER JOIN structure
      ON reviews.nameStructure=structure.name
      WHERE nameVisitor='".$_SESSION["name"]."'
      ";
    $ris = $conn->query($query);
  ?>
  <div id="slideBox">
  <?php
  $i = 0;
  while($row =$ris->fetchObject()){
  ?>
    <div class="slideShow" id="myRew<?= $i ?>">
      <img src="<?= $row->image ?>" />
      <p> <?= $row->review ?></p>
    </div>
  <?php
  $i++;
  }
  connClose($conn);
  ?>
  </div>
  <div class="slideButtBox">
  <button class="slideShowButtLeft" onclick="scrollRev(-1)">&#10094;</button>
  <button class="slideShowButtRight" onclick="scrollRev(+1)">&#10095;</button>
  </div>
  <script src="../js/slideShow.js" type="text/javascript"></script>
</body>

</html>
