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
 <div>
   <?=$_SESSION['nameStruct'];?>
 </div>
 <form action="../php/back.php" method="POST" id="log">
  <input type="submit" value="Back" class="myButton"/>
 </form>
 <div>
  <img src="<?=$_SESSION['imageStruct'];?>" alt="img not found" id="personalImg"/>
 </div>

 <div id="review-container">
   Inserisci commento:
   <div id="addRev" class="addRev">
     <input name="rev" type="text" value=""/>
     <input name="public" type="button" value="Public" class="blueButton"/>
   </div>

   <div id="pastRev">
     <?php
        $conn = connOpen();
        $query = "SELECT nameVisitor,review,insertDate,insertTime FROM reviews
                  WHERE nameStructure = '".$_SESSION["nameStruct"]."'
                  ORDER BY insertTime DESC";
        foreach ($conn->query($query) as $result) {
     ?>
     <div>
       <?php
         echo $result['nameVisitor']." ".$result['review'];
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
