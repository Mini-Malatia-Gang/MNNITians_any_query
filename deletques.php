<?php
session_start();
require_once('connect.php');

if(isset($_SESSION['user'])){
  if(isset($_GET['id'])){
    $delquery = mysqli_query($link, "DELETE FROM query WHERE query_id = '".$_GET['id']."'");
    $deltinsert7 = mysqli_prepare($link, $delquery);
    mysqli_stmt_execute($deltinsert7);
    mysqli_stmt_close($deltinsery7);
    header("location:Welcome2.php?answer=showpage");
  }
}
else{
  header("location:Sign in_up.php");
}
?>