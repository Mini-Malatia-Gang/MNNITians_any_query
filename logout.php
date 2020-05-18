<?php
session_start();
if(isset($_SESSION['user'])){
if(isset($_GET['logout'])){
  session_destroy();
  header("location:Sign in_up.php");
}
else{
  header("location:Sign in_up.php");
}
}

?>