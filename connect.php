<?php

$link = mysqli_connect('localhost', 'root', '','woc');
/*
//Cheking the connrection:
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}
else{
  echo "Connection established";
}*/

if(isset($_POST['username'])){

  $uname = $_POST['username'];
  $password = $_POST['password'];

  $sql = "select * from woc_users where username ='".$uname."'AND password ='".$password."'";
  $result = mysqli_query($link, $sql);
  if(mysqli_num_rows($result)==1){
    echo "Logged in Successfully";
    exit();
  }
  else {
    echo "Invalid Username and Password";
  }

}
?>