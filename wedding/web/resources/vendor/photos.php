<?php
include '../vendor/config.php';
session_start();
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid = $row['id'];

$sql="SELECT COUNT(vendor_id) AS totalphotos FROM photos WHERE vendor_id=$vid";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalphotos'];

if(isset($_POST['save'])){
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid = $row['id'];
$image=$_FILES['photo']['name'];
$target = "photos/".basename($_FILES["photo"]["name"]);
$title = $_POST['title'];
$status = $_POST['status'];
$sql = "INSERT INTO photos (vendor_id,photo,title,status) VALUES('$vid','$image','$title','$status')";
if ($conn->query($sql) === TRUE) {
if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target)){
$_SESSION['message'] ="Photo upload successfully";
$_SESSION['msg_type'] ="success";
header( "refresh:2;url=photos.php" );
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}
}
}

if(isset($_GET['update'])){
$id=$_GET['update'];
$update=true;
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM photos WHERE id=$id") or die($conn->error);
$row3 = $result->fetch_array();
$u_title = $row2['title'];
$u_status = $row2['status'];
}
if(isset($_POST['btnSave'])){
$id=$_POST['id'];
$title = $_POST['title'];
$status = $_POST['status'];
$conn->query("UPDATE photos SET title='$title',status='$status' WHERE id=$id") or die($conn->error);
$_SESSION['message'] ="Record has been updated";
$_SESSION['msg_type'] ="warning";
header("refresh:2;url=photos.php");
} 

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Vendor | Photos</title>
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
			
					<h1 class="title">Photos</h1>
					
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
		<h4 class="pre-title center-text">Add at least 8 photos highlighting your products or services to give couples a clear picture of your work. Storefronts with more photos typically receive more leads. </h4>
 <div>&nbsp;</div><br>
				
				
					<div class="contact-form" style="margin-left:350px; margin-top:50px;">
						<h4 class="pre-title  text-left">Add Photos</h4>
                        <hr>
						
				 <form name="photo" action="" method="post" enctype="multipart/form-data">
                 
							
                                
								<div class="col-sm-12 margin-bottom">
									<label>Image</label>
							
                               <input type="file" name="photo" class="form-control" required>
                                </div>
                                
								<div class="col-sm-12 margin-bottom">
									<label>Title</label>
									<input type="text" name="title" class="form-control">
								</div>
                                
								<div class="col-sm-12 margin-bottom">
									<label>Status</label>
									<select name="status" class="form-control">
                                     <option value="Main Image">Main Image</option>
                                    <option value="Sample">Sample</option>
                                       </select> 
								</div>
                                
								<div class="col-sm-12 center-text">
									<input type="submit"  class="btn"  name="save" value="Upload Photo" style="width:200px;">
								</div>
								
								
						</form>
					</div><!-- contact-form -->
				</div><!-- col-sm-6 -->
				
			</div><!-- row -->
		</div><!-- container -->
       
	</section><!-- section -->
	<h2 class="text-left" style="padding-left:50px;">Total Photos (<?php echo $num_rows;?>)</h2>
     <?php
          $resultS=$conn->query("SELECT * FROM photos WHERE vendor_id=$vid") or die($conn->error);
          if($resultS->num_rows>0){
		  while($row2 = $resultS->fetch_array()){
          ?>
 
  <div class="container" style="display:inline-block; width:300px;">              
  <img src="<?php echo 'photos/'.$row2['photo'];?>" height="150px" width="250px">
  <div><?php echo $row2['status'];?>
  <label style="padding-left:110px;">
  <a href="#update<?php echo $row2['id'];?>" data-toggle="modal" style="color:#003366; border: 0; background: none;"><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>&nbsp;&nbsp;
<a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#FF0033; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row2['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a> 
  </label>
  <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Photo?")){
		   window.location.href='deletePhoto.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
 <div class="modal fade" id="update<?php echo $row2['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form name="photos" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row2['id'];?>" />
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center" style="background-color:#CC9999;">
<lable class="modal-title font-weight-bold" style="color:#FFFFFF; font-size:16px;">Edit Photo</label>
</div>
<div class="modal-body mx-3">
<div class="md-form mb-4">
<label>TITLE</label>
<input type="text" name="title" class="form-control validate" placeholder="" value="<?php echo $row2['title'];?>" required>
</div>
</div>
<div class="modal-body mx-3">
<div class="md-form mb-4">
<label>Status</label>
<select name="status" class="form-control">
<option value="Main image"<?php if($row2['status']=="Main image"){ echo "selected";}?>>Main image</option>
<option value="Sample"<?php if($row2['status']=="Sample"){ echo "selected";}?>>Sample</option>
</select> 
</div>
</div>
<div class="modal-footer d-flex justify-content-center">
<input type="submit" class="btn btn-info" value="Save" name="btnSave">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</form>
</div>

</div>

  <div><?php echo $row2['title'];?></div>
  <div>&nbsp;</div>
</div>
<?php }
?>
<br>
<?php
}
?>


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