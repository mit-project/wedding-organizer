<?php
include '../vendor/config.php';
session_start();
$id=0;
$update=false;
$u_dealName ="";
$u_dealType ="";
$u_valid ="";
$u_image ="";
$u_description ="";
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid = $row['id'];

$sql2="SELECT COUNT(id) AS TotalDeal FROM new_deal WHERE vendor_id=$vid";
$result2=mysqli_query($conn,$sql2);
$values2=mysqli_fetch_assoc($result2);
$num_rows2=$values2['TotalDeal']; 


if (isset($_POST['update'])) {
$sql1="SELECT COUNT(id) AS Total FROM deal WHERE vendor_id=$vid";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows1=$values1['Total']; 
$vid = $row['id'];
$discount=$_POST['discount'];
if($num_rows1==0){
$sql ="INSERT INTO deal(vendor_id,discount) VALUES('$vid','$discount')";

if ($conn->query($sql) === TRUE) {
$_SESSION['message'] ="You have successfully saved deal details";
$_SESSION['msg_type'] ="success";
header( "refresh:2;url=deals.php" );
} 
}
else{
$id=$_POST['id'];
$discount = $_POST['discount'];
$conn->query("UPDATE deal SET discount='$discount' WHERE id=$id") or die($conn->error);
$_SESSION['message'] ="Record has been updated";
$_SESSION['msg_type'] ="warning";
header("refresh:2;url=deals.php");
}
}

