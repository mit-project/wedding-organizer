<?php
include 'config.php';
session_start();
$email= $_SESSION['email'];

$sql="SELECT COUNT(id) AS totalMsg FROM reply WHERE receiverMail='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalMsg'];

$sql1="SELECT COUNT(id) AS totalsentMsg FROM sent_message WHERE senderMail='$email'";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows1=$values1['totalsentMsg'];

if(isset($_GET['read'])){
$id=$_GET['read'];
$result=$conn->query("SELECT * FROM sent_message WHERE id=$id") or die($conn->error);
$row2 = $result->fetch_array();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Messages | Wedding organizer</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Marry Off Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Style-sheets -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/fontawesome-all.css" rel="stylesheet">
    
	<!--// Style-sheets -->
	<!--web-fonts-->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
    <style type="text/css">
	
	</style>
 <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>   
</head>

<body>
	<!-- banner -->
	<div class="banner inner-banner" id="home">
		<!-- header -->
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.html">Wedding organizer</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="home.php">Home
								
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="checklist.php">Checklist</a>
                            
						</li>
						<li class="nav-item">
							<a class="nav-link" href="budget.php">Budget</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="vendorManager.php">Vendor Manager</a>
                            
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="guestList.php">Guest List</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="task.php">Task Management</a></li>
                            
					</ul>
					<form action="../index.php" class="form-inline my-2 my-lg-0 search mx-lg-auto">
						
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Out</button>
					</form>
				</div>
			</nav>
		</header>
		<!-- //header -->
		<h1 class="inner-title-agileits-w3layouts">Messages</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="home.php">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Messages</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->
      <!--Body-->

<section class="contact py-5">
		<div class="container py-xl-5 py-sm-3">
			<h5 class="main-w3l-title mb-sm-3 mb-2"></h5>
			<div class="row">
				<div class="col-lg-4 wthree_contact_left">
				<a href="composeMail.php" class="btn btn-info py-2 px-5">Compose Mail</a>
					<div>&nbsp;</div><br>
						
						
					
					<h5><a href="messages.php" style="color:#333333;">Inbox</a><label style="padding-left:90px;">(<?php echo $num_rows;?>)
                    </label> </h5><br>
                    <h5><a href="sentMail.php" style="color:#333333;">Sent Mail</a><label style="padding-left:50px;">(<?php echo $num_rows1;?>)
                    </label></h5>
					
				</div>
				<div class="col-lg-8 wthree_contact_left">
			    <div class="container-fluid" style="background-color:#CCFFFF; height:500px;">
                
                <div style="padding-top:30px;"><strong><?php echo $row2['subject'];?></strong></div><br>
                <div>From:&nbsp;<?php echo $row2['senderMail'];?></div>
                <div>To:&nbsp;<?php echo $row2['receiverMail'];?></div><br>
                <div>Dear Sir/Madam,</div><br>
                 <div><?php echo $row2['message'];?></div><br>
                 <div>Kind Regards,</div>
                 <div><?php echo $row2['senderName'];?>.</div>
                 
                
                            
                </div>
					
				</div>
			</div>
		</div>
	</section>
             

	<div class="copyright-w3layouts">
		<div class="container">
			<p class="py-xl-4 py-3">© 2019 Wedding organizer . All Rights Reserved | Design by Hiruni Chandrasiri
				
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- Required common Js -->
	<script src='js/jquery-2.2.3.min.js'></script>
    <script>
    $(function() {
  $('.tabs nav a').on('click', function() {
    show_content($(this).index());
  });
  
  show_content(0);

  function show_content(index) {
    // Make the content visible
    $('.tabs .content.visible').removeClass('visible');
    $('.tabs .content:nth-of-type(' + (index + 1) + ')').addClass('visible');

    // Set the tab to selected
    $('.tabs nav a.selected').removeClass('selected');
    $('.tabs nav a:nth-of-type(' + (index + 1) + ')').addClass('selected');
  }
});
    </script>
	<!-- //Required common Js -->
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

	<!-- start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!--js for bootstrap working-->
	<script src="js/bootstrap.min.js"></script>
	<!-- //for bootstrap working -->

    
</body>

</html>