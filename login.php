  <?php
require_once('connect.php');
if(isset($_POST['logbtn'])){

  $uname = $_POST['usernamelog'];
  $password = $_POST['passwordlog'];

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