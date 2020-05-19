<?php
session_start();
require_once('connect.php');

if(isset($_SESSION['user'])){
  if(isset($_GET['id'])){
    $delquery = mysqli_query($link, "DELETE FROM query WHERE query_id = '".$_GET['id']."'");
    $deltinsert7 = mysqli_prepare($link, $delquery);
    mysqli_stmt_execute($deltinsert7);
    mysqli_stmt_close($deltinsery7);
    $sqlquery1 = mysqli_query($link, "select * from replies where query_id ='".$_GET['id']."'");
    for($idsets = array(); $idrows= mysqli_fetch_assoc($sqlquery1); $idsets[] = $idrows['reply_id']);
    echo count($idsets);
    for($i=0;$i<count($idsets);$i++){
      $res = mysqli_query($link, "DELETE FROM replies WHERE reply_id = '".$idsets[$i]."'");
      echo $idsets[$i];
      $deltinsert = mysqli_prepare($link, $res);
      mysqli_stmt_execute($deltinsert);
      mysqli_stmt_close($deltinsert);
    }
    header("location:Welcome2.php?answer=showpage");
  }
}
else{
  header("location:Sign in_up.php");
}
?>