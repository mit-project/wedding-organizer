<?php
include '../vendor/config.php';
session_start();
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid = $row['id'];

$sql="SELECT COUNT(vendor_id) AS totalreviews FROM reviews WHERE vendor_id=$vid";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalreviews'];



?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Vendor | Reviews </title>
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
<style>
button{
width:20px;
height:20px;
}
</style>
	
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
			
					<h1 class="title">Reviews</h1>
					
				</div><!-- slider-content-->
			</div><!--display-table-cell-->
		</div><!-- display-table-->
	</div><!-- main-slider -->
<section class="section contact-area">
		<div class="container">
        <h2 class="text-left">Total Reviews (<?php echo $num_rows; ?>)</h2>
			<div class="row">	
<?php
$ratingDetails = "SELECT ratingNumber FROM reviews WHERE vendor_id=$vid";
$rateResult = mysqli_query($conn, $ratingDetails) or die("database error:". mysqli_error($conn));
$ratingNumber = 0;
$count = 0;
$fiveStarRating = 0;
$fourStarRating = 0;
$threeStarRating = 0;
$twoStarRating = 0;
$oneStarRating = 0;
while($rate = mysqli_fetch_assoc($rateResult)){
      $ratingNumber+= $rate['ratingNumber'];
	  $count += 1;
	  if($rate['ratingNumber'] ==5){
	          $fiveStarRating +=1;
	  } else if($rate['ratingNumber'] ==4){
	          $fourStarRating +=1;		  
      } else if($rate['ratingNumber'] ==3){
              $threeStarRating +=1;
       } else if($rate['ratingNumber'] ==2){
                $twoStarRating +=1;
       } else if($rate['ratingNumber'] ==1){
           $oneStarRating +=1;
		   }
		   }
 
  $average = 0;
  if($ratingNumber && $count){
  $average = $ratingNumber/$count;
  }
?> 
<br>
<div class="contact-form text-center">
<div id="ratingDetails">
<div class="row">
<div class="col-sm-3">
<h4>Rating and Reviews</h4>
<h2 class="bold padding-bottom-7"><?php printf('%.1f',$average)?><small>/5</small></h2>
<?php
$averageRating = round($average,0);
for($i = 1; $i<=5; $i++){
$ratingClass = "btn-default btn-grey";
if($i <= $averageRating){
$ratingClass = "btn-warning";
}
?>
<button type="button" class="<?php echo $ratingClass;?>" aria-label="Left Align">
				  <i class="fa fa-star" aria-hidden="true"></i>
				</button>	
<?php }?>
</div>
<br>
<div class="col-sm-3">
<?php
$fiveStarRatingPercent = round(($fiveStarRating/5)*100);
$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';

$fourStarRatingPercent = round(($fourStarRating/5)*100);
$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';

$threeStarRatingPercent = round(($threeStarRating/5)*100);
$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';

$twoStarRatingPercent = round(($twoStarRating/5)*100);
$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';

$oneStarRatingPercent = round(($oneStarRating/5)*100);
$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
?>

<div class ="pull-left">
<div class="pull-left" style="width:35px; line-height:1;">
<div style="height:9px; margin:5px 0;">5 <i class="fa fa-star" aria-hidden="true"></i></div>
</div>
<div class="pull-left" style="width:180px;">
<div class="progress" style="height:9px; margin:8px 0;">
<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $fiveStarRatingPercent;?>">
<span class="sr-only"><?php echo $fiveStarRatingPercent;?></span>
</div>
</div>
</div>
<div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating;?></div>
</div>

<div class ="pull-left">
<div class="pull-left" style="width:35px; line-height:1;">
<div style="height:9px; margin:5px 0;">4 <i class="fa fa-star" aria-hidden="true"></i></div>
</div>
<div class="pull-left" style="width:180px;">
<div class="progress" style="height:9px; margin:8px 0;">
<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $fourStarRatingPercent;?>">
<span class="sr-only"><?php echo $fourStarRatingPercent;?></span>
</div>
</div>
</div>
<div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating;?></div>
</div>

<div class ="pull-left">
<div class="pull-left" style="width:35px; line-height:1;">
<div style="height:9px; margin:5px 0;">3 <i class="fa fa-star" aria-hidden="true"></i></div>
</div>
<div class="pull-left" style="width:180px;">
<div class="progress" style="height:9px; margin:8px 0;">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $threeStarRatingPercent;?>">
<span class="sr-only"><?php echo $threeStarRatingPercent;?></span>
</div>
</div>
</div>
<div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating;?></div>
</div>

<div class ="pull-left">
<div class="pull-left" style="width:35px; line-height:1;">
<div style="height:9px; margin:5px 0;">2 <i class="fa fa-star" aria-hidden="true"></i></div>
</div>
<div class="pull-left" style="width:180px;">
<div class="progress" style="height:9px; margin:8px 0;">
<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $twoStarRatingPercent;?>">
<span class="sr-only"><?php echo $twoStarRatingPercent;?></span>
</div>
</div>
</div>
<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating;?></div>
</div>

<div class ="pull-left">
<div class="pull-left" style="width:35px; line-height:1;">
<div style="height:9px; margin:5px 0;">1<i class="fa fa-star" aria-hidden="true"></i></div>
</div>
<div class="pull-left" style="width:180px;">
<div class="progress" style="height:9px; margin:8px 0;">
<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $oneStarRatingPercent;?>">
<span class="sr-only"><?php echo $oneStarRatingPercent;?></span>
</div>
</div>
</div>
<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating;?></div>
</div>
</div>
</div>
</div>
</div>
<label>&nbsp;</label><br>
<div>&nbsp;</div><br>
<hr/>

<div class="container1" style="margin-top:40px;">
<?php
$ratinguery = "SELECT rating_id, vendor_id, username,Name, ratingNumber, title, comment, created, modified FROM reviews WHERE vendor_id=$vid";
$ratingResult = mysqli_query($conn, $ratinguery) or die("database error:". mysqli_error($conn));
while($rating = mysqli_fetch_assoc($ratingResult)){
$date=date_create($rating['created']);
$reviewDate = date_format($date,"M d, Y");
?>
<div class="row">
<div class="col">

<img src="images/user_icon.png" class="img-rounded" width="100px" height="100px" >
<div class="review-block-name">By <a href="#"><?php echo $rating['Name'];?></a></div>
<div class="review-block-date"><?php echo $reviewDate; ?></div>
</div>
<div class="col-sm-10">
<div class="review-block-rate">
<?php
$averageRating = round($average,0);
for($i = 1; $i<=5; $i++){
$ratingClass = "btn-default btn-grey";
if($i <= $averageRating){
$ratingClass = "btn-warning";
}
?>
<button type="button" class="<?php echo $ratingClass;?>" aria-label="Left Align">
				  <i class="fa fa-star" aria-hidden="true"></i>
				</button>	
<?php }?>

</div>
<div class="review-block-title"><strong><?php echo $rating['title']; ?></strong></div>
<div class="review-block-description"><?php echo $rating['comment']; ?></div>
</div>
</div>
<hr/>
<?php } ?>
</div>
</div>
</div>
	 
	



                                   
                                   
           
		

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