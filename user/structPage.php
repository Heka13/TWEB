<?php
  include '../php/connection.php';
  session_start();
 ?>
<!DOCTYPE html>
<html>

<head>
  <link href="../css/buttons.css" rel="stylesheet" type="text/css">
  <link href="../css/structPage.css" rel="stylesheet" type="text/css">
  <script src="../js/jQuery.js" type="text/javascript"></script>
  <title>TWEB Progetto</title>
</head>

<body>
  <div class="navbar">
    <img src="../img/logoTweb.jpg"  id="logoImg"/>
    <form action="../php/back.php" method="POST" id="back">
      <input type="submit" value="Back" class="myButton"/>
    </form>
  </div>

  <div class="portrait">
    <div id="info"><?=$_SESSION['nameStruct']?></div>
  </div>
  <div class="portrait">
    <img src="../img/framePersonalImg.jpeg" id="frameImg"/>
    <img src="<?=$_SESSION['imageStruct']?>" alt="img not found" id="structImg"/>
  </div>

 <div class="review-container">
   <div id="ins">Add review (max 250 chars):</div>
   <div id="addRev">
     <input name="rev" type="text" value="" id="textRev"/>
     <input name="public" type="button" value="Public" class="myButton"/>
   </div>

   <div id="pastRev">
     <?php
        $conn = connOpen();
        $query = "SELECT nameVisitor,review,insertDate,insertTime FROM reviews
                  WHERE nameStructure = '".$_SESSION["nameStruct"]."'
                  ORDER BY insertTime DESC";
        foreach ($conn->query($query) as $result) {
     ?>
     <div id="nameVisitor">
       From: 
       <?php
         echo $result['nameVisitor'];
       ?>
     </div>
     <div id="rev">
       <?php
         echo $result['review'];
       ?>
     </div>

     <?php
        }
        connClose($conn);
      ?>
    </div>
</div>

<script src="../js/addRev.js" type="text/javascript"></script>
</body>

</html>
