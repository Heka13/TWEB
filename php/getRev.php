<?php
include 'connection.php';
session_start();

$arr = array();
$conn = connOpen();
$query = "SELECT nameVisitor,review,insertDate,insertTime
          FROM reviews
          WHERE nameStructure = '".$_SESSION["nameStruct"]."' ORDER BY insertTime DESC";
  foreach ($conn->query($query) as $result) {
    $parzial = array();
    $parzial['nameVisitor'] = $result['nameVisitor'];
    $parzial['review'] = $result['review'];
    $parzial['insertDate'] = date("d/m/Y",strtotime($result['insertDate']));
    $parzial['insertTime'] = date("h:i:s",strtotime($result['insertTime']));
    $arr[] = $parzial;
}

echo json_encode($arr);
connClose($conn);
