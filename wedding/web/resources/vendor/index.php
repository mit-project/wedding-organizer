<?php
include 'config.php';
session_start();
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$id = $row['id'];

$sql="SELECT COUNT(id) AS totalmsg FROM message WHERE vendor_id=$id";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalmsg'];

$sql1="SELECT COUNT(id) AS totalClients FROM hired_vendors WHERE vendor_id=$id";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows1=$values1['totalClients'];

$sql2="SELECT COUNT(rating_id) AS totalReviews FROM reviews WHERE vendor_id=$id";
$result2=mysqli_query($conn,$sql2);
$values2=mysqli_fetch_assoc($result2);
$num_rows2=$values2['totalReviews'];

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Wedding organizer|Vendor Home</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Playball%7CBitter" rel="stylesheet">
	
	<!-- Stylesheets -->
	
	<link href="common-css/bootstrap.css" rel="stylesheet">
	
	
	<link href="common-css/fluidbox.min.css" rel="stylesheet">
	
	<link href="common-css/font-icon.css" rel="stylesheet">
	
	
	<link href="01-homepage/css/styles.css" rel="stylesheet">
	
	<link href="01-homepage/css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
	<header>
		
		<div class="container">
		
			<a class="logo" href="#" style="font-size:8px; color:#CC6633; font-weight:bold;"><h1 class="title">Wedding Organizer</h1></a>
			
			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="icon icon-bars"></i></div>
			
			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="index.php">HOME</a></li>
				<li class="drop-down"><a href="#!">STORE FRONT<i class="icon icon-caret-down"></i></a>
				
					<ul class="drop-down-menu">
						<li><a href="information.php">Business Information</a></li>
						<li><a href="deals.php">Deals</a></li>
                        <li><a href="photos.php">Photos</a></li>
                        <li><a href="videos.php">Videos</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="pricing.php">Pricing</a></li>
                        <li><a href="social.php">Social Media</a></li>
						
						</li>
					</ul>
					
				</li>
				
				<li><a href="messages.php">MESSAGES</a></li>
				<li><a href="reviews.php">REVIEWS</a></li>
                <li><a href="setting.php">SETTING</a></li>
				<a href="../../index.php" class="btn btn-info">Sign out</a>
			</ul><!-- main-menu -->
			
		</div><!-- container -->
	</header>
	
	
	<div class="main-slider">
		<div class="display-table center-text">
			<div class="display-table-cell">
				<div class="slider-content">
				
					
					<h1 class="title"><?php echo $row['businessName'];?></h1>
                    <h3 class="pre-title"><?php echo $row['address'];?></h3>
                    <h3 class="pre-title"><?php echo $row['contactno'];?></h3>
					
				</div><!-- slider-content-->
			</div><!--display-table-cell-->
		</div><!-- display-table-->
	</div><!-- main-slider -->
	
	
	<section class="section story-area center-text">
		<div class="container">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10">
					
					<div class="heading">
						<h2 class="title">About <?php echo $row['businessName'];?> </h2>
						<span class="heading-bottom"><i class="icon icon-star"></i></span>
					</div>

					<p class="desc margin-bottom"><?php echo $row['description'];?></p>
					
				</div><!-- col-sm-10 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
	
	<section class="section counter-area center-text">
		<div class="container">
			<div class="row">
			
				<div class="col-sm-12">
					<div class="heading">
						<h2 class="title"><?php echo $row['email'];?></h2>
						<span class="heading-bottom"><i class="color-white icon icon-star"></i></span>
					</div>
				</div>
				
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					
					<div class="remaining-time">
					
					</div><!-- remaining-time -->
				</div><!-- col-sm-10 -->
				
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
	
	<section class="section w-details-area center-text">
		<div class="container">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10">
					
					<div class="heading">
						<h2 class="title">Summary</h2>
						<span class="heading-bottom"><i class="icon icon-star"></i></span>
					</div>
					
					<div class="wedding-details margin-bottom">
						
						<div class="w-detail right">
							<i class="fa fa-user fa-3x" aria-hidden="true"></i>
							<h4 class="title"><a href="clients.php">CLIENTS</a></h4>
							<p style="font-size:28px;"><?php echo $num_rows1; ?></p>
						</div><!-- w-detail -->
						
						<div class="w-detail left">
							<i class="fa fa-envelope fa-3x"></i>
							<h4 class="title"><a href="messages.php">MESSAGES</a></h4>
							<p style="font-size:28px;"><?php echo $num_rows; ?></p>
						</div><!-- w-detail -->
						
						<div class="w-detail right">
							<i class="fa fa-star fa-3x" aria-hidden="true"></i>
							<h4 class="title"><a href="reviews.php">REVIEWS</a></h4>
							<p style="font-size:28px;"><?php echo $num_rows2; ?></p>
						</div><!-- w-detail -->
						
						
						
					</div><!-- wedding-details -->
					
				</div><!-- col-sm-10 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
	
	
	
	
	
	
	
	<footer>
		<div class="container center-text">
		
			<p class="copyright">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Wedding organizer All rights reserved | Design by Hiruni Chandrasiri
</p>
			
		</div><!-- container -->
	</footer>
	
	
	<!-- SCIPTS -->
	
	<script src="common-js/jquery-3.1.1.min.js"></script>
	
	<script src="common-js/tether.min.js"></script>
	
	<script src="common-js/bootstrap.js"></script>
	
	<script src="common-js/jquery.countdown.min.js"></script>
	
	<script src="common-js/jquery.fluidbox.min.js"></script>
	
	
	<script src="common-js/scripts.js"></script>
	
</body>
</html>