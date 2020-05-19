<?php
session_start();
require_once('connect.php');
if(isset($_SESSION['user'])){
if(isset($_POST['postemereply'])){
  if(empty($_POST['emereply'])){
    echo 'Please enter some text';
		header("location:Welcome2.php");
  }
  else{
    $comment = $_POST['emereply'];
    $emequery_id = $_GET['id'];
    $author = $_SESSION['name'];
    $date4 = date("Y-m-d");
    $emereplyquery4 = "INSERT INTO emereplies (emequery_id, author, comment, date_posted) VALUES ('$emequery_id','$author', '$comment','$date4')";
    if($emestmtinsert4 = mysqli_prepare($link, $emereplyquery4)){
      mysqli_stmt_execute($emestmtinsert4);
      header("location:Welcome2.php");
    }
  }
}
}
else{
  header("location:Sign in_up.php");
}
?>