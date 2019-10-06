<?php
include '../vendor/config.php';
session_start();
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid = $row['id'];

$sql="SELECT COUNT(vendor_id) AS totalvideos FROM videos WHERE vendor_id=$vid";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalvideos'];

// Uploads files
if (isset($_POST['upload'])) { // if save button on the form is clicked
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT id FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid=$row['id'];

$sql1="SELECT COUNT(id) AS Total FROM pricing WHERE vendor_id=$vid";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows1=$values1['Total']; 
    // name of the uploaded file
    $filename = $_FILES['pricingsheet']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['pricingsheet']['tmp_name'];
    $size = $_FILES['pricingsheet']['size'];

    if (!in_array($extension, ['zip', 'pdf'])) {
	$_SESSION['message'] ="Your file extension must be .zip or .pdf ";
                $_SESSION['msg_type'] ="danger";
                header( "refresh:2" );
        
    } elseif ($_FILES['pricingsheet']['size'] > 2000000) { // file shouldn't be larger than 2Megabyte
        $_SESSION['message'] = "File is too large";
                $_SESSION['msg_type'] ="danger";
                header( "refresh:2" );
    } elseif ($num_rows1==0){

       
        // move the uploaded (temporary) file to the specified destination
            $sql = "INSERT INTO pricing (vendor_id,filename) VALUES ('$vid','$filename')";
            if ($conn->query($sql) === TRUE) {
			if (move_uploaded_file($file, $destination)) {
                $_SESSION['message'] ="Pricing sheet upload successfully";
                $_SESSION['msg_type'] ="success";
                header( "refresh:2;url=pricing.php" );
				}
            }
        } 
		
		else{
		$result=$conn->query("SELECT * FROM pricing WHERE vendor_id=$vid") or die($conn->error);
        $row = $result->fetch_array();
		$u_filename=$row['filename'];
		$filename = $_FILES['pricingsheet']['name'];
		unlink("uploads/".$u_filename);
		if (move_uploaded_file($file, $destination)) {
		$conn->query("UPDATE pricing SET filename='$filename' WHERE vendor_id=$vid") or die($conn->error);
		$_SESSION['message'] ="File updated succesfully ";
        $_SESSION['msg_type'] ="danger";
        header( "refresh:2" );
		}
		}
    }

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Vendor | Pricing</title>
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
			
					<h1 class="title">Pricing</h1>
					
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
<h4 class="pre-title center-text">Add general pricing details in order to better qualify potential clients looking at your business.   </h4>
 <div>&nbsp;</div><br>
				
				
					<div class="contact-form" style="margin-left:350px; margin-top:50px;">
						<h4 class="pre-title  text-left">Add your rate card to your Storefront</h4>
                        <hr>
						<img src="images/pdf-512.png"  style= "margin-top:10px; width:100px; height:100px; margin-left:170px;"><br>  
                        <label style="padding-left:180px;"><strong>Pricing sheet</strong></label><br>
                        <label style="color:#000033;">* You can only upload one pricing sheet for your Storefront.<br>
                                   If you upload a new file, the existing PDF file will be removed</label>
                                   
                          <?php 
                       $email=$_SESSION['login_user'];
					   $result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
                       $row = $result->fetch_array();
                       $vid = $row['id'];
                       $sql1="SELECT COUNT(id) AS total FROM pricing WHERE vendor_id=$vid";
                       $result1=mysqli_query($conn,$sql1);
                       $values1=mysqli_fetch_assoc($result1);
                       $num_rows2=$values1['total'];

                       $result=$conn->query("SELECT * FROM pricing WHERE vendor_id=$vid") or die($conn->error);
                       $row2 = $result->fetch_array();
                       if($num_rows2==1){
                       ?>


<div class="container" style="background-color:#CCCCFF; width:280px; height:50px;">
<a href="<?php echo 'uploads/'.$row2['filename'];?>" target="_blank" style="padding-top:20px;"><?php echo $row2['filename'];?></a>
<a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#000000; margin-left:90px; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row2['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a> 
<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Pricing sheet?")){
		   window.location.href='deleteSheet.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
</div>
<?php } ?>         
                                   
 <div>&nbsp;</div>
 <br>                                  
                                   
                                   
            <form name="pricing" action="" method="post" enctype="multipart/form-data">
            <label>Pricing sheet (PDF)</label>
           <input type="file" name="pricingsheet" class="form-control">     
							
         <div class="col-sm-12 center-text">
		<input type="submit"  class="btn"  name="upload" value="Upload" style="width:200px;">
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