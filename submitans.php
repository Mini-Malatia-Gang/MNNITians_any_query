<?php
session_start();
require_once('connect.php');
if(isset($_SESSION['user'])){
if(isset($_POST['postanswer'])){
  if(empty($_POST['answer'])){
    echo 'Please enter some text';
		header("location:Welcome2.php");
  }
  else{
  $comment = $_POST['answer'];
  $replyres5 = mysqli_query($link, "select * from replies");
  for ($replyset5 = array (); $replyrow5 = mysqli_fetch_assoc($replyres5); $replyset5[] = $replyrow5['reply_id']);
  $reply_id = count($replyset5) + 1;
  $query_id = $_GET['id'];
  $replyres6 = mysqli_query($link, "select * from query where query_id='".$query_id."'");
  $replyrow6 =  mysqli_fetch_assoc($replyres6);
  $cat_id = $replyrow6['cat_id'];
  $subcat_id = $replyrow6['subcat_id'];
  $author = $_SESSION['name'];
  $likes = 0;
  $dislikes = 0;
  $date = date("Y-m-d");
  $replyquery7 = "INSERT INTO replies (cat_id, subcat_id, query_id, author, comment, date_posted, Likes, Dislikes) VALUES ('$cat_id', '$subcat_id','$query_id','$author', '$comment','$date','$likes','$dislikes')";
  if($stmtinsert7 = mysqli_prepare($link, $replyquery7)){
    mysqli_stmt_execute($stmtinsert7);
    mysqli_stmt_close($stmtinsery7);
    header("location:Welcome2.php");
  }
  }
}
}
else{
  header("location:Sign in_up.php");
}
?>