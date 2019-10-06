<?php
include '../vendor/config.php';
session_start();
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid = $row['id'];

$sql="SELECT COUNT(vendor_id) AS totalevents FROM event WHERE vendor_id=$vid";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalevents'];

if(isset($_POST['submit'])){
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT id FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid=$row['id'];

$eventName=$_POST['eventName'];
$eventType=$_POST['eventType'];
$Sdate=$_POST['startDate'];
$Stime=$_POST['sTime'];
$Edate=$_POST['endDate'];
$Etime=$_POST['eTime'];
$city=$_POST['city'];
$address=$_POST['address'];
$description=$_POST['description'];

$sql = "INSERT INTO event (vendor_id,EventName,EventType,StartDate,StartTime,EndDate,EndTime,City,Address,EventDescription) VALUES('$vid','$eventName','$eventType','$Sdate','$Stime','$Edate','$Etime','$city','$address','$description')";
if ($conn->query($sql) === TRUE) {
$_SESSION['message'] ="Event recorded successfully";
$_SESSION['msg_type'] ="success";
header( "refresh:2;url=events.php" );
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
 
if(isset($_GET['update'])){
$id=$_GET['update'];
$update=true;
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM event WHERE id=$id") or die($conn->error);
$row2 = $result->fetch_array();
$u_eventName=$row2['EventName'];
$u_eventType=$row2['EventType'];
$u_Sdate=$row2['StartDate'];
$u_Stime=$row2['StartTime'];
$u_Edate=$row2['EndDate'];
$u_Etime=$row2['EndTime'];
$u_city=$row2['City'];
$u_address=$row2['Address'];
$u_description=$row2['EventDescription'];
}

if(isset($_POST['btnSave'])){
$id=$_POST['id'];
$eventName=$_POST['eventName'];
$eventType=$_POST['eventType'];
$Sdate=$_POST['startDate'];
$Stime=$_POST['sTime'];
$Edate=$_POST['endDate'];
$Etime=$_POST['eTime'];
$city=$_POST['city'];
$address=$_POST['address'];
$description=$_POST['description'];

$conn->query("UPDATE event SET EventName='$eventName',EventType='$eventType',StartDate='$Sdate',StartTime='$Stime',EndDate='$Edate',EndTime='$Etime',City='$city',Address='$address',EventDescription='$description' WHERE id=$id") or die($conn->error);
$_SESSION['message'] ="Record has been updated";
$_SESSION['msg_type'] ="warning";
header("refresh:2;url=events.php");
} 


?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Vendor | Create Events</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<script type="text/javascript">
function validateForm(){
var Sdate = document.getElementById("startDate").value;
var Edate = document.getElementById("endDate").value;


var sDate = new Date(Sdate); //dd-mm-YYYY
var eDate = new Date(Edate);
var today = new Date();



if (sDate.setHours(0,0,0,0)<=today.setHours(0,0,0,0)){
alert("Event start date cannot be past date or today. Please insert a upcoming date");
return false;
}
else if (eDate.setHours(0,0,0,0)<sDate.setHours(0,0,0,0)){
alert("End date cannot be before start date");
return false;
}

else if (eDate.setHours(0,0,0,0)<=today.setHours(0,0,0,0)){
alert("Event end date cannot be past date or today. Please insert a upcoming date");
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
			
					<h1 class="title">Upcomimg Events</h1>
					
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
            <h4 class="pre-title center-text">Add details about upcoming events you are hosting! 
Events encourage potential clients to attend and learn more about your business. </h4>
 <div>&nbsp;</div><br>
				
					<div class="contact-form" style="margin-left:250px; margin-top:30px;">
						<h4 class="pre-title  text-left">Add New Events</h4>
                        <hr>
						<br>
				 <form name="events" action="" method="post" onSubmit="return validateForm()">
                 
							<div class="row">
							
								<div class="col-sm-6 margin-bottom">
								<label>Event Name</label>
                                <input type="text" name="eventName" class="form-control" required>	
                                </div>
                                
                                <div class="col-sm-6 margin-bottom">
								<label>Type of Event</label>
                                <Select name="eventType" class="form-control">
                            <option value="Inauguration">Inauguration</option>
                            <option value="Contest">Contest</option>
                             <option value="Parade">Parade</option>
                              <option value="Concert">Concert</option>
                             <option value="Course">Course</option>
                              <option value="Raffle">Raffle</option>
                               <option value="Bridal Show">Bridal Show</option>
                               </Select>	
                                </div>
                                
                                </div>
                                <div class="row">
                                <div class="col-sm-6 margin-bottom">
								<label>Start Date</label>
                                <input type="date" name="startDate" id="startDate" value="" class="form-control" required>	
                                </div>
                                
                                <div class="col-sm-6 margin-bottom">
								<label>Time</label>
                                <input type="text" name="sTime" value=""  class="form-control">

                                </div>
                                </div>
                                
								<div class="row">
                                <div class="col-sm-6 margin-bottom">
								<label>End Date</label>
                                <input type="date" name="endDate" id="endDate" value="" class="form-control" required>	
                                </div>
                                
                                <div class="col-sm-6 margin-bottom">
								<label>Time</label>
                                <input type="text" name="eTime" value=""  class="form-control">
                                </div>
                                </div>
                                
                               <div class="row">
							
								<div class="col-sm-6 margin-bottom">
								<label>City</label>
                                <input type="text" name="city" class="form-control" required>	
                                </div>
                                
                                <div class="col-sm-6 margin-bottom">
								<label>Address</label>
                                <input type="text" name="address" class="form-control" required>	
                                </div>
                                </div>
                                
                                <div class="col-sm-6 margin-bottom">
								<label>Event Description</label>
                                <textarea name="description" cols="55" rows="5" required>
                                 </textarea>	
                                </div>

								<div class="col-sm-12 center-text">
									<input type="submit"  class="btn"  name="submit" value="Create Event" style="width:200px;">
								</div>
								
								
						</form>
					</div><!-- contact-form -->
				</div><!-- col-sm-6 -->
				
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
	<h2 class="text-left" style="padding-left:50px;">Upcoming Events (<?php echo $num_rows;?>)</h2><br>
    <?php
          $resultS=$conn->query("SELECT * FROM event WHERE vendor_id=$vid") or die($conn->error);
          if($resultS->num_rows>0){
		  while($row2 = $resultS->fetch_array()){
		      $date=date_create($row2['StartDate']);
              $startDate = date_format($date,"M d, Y");
			  $date1=date_create($row2['EndDate']);
              $endDate = date_format($date1,"M d, Y");
          ?>
	<div class="contact-form" style="background-color:#FFCC99; width:400px; margin-left:50px;">
   <div class="text-center" style="color:#FFFFFF;"> <?php echo $row2['EventName'];?></div><br>
   <div><?php echo $row2['EventDescription'];?></div><br>
   <div>Start on <?php echo $startDate;?> at <?php echo $row2['StartTime'];?></div>
   <div>End on <?php echo  $endDate;?> at <?php echo $row2['EndTime'];?></div><br>
   <div>Venue: <?php echo $row2['Address'];?></div>
   <hr>
   <div class="text-center">
    <a href="#update<?php echo $row2['id'];?>" data-toggle="modal" style="color:#003366; border: 0; background: none;">Edit Event</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#FF0033; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row2['id'];?>)">Delete Event</button></a> 
</div>
 <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Event?")){
		   window.location.href='deleteEvent.php?del_id=' +delid+'';
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
<lable class="modal-title font-weight-bold" style="color:#FFFFFF; font-size:16px;">Edit Event</label>
</div>
<div class="row" style="padding-top:5px; margin-left:5px; margin-right:5px;">
<div class="col">
<label>Event Name</label>
<input type="text" name="eventName" class="form-control" value="<?php echo $row2['EventName']; ?>" required>
</div>


<div class="col">
<label>Event Type</label>
<Select name="eventType" class="form-control">
<option value="Inauguration"<?php if($row2['EventType']=="Inauguration"){ echo "selected";}?>>Inauguration</option>
<option value="Contest"<?php if($row2['EventType']=="Contest"){ echo "selected";}?>>Contest</option>
<option value="Parade"<?php if($row2['EventType']=="Parade"){ echo "selected";}?>>Parade</option>
<option value="Concert"<?php if($row2['EventType']=="Concert"){ echo "selected";}?>>Concert</option>
<option value="Course"<?php if($row2['EventType']=="Course"){ echo "selected";}?>>Course</option>
<option value="Raffle"<?php if($row2['EventType']=="Raffle"){ echo "selected";}?>>Raffle</option>
<option value="Bridal Show"<?php if($row2['EventType']=="Bridal Show"){ echo "selected";}?>>Bridal Show</option>
</Select>
</div>
</div>

<div class="row" style="padding-top:5px; margin-left:5px; margin-right:5px;">
<div class="col">
<label>Start Date</label>
<input type="date" name="startDate" class="form-control" value="<?php echo $row2['StartDate']; ?>" required>
</div>
<div class="col">
<label>Time</label>
<input type="text" name="sTime" class="form-control" value="<?php echo $row2['StartTime']; ?>" required>
</div>
</div>

<div class="row" style="padding-top:5px; margin-left:5px; margin-right:5px;">
<div class="col">
<label>End Date</label>
<input type="date" name="endDate" class="form-control" value="<?php echo $row2['EndDate']; ?>" required>
</div>
<div class="col">
<label>Time</label>
<input type="text" name="eTime" class="form-control" value="<?php echo $row2['EndTime']; ?>" required>
</div>
</div>

<div class="row" style="padding-top:5px; margin-left:5px; margin-right:5px;">
<div class="col">
<label>City</label>
<input type="text" name="city" class="form-control" value="<?php echo $row2['City']; ?>" required>
</div>
<div class="col">
<label>Address</label>
<input type="text" name="address" class="form-control" value="<?php echo $row2['Address']; ?>" required>
</div>
</div>
<div class="row" style="padding-top:5px; margin-left:5px; margin-right:5px;">
<div class="col">
<label>Event Description</label>
<textarea name="description" cols="40" rows="5" class="form-control"><?php echo $row2['EventDescription'];?>
</textarea>
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

    </div>
	<?php } ?>
    <?php } ?>
<div>&nbsp;</div><br>


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