<?php
include '../vendor/config.php';
session_start();
$email=$_SESSION['login_user'];
$result=$conn->query("SELECT * FROM vendor_registration WHERE Login_email='$email'") or die($conn->error);
$row = $result->fetch_array();
$vid = $row['id'];

$sql="SELECT COUNT(vendor_id) AS totalmsg FROM message WHERE vendor_id=$vid";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalmsg'];

$sql1="SELECT COUNT(vendor_id) AS totalmsgSent FROM reply WHERE vendor_id=$vid";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows1=$values1['totalmsgSent'];



?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Vendor | Messages</title>
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
					
					
					<h1 class="title">Messages</h1>
					
				</div><!-- slider-content-->
			</div><!--display-table-cell-->
		</div><!-- display-table-->
	</div><!-- main-slider -->
	<section class="section contact-area">
		<div class="container">
			<div class="row">
     <div class="col-sm-12 col-md-2 col-lg-4">
	<a href="composeMail.php" class="btn btn-info">Compose Mail</a>
    <br>
    <div>&nbsp;</div>
    <div style="font-size:24px;"><i class="fa fa-inbox" aria-hidden="true"></i> <a href="messages.php">Inbox</a>&nbsp;<label style="padding-left:65px;">(<?php echo $num_rows; ?>)</label></div><br>
    <div style="font-size:24px;"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="sentMail.php">Sent Mail</a>&nbsp;<label style="padding-left:15px;">(<?php echo $num_rows1; ?>)</label></div>
    
    </div>
  
    <div class="col-sm-12 col-md-12 col-lg-6">
	<div class="contact-form margin-bottom" style="width:800px;">
    <label style="font-size:22px;">SENT MAIL (<?php echo $num_rows1; ?>)</label>
    <div>&nbsp;</div><br>
     <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover">
                        <tbody>
                        <?php
                        $email=$_SESSION['login_user'];
                         $sql = "SELECT * FROM sent_reply WHERE vendor_id=$vid";
                         $result = mysqli_query($conn, $sql);
                          //var_dump($result);die;
                          if ($result){
                           foreach($result as $key => $value){
                              ?> 
                        <tr class="unread">
                            <td class="inbox-small-cells">
                                <input type="checkbox" class="mail-checkbox">
                            </td>
                             

                         
                            <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
      <td class="view-message  dont-show"><a href="showsentMail.php?read=<?php echo $value['id'];?>"><?php echo $value['receiverName'];?></a></td>
               <td class="view-message "><a href="showsentMail.php?read=<?php echo $value['id']; ?>"><?php echo $value['subject'];?></a></td>
               <td class="view-message  text-right"><?php echo $value['sent_on'];?></td>
        <td class="view-message  inbox-small-cells"><button type="button" style=" border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></td>
                            
                            
         <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Message?")){
		   window.location.href='deleteSentMessage.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
                                     
                        </tr>
                        
                        <?php
						}
						}
						?>
                     
                        </tbody>
                        </table>

                        
                    </div>
    </div>
    </div>
    </div>
    </div>
    <section>
	
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