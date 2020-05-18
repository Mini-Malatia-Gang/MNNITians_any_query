<?php
require_once('connect.php');
session_start();
if(isset($_POST['logbtn'])){

  $uname = $_POST['usernamelog'];
  $password = $_POST['passwordlog'];

  $sql = "select * from woc_users where username ='".$uname."'AND password ='".$password."'";
  $result = mysqli_query($link, $sql);
  
  if(empty($uname) || empty($password)){
    header("location:Sign in_up.php?Empty5= Please Fill The Entries");
  }
  else{
   if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $row["Name"];
    $_SESSION['Email'] = $row["Email"];
    $_SESSION['ID'] = $row["ID"];
    $_SESSION['user'] = $uname;
    header("location:welcome2.php");
   }
   else {
    header("location:Sign in_up.php?Empty4= Invalid User");
   }
  }
}
?>