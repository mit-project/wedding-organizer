<?php
include '../vendor/config.php';
session_start();
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();



if(isset($_POST['save'])){
       
	   $id = $_POST['id'];
	   $description = $_POST['description'];
	   $name = $_POST['Cperson'];
	   $emailnew = $_POST['email'];
	   $phoneNo = $_POST['pnumber'];
	   $mobileNo = $_POST['mnumber'];
	   $fax = $_POST['fax'];
	   $website = $_POST['website'];
	   $profile= $_FILES['profile']['name'];
	   $city = $_POST['city'];
	   $address = $_POST['address'];
	   $businessHours = $_POST['businessHours'];
	   $target = "uploads/".basename($_FILES["profile"]["name"]);
	   
if(move_uploaded_file($_FILES["profile"]["tmp_name"], $target)){
$conn->query("UPDATE vendor_registration SET email='$emailnew',Name='$name',contactno='$phoneNo',mobileNo='$mobileNo',fax='$fax',website='$website',profileImage='$profile',address='$address',city='$city',businessHours='$businessHours',description='$description' WHERE id=$id ") or die($conn->error);

$_SESSION['message'] ="Records has been updated successfully ";
$_SESSION['msg_type'] ="success";
header("Refresh:2");
}
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Vendor | Edit Information</title>
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
			
					<h1 class="title">Edit Business Information</h1>
					
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
		<h4 class="pre-title center-text">Your Storefront features information about your wedding services to attract and convert our audience of engaged couples.</h4>
 <div>&nbsp;</div><br>
				 
				
					<div class="contact-form">
						<h4 class="pre-title  text-left">Describe your business and services</h4>
                        <hr>
						<div style="color:#003333; font-weight:bold;">Share unique, descriptive information about your business in order to convert couples and improve your ranking across top search engines. Please do not include any contact information in this section.</div><br>
				 <form name="information" action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
							<div class="row">
							
								<div class="col-sm-12 margin-bottom">
									
           <textarea name="description" rows="18" cols="130" ><?php echo $row['description'];?> </textarea>
								</div>
                                </div>
                                <h4 class="pre-title  text-left">Contact Information</h4>
                                <hr>
                                <div style="color:#003333; font-weight:bold;">Lead notifications and updates from Wedding organizer will be sent to this contact.</div><br>
								<div class="col-sm-6 margin-bottom">
									<label>Contact Person</label>
							
                               <input type="text" name="Cperson" class="form-control" value="<?php echo $row['Name']; ?>" required >
 
								</div>
								<div class="col-sm-6 margin-bottom">
									<label>Email</label>
									 <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" required >
								</div>
								<div class="col-sm-6 margin-bottom">
									<label>Phone Number</label>
									<input type="text" name="pnumber" value="<?php echo $row['contactno']; ?>" class="form-control" required >
								</div>
                                <div class="col-sm-6 margin-bottom">
									<label>Mobile Number</label>
									 <input type="text" name="mnumber" value="<?php echo $row['mobileNo']; ?>" class="form-control" >
								</div>
                                 <div class="col-sm-6 margin-bottom">
									<label>Fax</label>
									<input type="text" name="fax" value="<?php echo $row['fax']; ?>" class="form-control" >
								</div>
                                <div class="col-sm-6 margin-bottom">
									<label>Website</label>
									<input type="text" name="website" value="<?php echo $row['website']; ?>" class="form-control" >
								</div>
                                <div class="col-sm-6 margin-bottom">
									<label>Profile Image</label>
									 <input type="file" name="profile" class="form-control">
								</div>
                               <h4 class="pre-title  text-left">Edit Location</h4>
                                <hr> 
                                 <div class="col-sm-6 margin-bottom">
									<label>City</label>
									<input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control" required >
								</div>
                                <div class="col-sm-6 margin-bottom">
									<label>Address</label>
									<input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" required >
								</div>
                                 <div class="col-sm-6 margin-bottom">
									<label>Business Hours</label>
									<textarea name="businessHours" rows="5" cols="53">
									<?php echo $row['businessHours']; ?>
                                     </textarea>
								</div>
								<div class="col-sm-12 center-text">
									<input type="submit"  class="btn"  name="save" value="Save changes" style="width:200px;">
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