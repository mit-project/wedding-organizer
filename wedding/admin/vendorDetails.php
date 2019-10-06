<?php
include 'config.php';
session_start();
$email = $_SESSION['Email'];

$sql="SELECT COUNT(id) AS totalmsg FROM sent_reply WHERE receiverMail='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalmsg'];

if (isset($_GET['view'])){
$id = $_GET['view'];
$result=$conn->query("SELECT * FROM  vendor_registration WHERE id=$id") or die($conn->error);
$row = $result->fetch_array();
}


?>
<!DOCTYPE html>
<head>
<title>Admin Panel | Vendor Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.php" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
       
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important"><?php echo $num_rows; ?></span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have <?php echo $num_rows; ?> Mails</p>
                </li>
                <li>
                <?php
                        $email = $_SESSION['Email'];
                         $sql = "SELECT * FROM sent_reply WHERE receiverMail='$email'";
                         $result = mysqli_query($conn, $sql);
                          //var_dump($result);die;
                          if ($result){
                           foreach($result as $key => $value){
                              ?> 
                    <a href="mail.php">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from"><?php echo $value['businessName'];?></span>
                                </span>
                                <span class="subject">
                                    <?php echo $value['sent_on'];?>
                                </span>
                    </a>
                   
                    <?php
					}
					}
					?>
                 </li>
                
                <li>
                    <a href="mail.php">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #2 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #3 overloaded.</a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
       
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/1.png">
                <span class="username">Hiruni</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                
                <li><a href="login.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Vendors</span>
                    </a>
                    <ul class="sub">
						<li><a href="vendorRegistration.php">Registration</a></li>
                        <li><a href="deals.php">Deals</a></li>
                        <li><a href="photos.php">Photos</a></li>
                        <li><a href="videos.php">Videos</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="pricing.php">Pricing</a></li>
                        <li><a href="social.php">Social Media</a></li>
                    </ul>
                </li>
                <li>
                    <a class="active" href="users.php">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub">
                        <li><a href="mail.php">Inbox</a></li>
                        <li><a href="mail_compose.php">Compose Mail</a></li>
                    </ul>
                </li>
                
                
                
                
            </ul> </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        <div class="wthree-font-awesome">
        
         <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            
                          General Information
                        </header>
                        <div class="panel-body">
 <img src="<?php echo 'uploads/'.$row['profileImage'];?>" width="100px" height="100px" style="border-radius:50%; margin-left:450px;" class="avatar"><a href="information.php?update=<?php echo $row['id'];?>" class="btn btn-info" style="margin-left:350px;">Edit</a><br>
 <div style="padding-left:400px; font-size:24px; color:#003333; font-weight:bold;"><?php echo $row['businessName']?></div>
 <div style="font-size:16px; color:#666666; font-weight:bold;">
 <div>Vendor ID:&nbsp;<?php echo $row['id'];?></div>
 <div>Business Name:&nbsp;<?php echo $row['businessName'];?></div>
 <div>Category:&nbsp;<?php echo $row['category'];?></div>
 <div>Contact Person:&nbsp;<?php echo $row['Name'];?></div>
 <div>Contact No:&nbsp;<?php echo $row['contactno'];?></div>
 <div>Email:&nbsp;<?php echo $row['email'];?></div>
 <div>Address:&nbsp;<?php echo $row['address'];?></div>
 <div>City:&nbsp;<?php echo $row['city'];?></div>
  </div>
 
                        </div>
                       
                    </section>
                </div>
            </div>
           
	 <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            
                          Photos
                        </header>
                        <div class="panel-body">
                       <?php
          $resultS=$conn->query("SELECT * FROM photos WHERE vendor_id=$id") or die($conn->error);
          if($resultS->num_rows>0){
		  while($row2 = $resultS->fetch_array()){
          
             ?>  
                        <div class="container" style="display:inline-block; border:groove; width:280px;">
<label><img src="<?php echo 'photos/'.$row2['photo'];?>" height="150px" width="250px"></label><br>


<label><strong><?php echo $row2['title'];?></strong></label><br>
<label><?php echo $row2['status'];?></label>
<label style="padding-left:90px;">
 <a class="btn btn-info" style="color:#003366; border: 0; background: none;" data-toggle="tooltip" title="Edit" href="editPhoto.php?update=<?php echo $row2['id']; ?>" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
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
 
                        </div>
                        <?php
						}
						}
						?>
                       </div>
                    </section>
                </div>
            </div>
        <?php
          $resultS=$conn->query("SELECT * FROM videos WHERE vendor_id=$id") or die($conn->error);
          if($resultS->num_rows>0){
		  while($row3 = $resultS->fetch_array()){
          
             ?>  
         <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            
                          Videos
                        </header>
                        <div class="panel-body">
                       
                        <div class="container" style="display:inline-block; border:groove; width:280px;">
                  <iframe src="<?php echo 'uploads/'.$row3['video'];?>?autoplay=0" width="250px" height="150px"  ></iframe>
                  <label><strong><?php echo $row3['Title'];?></strong></label><br>

 <a class="btn btn-info" style="color:#003366; border: 0; background: none;" data-toggle="tooltip" title="Edit" href="editVideo.php?update=<?php echo $row3['id']; ?>" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
 <a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#FF0033; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row3['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>


<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Video?")){
		   window.location.href='deleteVideo.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
 
                        </div>
                        <?php
						}
						}
						?>
                       </div>
                    </section>
                </div>
            </div>
             <?php
          $resultS=$conn->query("SELECT * FROM new_deal WHERE vendor_id=$id") or die($conn->error);
          if($resultS->num_rows>0){
		  while($row4 = $resultS->fetch_array()){
          
             ?>  
             <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            
                          Deal
                        </header>
                        <div class="panel-body">
                      
                        <table border="1">
<tr>
<td>
<img src="<?php echo 'uploads/'.$row4['image'];?>" height="150px" width="250px">
</td>
</tr>
<tr>
<td style="padding-left:20px;"><?php echo $row4['dealType']; ?><br>
<strong><?php echo $row4['dealName']; ?></strong><br>

 <a class="btn btn-info" style="color:#003366; border: 0; background: none;" data-toggle="tooltip" title="Edit" href="editDeal.php?update=<?php echo $row4['id']; ?>" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
 <a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#FF0033; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row4['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Deal?")){
		   window.location.href='deleteDeal.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
 
                        </table>
                        <?php
						}?>
                        <br>
                        <?php
						}
						?>
                       </div>
                    </section>
                </div>
            </div>
            
             <?php
          $resultS=$conn->query("SELECT * FROM event WHERE vendor_id=$id") or die($conn->error);
          if($resultS->num_rows>0){
		  while($row5 = $resultS->fetch_array()){
          
             ?>  
         <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            
                          Events
                        </header>
                        <div class="panel-body">
                       
                        <div class="container" style="display:inline-block; border:groove; width:300px;">

<label><strong><?php echo $row5['EventName']; ?> </strong></label>
<label>Start Date:&nbsp;<?php echo $row5['StartDate']; ?></label>
<label>Start Time:&nbsp;<?php echo $row5['StartTime']; ?></label>
<label>Address:&nbsp;<?php echo $row5['Address']; ?></label>

 <a class="btn btn-info" style="color:#003366; border: 0; background: none;" data-toggle="tooltip" title="Edit" href="editEvent.php?update=<?php echo $row5['id']; ?>" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
 <a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#FF0033; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row5['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>


<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Event?")){
		   window.location.href='deleteEvent.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
 
                        </div>
                        <?php
						}
						}
						?>
                       </div>
                    </section>
                </div>
            </div>
            
          </div>  </div>
    </div>       
</section>		

<!-- footer -->
	<div class="footer">
		<div class="wthree-copyright">
			<p>© 2019 Wedding organizer. All rights reserved | Design by Hiruni Chandrasiri</p>
		</div>
	</div>
<!-- //footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
