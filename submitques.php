<?php
session_start();
require_once('connect.php');
if(isset($_SESSION['user'])){
  if(isset($_POST['createques'])){
    if(empty($_POST['questab'])){
      echo 'Please enter some text';
		  header("location:Welcome2.php");
    }
    else{
      $content = $_POST['questab'];
      $subcategory = $_POST['Category'];
      $author = $_SESSION['name'];
      $date_posted = date("Y-m-d");
      $sql3 = "select * from subcategories where subcat_name ='".$subcategory."'";
      $result3 = mysqli_query($link, $sql3);
      $subcatresult = mysqli_query($link, $sql3);
      $subcatdata = mysqli_fetch_assoc($subcatresult);
      $cat_id = $subcatdata['parent_id'];
      $subcat_id = $subcatdata['Subcat_id'];
      $sql = "INSERT INTO query (cat_id, subcat_id, author, content, date_posted) VALUES ('$cat_id', '$subcat_id', '$author', '$content','$date_posted')";
      if($stmtinsert = mysqli_prepare($link, $sql)){
        mysqli_stmt_execute($stmtinsert);
        mysqli_stmt_close($stmtinsert);
        header("location:Welcome2.php");
      }
    }
  }
  elseif (isset($_POST['redbtn'])){
    if(empty($_POST['questab'])){
      echo 'Please enter some text';
      header("location:Welcome2.php");
    }
    else{
      $content = $_POST['questab'];
      $date_posted = date("Y-m-d");
      $author = $_SESSION['name'];
      $emesql = "INSERT INTO emequery (author, content, date_posted) VALUES ('$author', '$content','$date_posted')";
      if($emestmtinsert = mysqli_prepare($link, $emesql)){
        mysqli_stmt_execute($emestmtinsert);
        mysqli_stmt_close($emestmtinsert);
        header("location:Welcome2.php");
      }
    }
  }
}
else{
  header("location:Sign in_up.php");
}
?>