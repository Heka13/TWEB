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
  <title>TWEB Progetto</title>
</head>

<body>
  <div class="navbar">
    <img src="../img/logoTweb.jpg"  id="logoImg"/>
    <form action="../php/logout.php" method="POST" id="log">
      <input type="submit" value="Logout" class="myButton"/>
    </form>
    <form action="../html/addStructure.html" method="post" id="add">
      <input type="submit" value="Add" class="myButton"/>
    </form>
    <form action="../php/searchStruct.php" method="post" id="search">
      <input name="searchStruct" type="text" value="Structure name"/>
      <input type="submit" value="Search" class="myButton"/>
    </form>
  </div>
  <div class="portrait">
    <div id="info"><?=$_SESSION['name']?></div>
  </div>
  <div class="portrait">
    <img src="../img/framePersonalImg.jpeg" id="frameImg"/>
    <img src="<?=$_SESSION['image']?>" alt="img not found" id="personalImg"/>
  </div>

  <div class="lineSeparator"></div>

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
  <div class="portrait">
    <?php
      $i = 0;
      while($row =$ris->fetchObject()){
    ?>
    <div class="slideShow" id="myRew<?= $i ?>">
      <img src="<?= $row->image ?>" />
      <p id="rev"> <?= $row->review ?></p>
    </div>
    <?php
      $i++;
      }
      connClose($conn);
    ?>
    <div id="slideButtBox">
    <?php if($i>0){ ?>
    <button class="myButton" onclick="scrollRev(-1)">&#10094;</button>
    <button class="myButton" onclick="scrollRev(+1)">&#10095;</button>
    <?php } ?>
    </div>
  </div>

  <script src="../js/slideShow.js" type="text/javascript"></script>
</body>

</html>
