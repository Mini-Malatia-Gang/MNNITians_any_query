<?php
session_start();
require_once('connect.php');

if(isset($_SESSION['user'])){
  if(isset($_GET['like'])){
    $likeres = mysqli_query($link, "select * from replies where reply_id='".$_GET['like']."'");
    $likerow =  mysqli_fetch_assoc($likeres);
    $likes = $likerow['Likes'];
    $likes = $likes + 1;
    $likeinsertres = mysqli_query($link, "UPDATE replies SET Likes = '".$likes."' WHERE reply_id = '".$_GET['like']."'");
    $stmtinsert9 = mysqli_prepare($link, $likeinsertres);
    mysqli_stmt_execute($stmtinsert9);
    header("location:Welcome2.php");
  }
  if(isset($_GET['dislike'])){
    $dislikeres = mysqli_query($link, "select * from replies where reply_id='".$_GET['dislike']."'");
    $dislikerow =  mysqli_fetch_assoc($dislikeres);
    $dislikes = $dislikerow['Dislikes'];
    $dislikes = $dislikes + 1;
    $likeinsertres = mysqli_query($link, "UPDATE replies SET Dislikes = '".$dislikes."' WHERE reply_id = '".$_GET['dislike']."'");
    $stmtinsert9 = mysqli_prepare($link, $likeinsertres);
    mysqli_stmt_execute($stmtinsert9);
    header("location:Welcome2.php");
  }
}
else{
  header("location:Sign in_up.php");
}
?>