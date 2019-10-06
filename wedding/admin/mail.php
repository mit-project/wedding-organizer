<?php 
include 'config.php';
session_start();
$email = $_SESSION['Email'];

$sql="SELECT COUNT(id) AS totalmsg FROM sent_reply WHERE receiverMail='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalmsg'];
?>
<!DOCTYPE html>
<head>
<title>Admin Panel  | Mail </title>
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
 <link href="css/minimal.css" rel="stylesheet">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
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

    <a href="index.php" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->


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
		<div class="mail-w3agile">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-3 com-w3ls">
                <section class="panel">
                    <div class="panel-body">
                        <a href="mail_compose.php"  class="btn btn-compose">
                            Compose Mail
                        </a>
                        <ul class="nav nav-pills nav-stacked mail-nav">
<li class="active"><a href="mail.php"> <i class="fa fa-inbox"></i> Inbox  <span class="label label-danger pull-right inbox-notification"><?php echo $num_rows; ?></span></a></li>
                            <li><a href="sentMail.php"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                         
                        </ul>
                    </div>
                </section>

                
            </div>
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case">Inbox (<?php echo $num_rows; ?>)
                         </h4>
                    </header>
                    <div class="panel-body minimal">
                        <div class="mail-option">
                            
                       
                        <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover">
                        <tbody>
                        <?php
                        $email = $_SESSION['Email'];
                         $sql = "SELECT * FROM sent_reply WHERE receiverMail='$email'";
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
                            <td class="view-message  dont-show"><a href="showMail.php?read=<?php echo $value['id']; ?>"></a><?php echo $value['businessName'];?></td>
                            <td class="view-message "><a href="showMail.php?read=<?php echo $value['id']; ?>"><?php echo $value['subject'];?></a></td>
                            <td class="view-message  inbox-small-cells"><button type="button" style=" border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></td>
                            <td class="view-message  text-right"><?php echo $value['sent_on'];?></td>
                            
         <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Message?")){
		   window.location.href='deleteMessage.php?del_id=' +delid+'';
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
                </section>
            </div>
        </div>

        <!-- page end-->
        </div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2019 Wedding organizer. All rights reserved | Design by Hiruni Chandrasiri</p>
			</div>
		  </div>
  <!-- / footer -->
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
