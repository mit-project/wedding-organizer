<?php
include 'config.php';
session_start();
$email = $_SESSION['Email'];

$sql="SELECT COUNT(id) AS totalmsg FROM sent_reply WHERE receiverMail='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalmsg'];

if(isset($_POST['btnSaveDiscount'])){
$vid = $_POST['vendor_id'];
$discount = $_POST['discount'];
$sql ="INSERT INTO deal(vendor_id,discount) VALUES('$vid','$discount')";

if ($conn->query($sql) === TRUE) {
$_SESSION['message'] ="You have successfully saved deal details";
$_SESSION['msg_type'] ="success";
header( "refresh:2;url=deals.php" );
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

if(isset($_POST['postDeal'])){
$vid=$_POST['vendor_id'];
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
header( "refresh:2" );
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
}

?>
<!DOCTYPE html>
<head>
<title>Admin Panel | Deals</title>
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
                    <p class="red">You have <?php echo $num_rows; ?>  Mails</p>
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
		
        <div class="wthree-font-awesome">
        <div style="color:#CC9966; font-weight:bold; font-size:30px;" align="left">Deals</div><br>
         <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                     <form role="form" class="form-horizontal"  action="" method="post" id="deal" name="deal" >
                        <header class="panel-heading">
                            
                          Add a special discount for Wedding Organizer couples 
                        </header>
                        <div class="panel-body">
                        
                  <label>Offer a discount to couples who find and book you on Wedding organizer.</label>
                  <div>&nbsp;</div><br>
                      
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Vendor ID</label>
                                    <div class="col-lg-6">
                 <input type="text" name="vendor_id" placeholder="" id="vendor_id"  class="form-control" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Discount</label>
                                    <div class="col-lg-6">
                                     <select name="discount" class="form-control">
                                     <option>Select Discount </option>
                                     <option value="5%">5%</option>
                                     <option value="10%">10%</option>
                                     <option value="15%">15%</option>
                                     <option value="20%">20%</option>
                                     
                                     </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <input type="submit" class="btn btn-info" value="Save discount" name="btnSaveDiscount">
                                            
                                        </div>
                                    </div>
                                
                               
                        </div>
                        </form>
                    </section>
                </div>
            </div>
            
	
        <div style="color:#CC9966; font-weight:bold; font-size:30px;" align="left">Other Deals</div><br>
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Create New Deals
                            
                        </header>
                        <div class="panel-body">
         <form role="form" class="form-horizontal"  action="" method="post" id="new_deal" name="new_deal" enctype="multipart/form-data" >
                            <div class="form">
                               
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Vendor ID</label>
                                        <div class="col-lg-6">
                 <input type="text" class="form-control" placeholder="" id="vendor_id" name="vendor_id" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Deal Name</label>
                                        <div class="col-lg-6">
          <input type="text" name="dealName" value="" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Type of Deal</label>
                                        <div class="col-lg-6">
                                   <select name="Deal-type" class="form-control">
                                   <option>Select</option>
                          <option value="Discount">Discount</option>
                         <option value="Gift">Gift</option>
                         <option value="Offer">Offer</option>
                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Valid Until</label>
                                        <div class="col-lg-6">
                                       <input type="date" name="validDate" class="form-control" value=""> 
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-3">Image</label>
                                        <div class="col-lg-6">
                                       <input type="file" name="image" class="form-control" value="">
                                        </div>
                                    </div>
                                    
                                     <div class="form-group ">
<label for="confirm_password" class="control-label col-lg-3">Deal Description<br>Include percent discounted, promotion, or offer details</label>
                                        <div class="col-lg-6">
                                        <textarea name="description" rows="10" cols="25" class="form-control">
                                         </textarea>
                                        </div>
                                    </div>
                            <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <input type="submit" class="btn btn-info" value="Post Deal" name="postDeal">
                                            
                                        </div>
                                    </div>       
                                    
                                   </div>
                                   </form>
                                   </div>
                              </section>
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
