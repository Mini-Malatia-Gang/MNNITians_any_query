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
function replies($i) {
  error_reporting(0);
  require('connect.php');
  if(!isset($_SESSION['user'])){
    header("location:Sign in_up.php");
  }
  $sql2 = "select * from replies where query_id ='".$i."'";
  $result2 = mysqli_query($link, $sql2);
  global $replyauthor;
  global $replycontent;
  global $replydislikes;
  global $replylikes;
  global $replydateposted;
  global $replyid; 
  $replycontent = array();
  $replyauthor = array();
  $replydateposted = array();
  $replylikes = array();
  $replydislikes = array();
  $replyid = array(); 
  for (;$replyrow = mysqli_fetch_assoc($result2);){
    $replyid[] = $replyrow['reply_id'];
    $replycontent[] = $replyrow['comment'];
    $replyauthor[] = $replyrow['author'];
    $replydateposted[] = $replyrow['date_posted'];
    $replylikes[] = $replyrow['Likes'];
    $replydislikes[] = $replyrow['Dislikes'];
  }
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
          <?php
          if(empty($_GET)){
            echo '<div class="navlinkhome" style="border-bottom: 2px solid rgb(187, 2, 2);">
            <a href="Welcome2.php" style="color: rgb(187, 2, 2);">
            <i class="fas fa-home" style="font-size: 20px;color: rgb(187, 2, 2);"></i>
            <b>Home</b></a></div>';
          }
          else{
            echo '<div class="navlinkhome" style="border-bottom: 2px solid white;">
            <a href="Welcome2.php" style="color: rgb(140, 140, 140);">
            <i class="fas fa-home" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
            <b>Home</b></a></div>';
          }
          if(@$_GET['Cat']==true){
            echo '<div class="navlinkcategories" onmouseover="showCategory()" onmouseout="fadeCategory()" style="border-bottom: 2px solid rgb(187, 2, 2); color: rgb(187, 2, 2);">
            <i id="redtwo" class="far fa-list-alt" style="font-size: 20px;color: rgb(187, 2, 2);"></i>
            <b>Categories</b>
            </div>';
          }
          else {
            echo '<div class="navlinkcategories" onmouseover="showCategory()" onmouseout="fadeCategory()">
            <i id="redtwo" class="far fa-list-alt" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
            <b>Categories</b>
            </div>';
          }
          ?>
          <?php
          if(@$_GET['answer']==true){
            echo '<div class="navlinkanswers" style="border-bottom: 2px solid rgb(187, 2, 2); color: rgb(187, 2, 2);">
            <a href="Welcome2.php?answer=showpage" style="color:rgb(187, 2, 2);"><i class="fas fa-edit" style="font-size: 20px;color: rgb(187, 2, 2);"></i>
            <b>Answer</b></a>
            </div>';
          }
          else{
            echo '<div class="navlinkanswers">
            <a href="Welcome2.php?answer=showpage" style="color:rgb(140, 140, 140);"><i class="fas fa-edit" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
            <b>Answer</b></a>
            </div>';
          }
          if(@$_GET['notification']==true){
            echo '<div class="navlinksnotification" style="border-bottom: 2px solid rgb(187, 2, 2); color: rgb(187, 2, 2);">
            <a href="Welcome2.php?notification=showpage" style="color: rgb(187, 2, 2);"><i class="fas fa-bell" style="font-size: 20px;color: rgb(187, 2, 2);"></i>
            <b>Notification</b></a>
            </div>';
          }
          else{
            echo '<div class="navlinksnotification">
            <a href="Welcome2.php?notification=showpage" style="color:rgb(140, 140, 140);"><i class="fas fa-bell" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
            <b>Notification</b></a>
            </div>';
          }
          ?>
        <div class="navlinksearch">
          <input type="text" class="searchbox" placeholder="Search" name="search">
          <div class="icon"><i class="fas fa-search" style="font-size: 20px;color: rgb(140, 140, 140);"></i></div>
        </div>
        <div class="navlinkusercontrol">
          <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(140, 140, 140);"></i>
          <div class="phpusername" style="font-size: 15px;padding-left: 8px;"><?php echo $_SESSION["user"]; ?></div>
        </div>
        <div class="navlinklogout">
          <a href="logout.php?logout" style="color: red;"><i class="fas fa-sign-out-alt" style="font-size: 20px;"></i>
          <b>Logout</b></a>
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
        <b><?php echo $_SESSION["name"]; ?></b>
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
            replies($j);
            $number_replies = count($replyid);
            echo '<div class="questions" style="display: -webkit-box;>
            <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-top: 20px;"></i>
            <b style="color: rgb(187, 2, 2);">'.$author1.'</b>
            <i class="fas fa-tag" style="font-size: 20px;color: rgb(187, 2, 2); margin-left:350px; margin-top: 5px;"></i>
            <b style="color: rgb(187, 2, 2); font-size: 13px;">'.$subcat1.'</b><br><br>
            <i class="fas fa-clock"></i>
            <b style="color: rgb(140, 140, 140);; font-size: 13px; margin-left:10px; margin-top:15px;">'.$date1.'</b><br><br>
            <b>'.$ques1.'</b><br><br>';
          }
          if($number_replies>0){
            echo '<b style="color: green;">Answered By :</b><br><br>';
            for($k=0;$k<$number_replies;$k++){
              echo '<b><i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-top: 20px;margin-left:20px;"></i>
              <b style="color: rgb(187, 2, 2);">'.$replyauthor[$k].'</b>
              <i class="fas fa-clock" style="margin-left:50px"></i>
              <b style="color: rgb(140, 140, 140); font-size: 13px; margin-left:10px; margin-top:15px;">'.$replydateposted[$k].'</b><br><br>
              <b>'.$replycontent[$k].'</b><br><br>';
              echo '<a href="likedis.php?like='.$replyid[$k].'"  style="color:blue;"><i class="fas fa-thumbs-up" style="font-size:22px;"></i></a>
              <b>'.$replylikes[$k].'</b>
              <a href="likedis.php?dislike='.$replyid[$k].'" style="color:red;"><i class="fas fa-thumbs-down" style="font-size:22px;"></i></a>
              <b>'.$replydislikes[$k].'</b><br><br><br>';
            }
          }
          else{
            echo '<b style="color:red; text-align:center;">No Answers Yet....</b>';
          }
          echo '<b style="color: Blue">Put Your Answer :</b>
            <form action="submitans.php?id='.$j.'" method="POST">
            <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-left: 20px; margin-top: 20px;"></i>
            <b style="color: rgb(187, 2, 2);">'.$_SESSION["user"].'</b><br><br>
            <input type="text" name="answer" placeholder="Answer" style="width:500px; height:35px; font-size:18px padding-left:20px; padding-top:10px; cursor:text;"><br>
            <input type="submit" name="postanswer" value="POST" style="background-color:green; color:white; width:50px; height:25px; cursor:pointer;">
            </form>';
          echo '</b></div><br>';
        }
      }
      else if(@$_GET['answer']==true){
        $sqlquery9 = "select * from query where author='".$_SESSION['name']."'";
        $ownres9 = mysqli_query($link, $sqlquery9);
        $ownquery_id = array();
        $ownsubcat_id = array();
        $owncontent = array();
        $owndate_posted = array();
        for(;$ownrow= mysqli_fetch_assoc($ownres9);){
          $ownquery_id[] = $ownrow['query_id'];
          $ownsubcat_id[] = $ownrow['subcat_id'];
          $owncontent[] = $ownrow['content'];
          $owndate_posted[] = $ownrow['date_posted'];
        }
        if(count($ownquery_id)>0){
        for($own=count($ownquery_id)-1;$own>=0;$own--){
          $sqlquery8 = "select * from subcategories where Subcat_id='".$ownsubcat_id[$own]."'";
          $ownres8 = mysqli_query($link, $sqlquery8);
          $ownrow5= mysqli_fetch_assoc($ownres8);
          $ownsubcat = $ownrow5['subcat_name'];
          echo '<div class="questions" style="display: -webkit-box;">
            <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-top: 20px;"></i>
            <b style="color: rgb(187, 2, 2);">'.$_SESSION['name'].'</b>
            <i class="fas fa-tag" style="font-size: 20px;color: rgb(187, 2, 2); margin-left:300px; margin-top: 5px;"></i>
            <b style="color: rgb(187, 2, 2); font-size: 13px;">'.$ownsubcat.'</b>
            <a href="deletques.php?id='.$ownquery_id[$own].'"><i class="fas fa-trash-alt" style="font-size: 20px;color: red; margin-left:70px; cursor:pointer;"></i></a>
            <br><br>
            <i class="fas fa-clock"></i>
            <b style="color: rgb(140, 140, 140);; font-size: 13px; margin-left:10px; margin-top:15px;">'.$owndate_posted[$own].'</b><br><br>
            <b>'.$owncontent[$own].'</b><br><br>';
            replies($ownquery_id[$own]);
            $number_replies = count($replyid);
            if($number_replies>0){
              echo '<b style="color: green;">Answered By :</b><br><br>';
              for($k=0;$k<$number_replies;$k++){
                echo '<b><i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-top: 20px;margin-left:20px;"></i>
                <b style="color: rgb(187, 2, 2);">'.$replyauthor[$k].'</b>
                <i class="fas fa-clock" style="margin-left:50px"></i>
                <b style="color: rgb(140, 140, 140); font-size: 13px; margin-left:10px; margin-top:15px;">'.$replydateposted[$k].'</b><br><br>'.$replycontent[$k].'<br><br><br>';
                echo '<a href="likedis.php?like='.$replyid[$k].'"  style="color:blue;"><i class="fas fa-thumbs-up" style="font-size:22px;"></i></a>
                <b>'.$replylikes[$k].'</b>
                <a href="likedis.php?dislike='.$replyid[$k].'" style="color:red;"><i class="fas fa-thumbs-down" style="font-size:22px;"></i></a>
                <b>'.$replydislikes[$k].'</b><br><br><br>';
              }
            }
            else{
              echo '<b style="color:red; text-align:center;">No Answers Yet....</b><br><br><br>';
            }
            echo '</b></div><br>';
          }}
          else {
            echo '<div class="questions" style="display: -webkit-box;"><b>You Have not ask any question yet.</b></div>';
          }
      }
      else if(@$_GET['notification']==true){
        $sqlquery4 = "select * from query where author='".$_SESSION['name']."'";
        $notres4 = mysqli_query($link, $sqlquery4);
        for($notquery_id = array();$notrow1= mysqli_fetch_assoc($notres4);$notquery_id[] = $notrow1['query_id']);
        if(count($notquery_id)>0){
          for($n=count($notquery_id)-1;$n>=0;$n--){
            $notres5 = mysqli_query($link, "select * from replies where query_id = '".$notquery_id[$n]."'");
            for($notauthors1 = array();$notrow5= mysqli_fetch_assoc($notres5);$notauthors1[] = $notrow5['author']);
            for($h=count($notauthors1)-1;$h>=0;$h--){
              echo '<div class="questions" style="display: -webkit-box;"><b>'.$notauthors1[$h].' replied to your Query </b></div><br>';
            }
            echo '<div class="questions" style="display: -webkit-box;"><b>You added a new query</b></div><br>';
          }
        }
        else{
          echo '<div class="questions" style="display: -webkit-box;">No Notifications</div>';
        }
      }
      else{
        $quesres = mysqli_query($link, "select * from query");
        for ($quesset = array (); $quesrow = mysqli_fetch_assoc($quesres); $quesset[] = $quesrow['query_id']);
        for($m=count($quesset)-1;$m>=0;$m=$m-1){
          $p = $quesset[$m];
          question($p);
          replies($p);
          $number_replies = count($replyid);
          echo '<div class="questions" style="display: -webkit-box;">
            <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-top: 20px;"></i>
            <b style="color: rgb(187, 2, 2);">'.$author1.'</b>
            <i class="fas fa-tag" style="font-size: 20px;color: rgb(187, 2, 2); margin-left:350px; margin-top: 5px;"></i>
            <b style="color: rgb(187, 2, 2); font-size: 13px;">'.$subcat1.'</b><br><br>
            <i class="fas fa-clock"></i>
            <b style="color: rgb(140, 140, 140);; font-size: 13px; margin-left:10px; margin-top:15px;">'.$date1.'</b><br><br>
            <b>'.$ques1.'</b><br><br>';
          if($number_replies>0){
            echo '<b style="color: green;">Answered By :</b><br><br>';
            for($k=0;$k<$number_replies;$k++){
              echo '<b><i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-top: 20px;margin-left:20px;"></i>
              <b style="color: rgb(187, 2, 2);">'.$replyauthor[$k].'</b>
              <i class="fas fa-clock" style="margin-left:50px"></i>
              <b style="color: rgb(140, 140, 140); font-size: 13px; margin-left:10px; margin-top:15px;">'.$replydateposted[$k].'</b><br><br>'.$replycontent[$k].'<br><br><br>';
              echo '<a href="likedis.php?like='.$replyid[$k].'"  style="color:blue;"><i class="fas fa-thumbs-up" style="font-size:22px;"></i></a>
              <b>'.$replylikes[$k].'</b>
              <a href="likedis.php?dislike='.$replyid[$k].'" style="color:red;"><i class="fas fa-thumbs-down" style="font-size:22px;"></i></a>
              <b>'.$replydislikes[$k].'</b><br><br><br>';
            }
          }
          else{
            echo '<b style="color:red; text-align:center;">No Answers Yet....</b><br><br><br>';
          }
          /*echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';*/
          echo '<b style="color: Blue">Put Your Answer :</b>
            <form action="submitans.php?id='.$m.'" method="POST">
            <i class="fas fa-user-tie" style="font-size: 20px;color: rgb(187, 2, 2); margin-left: 20px; margin-top: 20px;"></i>
            <b style="color: rgb(187, 2, 2);">'.$_SESSION["user"].'</b><br><br>
            <input type="text" name="answer" placeholder="Answer" style="width:500px; height:35px; font-size:18px padding-left:20px; padding-top:10px; cursor:text;"><br>
            <input type="submit" name="postanswer" value="POST" style="background-color:green; color:white; width:50px; height:25px; cursor:pointer;">
            </form>';
          echo '</b></div><br>';
        }
      }
      ?>
  </div>
  <div id="categorylist" onmouseover="showCategory()" onmouseout="fadeCategory()">
    <ul class="catagoryul">
      <a href="Welcome2.php?Cat=1"><li><b>FootBall</b></li></a>
      <a href="Welcome2.php?Cat=2"><li><b>Cricket</b></li></a>
      <a href="Welcome2.php?Cat=3"><li><b>BasketBall</b></li></a>
      <a href="Welcome2.php?Cat=4"><li><b>Hockey</b></li></a>
      <a href="Welcome2.php?Cat=5"><li><b>Athletics</b></li></a>
      <a href="Welcome2.php?Cat=6"><li><b>VolleyBall</b></li></a>
      <a href="Welcome2.php?Cat=7"><li><b>Skating</b></li></a>
      <a href="Welcome2.php?Cat=8"><li><b>Gym</b></li></a>
      <a href="Welcome2.php?Cat=9"><li><b>Dramatics</b></li></a>
      <a href="Welcome2.php?Cat=10"><li><b>Garbha Dance</b></li></a>
      <a href="Welcome2.php?Cat=11"><li><b>Western Dance</b></li></a>
      <a href="Welcome2.php?Cat=12"><li><b>Arts</b></li></a>
      <a href="Welcome2.php?Cat=13"><li><b>Bhangda</b></li></a>
      <a href="Welcome2.php?Cat=14"><li><b>Music</b></li></a>
      <a href="Welcome2.php?Cat=15"><li><b>Computer Club</b></li></a>
      <a href="Welcome2.php?Cat=16"><li><b>Robotics</b></li></a>
      <a href="Welcome2.php?Cat=17"><li><b>Aero Club</b></li></a>
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