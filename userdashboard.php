<?php
    require_once('path/db.php');
   // session_start();
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
?>

<!DOCTYPE html>
<head>
<title> Home </title>
<?php include_once('head.php'); ?>
<body>
<section id="container">

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="userdashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Credentials</span>
                    </a>
                    <ul class="sub">
						<li><a href="credentials.php">View Credentials</a></li>
						<li><a href="uploadcredential.php">Upload Credential</a></li>
						<li><a href="uploadattestation.php">Upload Attestation</a></li>
                        <!-- <li><a href="grids.php">Grids</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="course.php">
                        <i class="fa fa-bullhorn"></i>
                        <span>Apply course </span>
                    </a>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Profile</span>
                    </a>
                    <ul class="sub">
                        <li><a href="personaldata.php">Personal Data</a></li>
                        <li><a href="nextofkins.php">Next of Kin</a></li>
                    </ul>
                </li>
               
                <li>
                    <a href="payment.php">
                        <i class="fa fa-book"></i>
                        <span>Payments</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="login.php">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li> -->
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		
		<div class="agil-info-calendar">
		
        <div class="row">
		<div class="col-12 w3agile-notifications">
			<div class="notifications">
				<!--notification start-->
              
					<header class="panel-heading">
						Welcome <?php echo $name; ?>
					</header>
					<div class="notify-w3ls">
						<div class="alert col-md-6 ">
							<span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
							<div class="notification-info">
                                <br /><hr />
                                <h3> Complete your background data</h3> <br />
                                <button type="button" class="btn btn-primary"> <a href= "personaldata.php" style="color: white"><span>Start Now</span></a></button>
                                <hr />
								
							</div>
						</div>
						<div class="alert  col-md-6">
							<span class="alert-icon"><i class="fa fa-facebook"></i></span>
							<div class="notification-info">
                                <br /><hr />
								<h3> Provide your next of kin info</h3> <br />
                                <button type="button" class="btn btn-primary"> <a href= "nextofkins.php" style="color: white"><span>Start Now</span></a></button>
                                <hr />
							</div>
						</div>
						<div class="alert  col-md-6 ">
							<span class="alert-icon"><i class="fa fa-comments-o"></i></span>
							<div class="notification-info">
								<h3> Provide your evidence of payment</h3> <br />
                                <button type="button" class="btn btn-primary"> <a href= "payment.php" style="color: white"><span>Start Now</span> </a></button>
                                <hr />
							</div>
						</div>
						<div class="alert col-md-6 clearfix">
							<span class="alert-icon"><i class="fa fa-bell-o"></i></span>
							<div class="notification-info">
								<h3> Provide Course of Interest</h3> <br />
                                <button type="button" class="btn btn-primary"> <a href= "course.php" style="color: white"><span>Start Now</span> </a></button>
                                <hr />
							</div>
						</div>
						
					</div>

                    <div class="alert col-md-6 clearfix">
                            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
                            <div class="notification-info">
                                <h3> View Your Credentials</h3> <br />
                                <button type="button" class="btn btn-primary" > <a href= "credentials.php" style="color: white"><span>   Start Now</span></a></button>
                            </div>
                        </div> 
                        
                    </div>
				
				<!--notification end-->
				</div>
			</div>
        </div>
			<div class="clearfix"> </div>
		<!-- </div> -->
			<!-- tasks -->
			<div class="agile-last-grids">
				
			</div>
		
</section>

</body>
</html>
