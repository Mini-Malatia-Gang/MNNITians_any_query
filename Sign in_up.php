<?php
require_once('connect.php');
if(isset($_POST['regbtn'])){
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $username = $_POST['usernamereg'];
  $password = $_POST['passwordreg'];

  $sql = "INSERT INTO woc_users (Name, Email, Username, Password) VALUES (?,?,?,?)";
  if ($stmtinsert = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmtinsert, 'ssss', $name, $email, $username, $password);
    mysqli_stmt_execute($stmtinsert);
    mysqli_stmt_close($stmtinsert);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="./css/styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="back">
    <div class="form">
      <div class="signuptext" id="signuptext" onclick="dislayRegistration()">
        <h1>Sign Up</h1>
      </div>
      <div class="logintext" id="logintext" onclick="dislayLogin()">
        <h1>Log In</h1>
      </div>
      <div class="mainform">
      <div class="reg" id="registrationform">
      <form action="registration.php" method="POST">
        <div class="namereg">
          <input class="nameregcontent" type="text" placeholder="First &amp; Last name" name="name">
          <i class="fa fa-user icon" style="font-size: 25px;position: absolute; left: 10px;top: 9px;"></i>
        </div>
        <div class="emailreg">
          <input class="emailregcontent" type="email" placeholder="Email" name="email">
          <i class="fas fa-envelope" style="font-size: 25px;position: absolute; left: 10px;top: 9px;"></i>
        </div>
        <div class="usernamereg">
          <input class="usernameregcontent" type="text" placeholder="UserName" name="usernamereg">
          <i class="fas fa-user-circle" style="font-size: 25px;position: absolute; left: 10px;top: 9px;"></i>
        </div>
        <div class="passwordreg">
          <input class="passwordregcontent" type="password" placeholder="Password" name="passwordreg">
          <i class="fas fa-lock" style="font-size: 25px;position: absolute; left: 10px;top: 9px;"></i>
        </div>
        <input type="submit" class="regbtn" name="regbtn" value="Sign Up">
      </form>
      </div>
      <div class="log" id="loginform">
        <form action="login.php" method="POST">
          <div class="usernamelog">
            <input class="usernamelogcontent" type="text" placeholder="Username" name="usernamelog">
            <i class="fas fa-user-circle" style="font-size: 25px;position: absolute; left: 10px;top: 9px;"></i>
          </div>
          <div class="passwordlog">
            <input class="passwordlogcontent" type="password" placeholder="Password" name="passwordlog">
            <i class="fas fa-lock" style="font-size: 25px;position: absolute; left: 10px;top: 9px;"></i>
          </div>
    
          <input class="logbtn" type="Submit" name="logbtn" value="Log In">
        </form>
      </div>
      </div>
    </div>
  </div>
</body>
<script src="./js/functions.js"></script>
</html>
