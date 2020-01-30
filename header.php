<?php
    require_once('path/db.php');
    error_reporting(0);
    $session_email = $_SESSION['email'];
    $query = "SELECT * FROM `profile` WHERE `email` = '$session_email'";
$run = mysqli_query($conn, $query);
$row = mysqli_fetch_array($run);

$id = $row['sn'];
$name = $row['fullname'];
$phone = $row['phone'];
$email = $row['email'];
$password = $row['pass_word'];
$image = $row['image'];
?>
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand" style="background: white;">
    <a href="userdashboard.php" class="logo">
        <img src="images/oluaka.png" alt="OluakaInstitute">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <!-- <ul class="nav top-menu">

        settings start 
  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="passport/<?php echo $image; ?>">
                <span class="username"><?php echo $name; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="personaldata.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <!-- <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> -->
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->