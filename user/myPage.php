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
  <div class="background-container">
  </div>
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

<div class="container">
  <div class="content">

    <div class="box">

      <div class="portrait left">
      <?php
        if($_SESSION['image'] != NULL ){
      ?>
        <img src="<?=$_SESSION['image']?>" alt="img found" id="personalImg"/>
      <?php
        }
        else{
      ?>
        <img src="/TWEB/img/default/defaultperson.png" alt="img not found" id="personalImg"/>
      <?php
        }
      ?></div>
      <div class="info left">
        <div id="info">
          <div class="single-info">
          <div class="left infop">Nome:</div><div class="left"> <?=$_SESSION['name']?></div>
          <div class="clear-fix"></div>
          </div>

          <div class="single-info">
          <div class="left infop">Etá:</div><div class="left"> 10</div>
          <div class="clear-fix"></div>
          </div>

          <div class="single-info">
          <div class="left infop">Email:</div><div class="left"> fillo@mail.it</div>
          <div class="clear-fix"></div>
          </div>
            </div>
          <div class="clear-fix"></div>
      </div>
       <div class="clear-fix"></div>

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
    <div class="box">
      <div class="slideshowbox slideShowfixouter">
        <div class="slideShowfixinner">
      <?php
        $i = 0;
        while($row =$ris->fetchObject()){
          $i++;
      ?>
      <div class="slideShow" id="myRew<?= $i ?>">
        <img src="<?= $row->image ?>" />
        <div class="clear-fix"></div>
        <div class="slideButtBox">
        <?php if($i>0){ ?>
        <button class="myButton" onclick="scrollRev(-1)">&#10094;</button>
        <button class="myButton" onclick="scrollRev(+1)">&#10095;</button>
        <?php } ?>
        </div>
        <div class="clear-fix"></div>
        <p id="rev"> <?= $row->review ?></p>
        <div class="clear-fix"></div>
      </div>
      <?php

        }
        connClose($conn);
      ?>

      <div class="clear-fix"></div>
    </div>
    </div>
    </div>

  <script src="../js/slideShow.js" type="text/javascript"></script>
  <div class="clear-fix"></div>
</div>
</div>
</body>

</html>
