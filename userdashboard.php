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
<title>Oluaka Institute Admission | Home </title>
<?php include_once('head.php'); ?>
<body>
<section id="container">
<?php
    include_once('header.php');
?>
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
 <!-- footer -->
 <?php
    include_once('footer.php');
?>
		 
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Welcome <?php echo $name; ?>, Kindly complete your credentials.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
