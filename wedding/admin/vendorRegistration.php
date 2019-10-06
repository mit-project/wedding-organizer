<?php
include 'config.php';
if(isset($_POST['submit'])){

            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['cpassword'];
		    $businessname=$_POST['businessName'];
			$category=$_POST['category'];
			$contactNo =$_POST['telno'];
			$emailID=$_POST['emailID'];
			$website =$_POST['website'];
            $firstname=$_POST['fname'];
			$lastname=$_POST['lname'];
			$address=$_POST['address'];
			$city=$_POST['city'];
			
            
            

            if ($confirm != $password) {
            echo("Your passwords does not match!");
		 
			}

$sql = "INSERT INTO vendor_registration (Login_email,password,businessName,category,Name,contactno,email,website,address,city)
VALUES ('$email','$password','$businessname','$category',('$firstname $lastname'),'$contactNo','$emailID','$website','$address','$city')";


if ($conn->query($sql) === TRUE) {
$_SESSION['message'] ="You have successfully registered with wedding organizer....";
$_SESSION['msg_type'] ="success";
header( "refresh:2");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


?>
<!DOCTYPE html>
<head>
<title>Admin Panel | Vendor Registration</title>
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
<script type="text/javascript">
function validateForm(){
var password=document.signUp.password.value;
var cpassword=document.signUp.cpassword.value;
var email=document.signUp.email.value;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if(password.length<7){
alert("Password must be atleast 6 characters");
return false;
} 
else if(password!=cpassword){
alert("Password does not match");
return false;
}
else if(!filter.test(email)){
alert("Please provide a valid email address");
return false;
}
}
</script>
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
                <span class="badge bg-important">4</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/1.png"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/2.png"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">See all messages</a>
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
		<form role="form" class="form-horizontal"  action="" method="post" id="signUp" name="signUp" onSubmit="return validateForm()">
        <div class="wthree-font-awesome">
        <div style="color:#CC9966; font-weight:bold; font-size:30px;" align="left">Vendor Registration</div><br>
         <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Log in Information
                            
                        </header>
                        <div class="panel-body">
                        
                  <label>Password must contain at least 6 characters and is case sensitive.</label>
                  <div>&nbsp;</div><br>
                      
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email ID</label>
                                    <div class="col-lg-6">
                 <input type="text" name="email" placeholder="Email Address" id="email"  class="form-control" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Password</label>
                                    <div class="col-lg-6">
                <input type="password" name="password" placeholder="Password" id="password" class="form-control" required >
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Confirm Password</label>
                                    <div class="col-lg-6">
            <input type="password" name="cpassword" placeholder="Confirm Password" id="cpassword" class="form-control" required>
                                        
                                    </div>
                                </div>

                               
                            
                        </div>
                    </section>
                </div>
            </div>
		
        
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Business Information
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
                               
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Business Name</label>
                                        <div class="col-lg-6">
                 <input type="text" class="form-control" placeholder="Business Name" id="businessName" name="businessName" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Category</label>
                                        <div class="col-lg-6">
                                            <select name="category" class="form-control" id="category" required>
      <option>Select Category</option>
      <option>Venue</option>
      <option >Catering</option>
      <option >Photography </option>
	  <option>Videography</option>
      <option >Wedding car</option>
      <option >Jewellary</option>
      <option >Wedding invitation</option>
      <option >Flowers & decoration</option>
      <option>Wedding cakes</option>
      <option >DJ/bands</option>
      <option>Health & beauty</option>
      <option >Bridal Accessories</option>
      <option >Groom Accessories</option>
</select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">First Name</label>
                                        <div class="col-lg-6">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" id="fname" require>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Last Name</label>
                                        <div class="col-lg-6">
                                          <input type="text" class="form-control" name="lname" placeholder="Last Name" id="lname" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-3">Contact No</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="telno" placeholder="Contact No" id="telno" required>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-3">Email ID</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="emailID" placeholder="Email ID" id="emailID" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Website</label>
                                        <div class="col-lg-6">
                                           <input type="text" class="form-control" name="website" placeholder="Website" id="website" >
                                        </div>
                                    </div>
                                    </div>
                                    </section>
                                    </div>
                                    </div>
                                    

                                   
                                 <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Business Location
                           
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Address</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="address" placeholder="Address" id="address" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">City/Town</label>
                                        <div class="col-lg-6">
                                          <input type="text" class="form-control" name="city" placeholder="City/Town" id="city" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                           <input type="submit" class="btn btn-info" value="Create Account" id="btncreate" name="submit">
                                            
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
