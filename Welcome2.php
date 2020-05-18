<?php
require('connect.php');
session_start();
if(!isset($_SESSION['user'])){
  header("location:Sign in_up.php");
}
function question($i){
  require('connect.php');
  if(!isset($_SESSION['user'])){
    header("location:Sign in_up.php");
  }
  $sql1 = "select * from query where query_id ='".$i."'";
  $result1 = mysqli_query($link, $sql1);
  $data1 = mysqli_fetch_assoc($result1);
  global $ques1;
  $ques1 = $data1['content'];
  global $author1; 
  $author1= $data1['author'];
  global $date1; 
  $date1 = $data1['date_posted'];
  $views1 = $data1['views'];
  $cat1_id = $data1['cat_id'];
  $subcat1_id = $data1['subcat_id'];
  $catsql1 = "select * from categories where cat_id ='".$cat1_id."'";
  $catresult1 = mysqli_query($link, $catsql1);
  $catdata1 = mysqli_fetch_assoc($catresult1);
  $cat1 = $catdata1['category_name'];
  $subcatsql1 = "select * from subcategories where Subcat_id ='".$subcat1_id."'";
  $subcatresult1 = mysqli_query($link, $subcatsql1);
  $subcatdata1 = mysqli_fetch_assoc($subcatresult1);
  global $subcat1;
  $subcat1 = $subcatdata1['subcat_name'];  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./css/styles2.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <!-- Top Navigation Tab -->
  <nav>
    <div class="navbar">
      <div class="tabsnavbar">
        <div class="logonavbar"><b>Synergy</b></div>
        <div class="navlinkhome" id="redtext">
          <i id="redone" class="fas fa-home" style="font-size: 20px;color: rgb(187, 2, 2);"></i>
          <b>Home</b>
        </div>
        <div id="redtextt" class="navlinkcategories" onmouseover="showCategory()" onmouseout="fadeCategory()">
          <i id="redtwo" class="far fa-list-alt" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
          <b>Categories</b>
        </div>
        <div class="navlinkanswers">
          <i class="fas fa-edit" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
          <b>Answer</b>
        </div>
        <div class="navlinksnotification">
          <i class="fas fa-bell" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
          <b>Notification</b>
        </div>
        <div class="navlinksearch">
          <input type="text" class="searchbox" placeholder="Search" name="search">
          <div class="icon"><i class="fas fa-search" style="font-size: 20px;color: rgb(140, 140, 140);"></i></div>
        </div>
        <div class="navlinkusercontrol">
          <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
          <div class="phpusername" style="font-size: 15px;padding-left: 8px;"><?php echo $_SESSION["user"]; ?></div>
        </div>
        <div class="navlinklogout">
          <a href="logout.php?logout"><i class="fas fa-sign-out-alt" style="font-size: 20px;color: red;"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <div class="main">
  <!-- Side Navigation Bar -->
  <div class="sidenav">
      <div class="sidenavtabs">
        <a href="Welcome2.php"><div class="activesidenav">
          <i class="fas fa-comments" style="font-size: 20px;color: rgb(187, 2, 2);"></i>
          <b>News</b>
        </div>
        <a href="Welcome2.php?Cat=15"><div class="passivesidenav1">
          <i class="fas fa-laptop-code" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Computer Club</b>
        </div></a>
        <a href="Welcome2.php?Cat=1"><div class="passivesidenav2">
          <i class="fas fa-futbol" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Football</b>
        </div></a>
        <a href="Welcome2.php?Cat=18"><div class="passivesidenav3">
          <i class="fas fa-desktop" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Computer Science</b>
        </div></a>
        <a href="Welcome2.php?Cat=9"><div class="passivesidenav4">
          <i class="fas fa-archway" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Dramatics</b>
        </div><a>
        <a href="Welcome2.php?Cat=20"><div class="passivesidenav5">
          <i class="fas fa-tools" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Mechanical</b>
        </div></a>
        <a href="Welcome2.php?Cat=16"><div class="passivesidenav6">
          <i class="fas fa-robot" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Robotics</b>
        </div></a>
        <a href="Welcome2.php?Cat=14"><div class="passivesidenav7">
          <i class="fas fa-music" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Music</b>
        </div></a>
        <a href="Welcome2.php?Cat=2"><div class="passivesidenav8">
          <i class="fas fa-bowling-ball" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Cricket</b>
        </div></a>
        <a href="Welcome2.php?Cat=5"><div class="passivesidenav9">
          <i class="fas fa-running" style="font-size: 20px; color: rgb(187, 2, 2);"></i>
          <b style="color: rgb(187, 2, 2);">Athletics</b>
        </div></a>
      </div>
  </div>
  <div class="content">
    <div class="askquescontent">
    <form action="submitques.php" method="POST">
      <div class="askqueslogo">
        <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-left: 20px; margin-top: 20px;"></i>
        <b><?php echo $_SESSION["user"]; ?></b>
        <select id="catagoryselect" name="Category">
          <option value="Computer Club">Computer Club</option>
          <option value="FootBall">FootBall</option>
          <option value="CSE">CSE</option>
          <option value="Dramatics">Dramatics</option>
          <option value="Mechanical">Mechanical</option>
          <option value="Robotics">Robotics</option>
          <option value="Music">Music</option>
          <option value="Cricket">Cricket</option>
          <option value="Athletics">Athletics</option>
          <option value="BasketBall">BasketBall</option>
          <option value="Hockey">Hockey</option>
          <option value="VolleyBall">VolleyBall</option>
          <option value="Skating">Skating</option>
          <option value="Gym">Gym</option>
          <option value="Garbha Dance">Garbha Dance</option>
          <option value="Western Dance">Western Dance</option>
          <option value="Arts">Arts</option>
          <option value="Bhangda">Bhangda</option>
          <option value="Aero Club">Aero Club</option>
          <option value="IT">IT</option>
          <option value="Electrical">Electrical</option>
          <option value="Biotechnlogy">Biotechnlogy</option>
          <option value="Civil">Civil</option>
        </select>
      </div>
      <input type="text" name="questab" placeholder="Ask Your Question" class="questab">
      <input type="submit" name="createques" value="Submit" class="createques">
    </form>
    </div><br>
      <?php 
      if(@$_GET['Cat']==true){
        $quesres = mysqli_query($link, "select * from query where subcat_id ='".$_GET['Cat']."'");
        for ($quesset = array (); $quesrow = mysqli_fetch_assoc($quesres); $quesset[] = $quesrow['query_id']);
        if(count($quesset)==0){
          echo '<div class="questions" style="text-align: center"><b>NO QUESTIONS TO DISPLAY</b>
            </div><br>';
        }
        else{
          for($m=count($quesset)-1;$m>=0;$m=$m-1){
            $j = $quesset[$m];
            question($j);
            echo '<div class="questions">
            <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-top: 20px;"></i>
            <b style="color: rgb(187, 2, 2);">'.$author1.'</b>
            <i class="fas fa-tag" style="font-size: 20px;color: rgb(187, 2, 2); margin-left:350px; margin-top: 5px;"></i>
            <b style="color: rgb(187, 2, 2); font-size: 13px;">'.$subcat1.'</b><br><br>
            <i class="fas fa-clock"></i>
            <b style="color: rgb(140, 140, 140);; font-size: 13px; margin-left:10px; margin-top:15px;">'.$date1.'</b><br><br>
            <b>'.$ques1.'</b><br><br>
            Answered By
            </div><br>';
          }
        }
      }
      else{
        $quesres = mysqli_query($link, "select * from query");
        for ($quesset = array (); $quesrow = mysqli_fetch_assoc($quesres); $quesset[] = $quesrow['query_id']);
        for($m=count($quesset);$m>=1;$m=$m-1){
          question($m);
          echo '<div class="questions">
            <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-top: 20px;"></i>
            <b style="color: rgb(187, 2, 2);">'.$author1.'</b>
            <i class="fas fa-tag" style="font-size: 20px;color: rgb(187, 2, 2); margin-left:350px; margin-top: 5px;"></i>
            <b style="color: rgb(187, 2, 2); font-size: 13px;">'.$subcat1.'</b><br><br>
            <i class="fas fa-clock"></i>
            <b style="color: rgb(140, 140, 140);; font-size: 13px; margin-left:10px; margin-top:15px;">'.$date1.'</b><br><br>
            <b>'.$ques1.'</b><br><br>
            Answered By
            </div><br>';
        }
      }
      ?>
  </div>
  <div id="categorylist" onmouseover="showCategory()" onmouseout="fadeCategory()">
    <ul class="catagoryul">
      <li onmouseover="showsubcategory1()" onmouseout="fadesubcategory1()"><b>Sports Activities</b></li>
      <li onmouseover="showsubcategory2()" onmouseout="fadesubcategory2()"><b>Cultural Activities</b></li>
      <li onmouseover="showsubcategory3()" onmouseout="fadesubcategory3()"><b>Technical Activities</b></li>
      <li onmouseover="showsubcategory4()" onmouseout="fadesubcategory4()"><b>Stream Specific</b></li>
    </ul>
  </div>
  <div id="subcategory1" onmouseover="showsubcategory1()" onmouseout="fadesubcategory1()">
    <ul class="subcategory1ul">
      <a href="Welcome2.php?Cat=1"><li><b onclick="showSubCategory()">FootBall</b></li></a>
      <a href="Welcome2.php?Cat=2"><li onclick="showSubCategory()"><b>Cricket</b></li></a>
      <a href="Welcome2.php?Cat=3"><li onclick="showSubCategory()"><b>BasketBall</b></li></a>
      <a href="Welcome2.php?Cat=4"><li onclick="showSubCategory()"><b>Hockey</b></li></a>
      <a href="Welcome2.php?Cat=5"><li onclick="showSubCategory()"><b>Athletics</b></li></a>
      <a href="Welcome2.php?Cat=6"><li onclick="showSubCategory()"><b>VolleyBall</b></li></a>
      <a href="Welcome2.php?Cat=7"><li onclick="showSubCategory()"><b>Skating</b></li></a>
      <a href="Welcome2.php?Cat=8"><li onclick="showSubCategory()"><b>Gym</b></li></a>
    </ul>
  </div>
  <div id="subcategory2" onmouseover="showsubcategory2()" onmouseout="fadesubcategory2()">
    <ul class="subcategory2ul">
      <a href="Welcome2.php?Cat=9"><li><b>Dramatics</b></li></a>
      <a href="Welcome2.php?Cat=10"><li><b>Garbha Dance</b></li></a>
      <a href="Welcome2.php?Cat=11"><li><b>Western Dance</b></li></a>
      <a href="Welcome2.php?Cat=12"><li><b>Arts</b></li></a>
      <a href="Welcome2.php?Cat=13"><li><b>Bhangda</b></li></a>
      <a href="Welcome2.php?Cat=14"><li><b>Music</b></li></a>
    </ul>
  </div>
  <div id="subcategory3" onmouseover="showsubcategory3()" onmouseout="fadesubcategory3()">
    <ul class="subcategory3ul">
      <a href="Welcome2.php?Cat=15"><li><b>Computer Club</b></li></a>
      <a href="Welcome2.php?Cat=16"><li><b>Robotics</b></li></a>
      <a href="Welcome2.php?Cat=17"><li><b>Aero Club</b></li></a>
    </ul>
  </div>
  <div id="subcategory4" onmouseover="showsubcategory4()" onmouseout="fadesubcategory4()">
    <ul class="subcategory4ul">
      <a href="Welcome2.php?Cat=18"><li><b>CSE</b></li></a>
      <a href="Welcome2.php?Cat=19"><li><b>IT</b></li></a>
      <a href="Welcome2.php?Cat=20"><li><b>Mechanical</b></li></a>
      <a href="Welcome2.php?Cat=21"><li><b>Electrical</b></li></a>
      <a href="Welcome2.php?Cat=22"><li><b>Biotechnlogy</b></li></a>
      <a href="Welcome2.php?Cat=23"><li><b>Civil</b></li></a>
    </ul>
  </div>
  </div>
</body>
<script src="./js/functions.js"></script>
</html>