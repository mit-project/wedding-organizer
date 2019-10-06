<?php
include 'config.php';
session_start();
$email = $_SESSION['Email'];

$sql="SELECT COUNT(id) AS totalmsg FROM sent_reply WHERE receiverMail='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalmsg'];

if(isset($_GET['update'])){
$id=$_GET['update'];
$update=true;
$result=$conn->query("SELECT * FROM vendor_registration WHERE id=$id") or die($conn->error);
$row = $result->fetch_array();

$u_email=$row['email'];
$u_businessname=$row['businessName'];
$u_phoneNo =$row['contactno'];
$u_mobileNo=$row['mobileNo'];
$u_fax=$row['fax'];
$u_website=$row['website'];
$u_name=$row['Name'];
$u_address=$row['address'];
$u_city=$row['city'];
$u_businessHours=$row['businessHours'];
$u_description=$row['description'];
}

if(isset($_POST['btnSave'])){
       
	   $id = $_POST['id'];
	   $description = $_POST['description'];
	   $name = $_POST['Cperson'];
	   $emailnew = $_POST['email'];
	   $phoneNo = $_POST['pnumber'];
	   $mobileNo = $_POST['mnumber'];
	   $fax = $_POST['fax'];
	   $website = $_POST['website'];
	   $profile=$_FILES['profile']['name'];
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
<!DOCTYPE html>
<head>
<title>Admin Panel | Business Information</title>
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
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>


</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.html" class="logo">
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
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/1.png">
                <span class="username">Hiruni</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
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

    <?php
if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
?>
</div>
<?php endif ?>
		<form name="information" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
         <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
        <div class="wthree-font-awesome">
        <div style="color:#CC9966; font-weight:bold; font-size:30px;" align="left">Edit Business Information</div><br>
         <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Describe Your Business Informattion
                            
                        </header>
                        <div class="panel-body">
                        
                  <label>Share unique, descriptive information about your business in order to convert couples and improve your ranking across top search engines. Please do not include any contact information in this section.</label>
                  <div>&nbsp;</div><br>
                  
 <textarea name="description" rows="18" cols="120" ><?php echo $u_description;?> </textarea>  
                                
                                   
                        </div>
                    </section>
                </div>
            </div>
		</div>
        
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Contact Information
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
                               
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Contact Person</label>
                                        <div class="col-lg-6">
                <input type="text" name="Cperson" class="form-control" value="<?php echo $u_name; ?>" required >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                               <input type="text" name="email" value="<?php echo $u_email; ?>" class="form-control" required >
      
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Phone Number</label>
                                        <div class="col-lg-6">
                                 <input type="text" name="pnumber" value="<?php echo $u_phoneNo; ?>" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Mobile Number</label>
                                        <div class="col-lg-6">
                                    <input type="text" name="mnumber" value="<?php echo $u_mobileNo; ?>" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-3">Fax</label>
                                        <div class="col-lg-6">
                                   <input type="text" name="fax" value="<?php echo $u_fax; ?>" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Website</label>
                                        <div class="col-lg-6">
                                         <input type="text" name="website" value="<?php echo $u_website; ?>" class="form-control" >
                                        </div>
                                    </div>
                                    
                                     <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Profile Image</label>
                                        <div class="col-lg-6">
                                         <input type="file" name="profile" class="form-control">
                                        </div>
                                    </div>
                                    

                                   
                                 <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Location
                           
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">City</label>
                                        <div class="col-lg-6">
                                      <input type="text" name="city" value="<?php echo $u_city; ?>" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Address</label>
                                        <div class="col-lg-6">
                             <input type="text" name="address" value="<?php echo $u_address; ?>" class="form-control" required >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Business Hours</label>
                                        <div class="col-lg-6">
                           <textarea name="businessHours" rows="5" cols="53"><?php echo $u_businessHours; ?>
                           </textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
        <input type="submit" class="btn btn-info" name="btnSave" value="Save" style="margin-top:30px; width:100px; margin-bottom:50px;"> 
                                            
                                        </div>
                                    </div>
                                
                            </div>

                        </div>
                    </section>
                </div>
            </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </form>
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