if(isset($_POST['save'])){
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT id FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid=$row['id'];
$dealName = $_POST['dealName'];
$dealType = $_POST['Deal-type'];
$valid = $_POST['validDate'];
$image=$_FILES['image']['name'];
$description = $_POST['description'];
$target = "uploads/".basename($_FILES["image"]["name"]);

$sql = "INSERT INTO new_deal(vendor_id,dealName,dealType,validUntil,image,dealDescription) VALUES('$vid','$dealName','$dealType','$valid','$image','$description')";

if ($conn->query($sql) === TRUE) {
if(move_uploaded_file($_FILES["image"]["tmp_name"], $target)){
$_SESSION['message'] ="You have successfully saved deal details";
$_SESSION['msg_type'] ="success";
header( "refresh:2;url=deals.php" );
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
}

if(isset($_GET['update1'])){
$id=$_GET['update1'];
$update=true;
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM new_deal WHERE vendor_id=$id") or die($conn->error);
$row2 = $result->fetch_array();
$u_dealName = $row2['dealName'];
$u_dealType = $row2['dealType'];
$u_valid = $row2['validUntil'];
$u_image = $row2['image'];
$u_description = $row2['dealDescription'];
}

if(isset($_POST['updateDeal'])){
$id=$_POST['id'];
$dealName = $_POST['dealName'];
$dealType = $_POST['Deal-type'];
$valid = $_POST['validDate'];
$image=$_FILES['image']['name'];
$description = $_POST['description'];
$target = "uploads/".basename($_FILES["image"]["name"]);

if(move_uploaded_file($_FILES["image"]["tmp_name"], $target)){
}
else{
  $image=$old_image;
  }
$conn->query("UPDATE new_deal SET dealName='$dealName',dealType='$dealType',validUntil='$valid',image='$image',dealDescription='$description' WHERE id=$id") or die($conn->error);
$_SESSION['message'] ="Deal has been updated";
$_SESSION['msg_type'] ="warning";
header("refresh:2;url=deals.php");
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Vendor | Deals/Discounts</title>
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
<style type="text/css">

.text-block {
  position: absolute;
  bottom:240px;
  right: 60px;
  color:#000000;
  background-color:#FF0000; 
  opacity:.7;
  width: 110px;
  height: 100px;
  padding-left: 10px;
  padding-top: 10px;
  font-size:16px;
}

.radio{
     width:20px;
	 height:20px;
	 }
</style>	
<script type="text/javascript">
function validateForm(){
var Vdate = document.getElementById("validDate").value;
var type = document.getElementById("Deal-type").value;


var vDate = new Date(Vdate); //dd-mm-YYYY
var today = new Date();



if (vDate.setHours(0,0,0,0)<=today.setHours(0,0,0,0)){
alert("Date cannot be past date or today. Please insert a upcoming date");
return false;
}
else if(type.length <=0){
alert("Please select deal type ");
return false;
}
}
</script>	
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
			
					<h1 class="title">Deals/ Discounts</h1>
					
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
<h4 class="pre-title center-text">Add details about deals you offer to clients or specials you want to offer just for Wedding Organizer couples. </h4>
<div>&nbsp;</div><br>
<div class="container" style="display:block; border:groove; width:900px; margin-top:50px; background-color:#FFFFFF;">
 <?php 

$result=$conn->query("SELECT * FROM deal WHERE vendor_id=$vid") or die($conn->error);
$row = $result->fetch_array();
?>   
 <?php
$email=$_SESSION['login_user'];
$sql="SELECT COUNT(id) AS total FROM deal WHERE vendor_id=$vid";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
if( $num_rows == 1){?>                     
<div>
<img src="images/discount.png" style="width:200px; height:200px;" align="right">
<div class="text-block" style="font-size:20px; font-weight:bold;"><?php echo $row['discount'];?> discount offered</div>
</div>
<?php } ?>                                 
                                   
				
<h4 class="pre-title  text-left" style="padding-top:20px; color:#003333;">Add a special discount for Wedding Organizer couples</h4><br>
                       
<div>Offer a discount to couples who find and book you on Wedding organizer.<br> Deals help you attract more couples and track how they found your business.</div>  <br>  

                                
<form name="social media" action="" method="post">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
<div style="margin-left:100px;">
<div class="form-group">
<input type="radio"  name="discount" class="radio" value="5%"<?php $row['discount'] =='5%'? print "checked" :"";?>/>&nbsp;5% 
</div>

<div class="form-group">
<input type="radio" name="discount"  class="radio" value="10%"<?php $row['discount'] =='10%'? print "checked" :"";?>/>&nbsp;10%
</div>

<div class="form-group">
<input type="radio" name="discount" class="radio" value="15%"<?php $row['discount'] =='15%'? print "checked" :"";?>/>&nbsp;15%
</div>
  
<div class="form-group">
<input type="radio" name="discount" class="radio" value="20%"<?php $row['discount'] =='20%'? print "checked" :"";?>/>&nbsp;20%
</div>
</div>
<div class="form-group">
<input type="submit" class="btn btn-info" value="Save Discount" name="update">
</div>
</form>
			
				</div><!-- col-sm-6 -->
				
			</div><!-- row -->
            
           <h2 class="text-left" style="padding-top:20px; color:#006666;">Other Deals</h2>
           <h4 class="pre-title center-text">Offer a discount or special package to attract new business.</h4>
           <div class="contact-form" style="margin-top:20px;">
           <h4 class="pre-title  text-left">Add New Deals</h4>
            <hr>
            <form name="deal" action="" method="post" enctype="multipart/form-data" onSubmit="return validateForm()">
            <div class="row">
            <div class="col-sm-6 margin-bottom">
			<label>Deal Name</label>
            <input type="text" name="dealName" value="" class="form-control" required >
           </div>
           
           <div class="col-sm-6 margin-bottom">
			<label>Deal Type</label>
            <select name="Deal-type" id="Deal-type" class="form-control" required>
            <option>Select Deal Type</option>
            <option value="Discount">Discount</option>
             <option value="Gift">Gift</option>
            <option value="Offer">Offer</option>
            </select>
           </div>
           
           </div>
           <div class="row">
            <div class="col-sm-6 margin-bottom">
			<label>Valid Until</label>
            <input type="date" name="validDate" id="validDate" class="form-control" value="" required> 
            </div>
            
            <div class="col-sm-6 margin-bottom">
			<label>Image</label>
            <input type="file" name="image" class="form-control" value="" required>
            </div>
             </div>
             <div class="row">
             <div class="col-sm-12 margin-bottom">
			<label>Deal Description <br>* Include percent discounted, promotion, or offer details.</label>
            <textarea name="description" rows="10" cols="25" class="form-control" required>
           </textarea>
            </div>
            </div>
           <div class="col-sm-12 center-text">
		   <input type="submit"  class="btn"  name="save" value="Post Deal" style="width:200px;">
			</div>  
           </form>
           </div>
           
		</div><!-- container -->
       
	</section><!-- section -->

    <h2 class="text-left" style="padding-left:50px;">Total Deals (<?php echo $num_rows2;?>)</h2>
    <div>&nbsp;</div><br>
     <?php
          $resultS=$conn->query("SELECT * FROM new_deal WHERE vendor_id=$vid") or die($conn->error);
          if($resultS->num_rows>0){
		  while($row2 = $resultS->fetch_array()){
          ?>
          <div class="container" style="display:inline-block; width:300px;">              
  <img src="<?php echo 'uploads/'.$row2['image'];?>" height="150px" width="250px">
  <div><?php echo $row2['dealType'];?>
  <label style="padding-left:150px;">
  <a href="#update1<?php echo $row2['id'];?>" data-toggle="modal" style="color:#003366; border: 0; background: none;"><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>&nbsp;&nbsp;
<a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#FF0033; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row2['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a> 
  </label>
  <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Deal?")){
		   window.location.href='deleteDeal.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
    <div class="modal fade" id="update1<?php echo $row2['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form name="photos" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $row2['id'];?>" />
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center" style="background-color:#CC9999;">
<lable class="modal-title font-weight-bold" style="color:#FFFFFF; font-size:16px;">Edit Deal</label>
</div>
<div class="modal-body mx-3">
<label>Deal Name</label>
<input type="text" name="dealName" value="<?php echo $row2['dealName']; ?>" class="form-control" required >
</div>

<div class="modal-body mx-3">
<label>Deal Type</label>
<select name="Deal-type" class="form-control">
 <option>Select</option>
 <option value="Discount"<?php if($row2['dealType']=="Discount"){ echo "selected";}?>>Discount</option>
 <option value="Gift"<?php if($row2['dealType']=="Gift"){ echo "selected";}?>>Gift</option>
 <option value="Offer"<?php if($row2['dealType']=="Offer"){ echo "selected";}?>>Offer</option>
 </select>
</div>
<div class="modal-body mx-3">
<label>Valid Until</label>
<input type="date" name="validDate" class="form-control" value="<?php echo $row2['validUntil']; ?>"> 
</div>

<div class="modal-body mx-3">
<label>Image</label>
<input type="file" name="image" class="form-control" value="<?php echo $row2['image']; ?>"> 
</div>

<div class="modal-body mx-3">
<label>Deal Description</label>
<textarea name="description" rows="10" cols="25" class="form-control"><?php echo $row2['dealDescription']; ?>
</textarea>
</div>


<div class="modal-footer d-flex justify-content-center">

<input type="submit" class="btn btn-info" value="Save" name="updateDeal">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</form>
</div>

  </div>
  
  
  <div><?php echo $row2['dealName'];?></div>
  </div>
<?php }} ?>
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