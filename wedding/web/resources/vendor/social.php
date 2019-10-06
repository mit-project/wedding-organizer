<?php
include '../vendor/config.php';
session_start();
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid = $row['id'];

if(isset($_POST['submit'])){
$email=$_SESSION['login_user'];
$vid=$row['id'];
$facebook=$_POST['facebook'];
$instagram=$_POST['instagram'];
$twiter=$_POST['twitter'];
$youtube=$_POST['youtube'];
$sql="SELECT COUNT(id) AS total FROM socialmedia WHERE vendor_id=$vid";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
if($num_rows==0){
$sql=("INSERT INTO socialmedia(vendor_id,facebook,instagram,twitter,youtube) VALUES('$vid','$facebook','$instagram','$twiter','$youtube')")  or die($conn->error);
if ($conn->query($sql) === TRUE) {
$_SESSION['message'] ="You have successfully saved social media details";
$_SESSION['msg_type'] ="success";
header( "refresh:2;url=social.php" );
} 
}
else {

$facebook=$_POST['facebook'];
$instagram=$_POST['instagram'];
$twitter=$_POST['twitter'];
$youtube=$_POST['youtube'];
$conn->query("UPDATE socialmedia SET  facebook='$facebook',instagram='$instagram',twitter='$twitter',youtube='$youtube' WHERE vendor_id=$vid") or die($conn->error);
$_SESSION['message'] ="Record has been updated";
$_SESSION['msg_type'] ="warning";
header("refresh:2;url=social.php");
}

}


?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Vendor | Social Media</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Playball%7CBitter" rel="stylesheet">
	
	<!-- Stylesheets -->
	
	<link href="common-css/bootstrap.css" rel="stylesheet">
	
	<link href="common-css/font-icon.css" rel="stylesheet">
	
	
	<link href="02-rsvp/css/styles.css" rel="stylesheet">
	
	<link href="02-rsvp/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
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
			
					<h1 class="title">Social Media</h1>
					
				</div><!-- slider-content-->
			</div><!--display-table-cell-->
		</div><!-- display-table-->
	</div><!-- main-slider -->
	
	 <?php
if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>" style="margin-left:100px; margin-top:30px; width:500px;">
<?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
?>
</div>
<?php endif ?>
	<section class="section contact-area">
		<div class="container">
			<div class="row">
<h4 class="pre-title center-text">Showcase your personality and recent work by sharing your social networks on WeddingOrganizer </h4>
 <div>&nbsp;</div><br>
				
				
	<div class="contact-form" style="margin-top:20px;">
	<h4 class="pre-title  text-left">Link couples directly to your social media accounts to encourage new followers.</h4>
                        <hr>
		<img src="images/social-media-management-1.jpg"  style= "margin-top:10px; width:1000px; height:200px; margin-left:10px;"><br>  
                        
   <?php 

$result=$conn->query("SELECT * FROM socialmedia WHERE vendor_id=$vid") or die($conn->error);
$row = $result->fetch_array();
?>                      

                      
 <div>&nbsp;</div>
 <br>                                  
                                   
                                   
<form name="social media" action="" method="post">
<div class="row">
<div class="col-sm-6 margin-bottom">
<i class="fa fa-facebook-square fa-2x" aria-hidden="true" style="color:#003366;"></i>&nbsp;Facebook
<input type="text" name="facebook" placeholder="www.facebook.com/business-information" class="form-control" value="<?php echo $row['facebook'];?>">
</div>
<div class="col-sm-6 margin-bottom">
<i class="fa fa-instagram fa-2x" aria-hidden="true" style="color:#FF6633;"></i>&nbsp;Instagram
<input type="text" name="instagram" placeholder="www.instagram.com/business-information" class="form-control" value="<?php echo $row['instagram'];?>">
</div>
</div>
<div class="row">
<div class="col-sm-6 margin-bottom">
<i class="fa fa-twitter-square fa-2x" aria-hidden="true" style="color:#0066FF;"></i>&nbsp;Twitter
<input type="text" name="twitter" placeholder="twitter.com/business-information" class="form-control" value="<?php echo $row['twitter'];?>">
</div>
<div class="col-sm-6 margin-bottom">
<i class="fa fa-youtube-square fa-2x" aria-hidden="true" style="color:#CC0000;"></i>&nbsp;Youtube
<input type="text" name="youtube" placeholder="youtube.com/business-information" class="form-control" value="<?php echo $row['youtube'];?>">
</div>
</div>
<div class="col-sm-12 center-text">
<input type="submit"  class="btn"  name="submit" value="Save" style="width:200px; margin-left:400px;">
</div>
</form>
</div>
								
								
						</form>
					</div><!-- contact-form -->
				</div><!-- col-sm-6 -->
				
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
	
	<script src="common-js/scripts.js"></script>
	
</body>
</html>