<?php
include 'config.php';
session_start();
$email= $_SESSION['email'];


$sqlmsg="SELECT COUNT(id) AS totalmsg FROM reply WHERE receiverMail='$email'";
$resultmsg=mysqli_query($conn,$sqlmsg);
$valuesmsg=mysqli_fetch_assoc($resultmsg);
$num_rowsmsg=$valuesmsg['totalmsg'];

$sql="SELECT COUNT(id) AS totalHired FROM hired_vendors WHERE user_name='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows1=$values['totalHired'];

$sql1="SELECT COUNT(id) AS totalFavourite FROM favourite WHERE user_name='$email'";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows2=$values1['totalFavourite'];

$percentage = round(($num_rows1/13) * 100,1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Vendor Manager | Wedding organizer</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <style type="text/css">
	.progress-bar{
        height:20px;
        width:<?php echo $percentage?>%;
		background-color:#009966;
	}
	
   .row {
  display: flex;
}

/* Create three equal columns that sits next to each other */
.column {
  flex: 33.33%;
  padding: 5px;
}

.text-block1 {
  position: absolute;
  bottom:-300px;
  right: 1130px;
  color:#FFFFFF;
  background-color:#003333;  
  opacity:.7;
  width: 100px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block2 {
  position: absolute;
  bottom: -300px;
  right: 740px;
  color:#FFFFFF;
  background-color:#003333;  
  opacity:.7;
  width: 110px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block3 {
  position: absolute;
  bottom: -300px;
  right: 309px;
  color:#FFFFFF;
  background-color: #003333;  
  opacity:.7;
  width: 160px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block4 {
  position: absolute;
  bottom: -610px;
  right: 1110px;
  color:#FFFFFF;
  background-color:#003333;  
  opacity:.7;
  width: 120px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block5 {
  position: absolute;
  bottom: -610px;
  right: 680px;
  color:#FFFFFF;
  background-color:#003333;  
  opacity:.7;
  width: 170px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block6 {
  position: absolute;
  bottom: -610px;
  right: 230px;
  color:#FFFFFF;
  background-color:#003333;  
  opacity:.7;
  width: 240px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block7 {
  position: absolute;
  bottom: -920px;
  right: 1030px;
  color:#FFFFFF;
  background-color:#003333;  
  opacity:.7;
  width: 200px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block8 {
  position: absolute;
  bottom:-920px;
  right: 640px;
  color:#FFFFFF;
  background-color:#003333;  
  opacity:.7;
  width: 210px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}

.text-block9 {
  position: absolute;
  bottom: -920px;
  right: 290px;
  color:#FFFFFF;
  background-color: #003333;  
  opacity:.7;
  width: 180px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block10 {
  position: absolute;
  bottom: -1230px;
  right: 1010px;
  color:#FFFFFF;
  background-color: #003333;  
  opacity:.7;
  width: 220px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block11 {
  position: absolute;
  bottom: -1230px;
  right: 620px;
  color:#FFFFFF;
  background-color:  #003333;  
  opacity:.7;
  width: 230px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block12 {
  position: absolute;
  bottom: -1230px;
  right: 260px;
  color:#FFFFFF;
  background-color:  #003333;  
  opacity:.7;
  width: 210px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
.text-block13 {
  position: absolute;
  bottom: -1490px;
  right: 1070px;
  color:#FFFFFF;
  background-color:  #003333;  
  opacity:.7;
  width: 160px;
  height: 50px;
  padding-left: 5px;
  padding-top: 10px;
}
	</style>
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
						
						<li class="nav-item active">
							<a class="nav-link" href="vendorManager.php">Vendor Manager</a>
						</li>
                         <span class="sr-only">(current)</span>
                        <li class="nav-item">
							<a class="nav-link" href="guestList.php">Guest List</a>
						</li>
                        <li class="nav-item">
						
                       	<a class="nav-link" href="task.php">Task Management</a></li>
                        
                         <li class="nav-item">  
                         <a class="nav-link" href="messages.php">
                          <i class="fa fa-envelope-o fa-1x" style="color:#0066FF;"></i>
                          <span class="badge bg-important"><?php echo $num_rowsmsg; ?></span>
                           </a>
                           </li>
					</ul>
					<form action="../index.php" class="form-inline my-2 my-lg-0 search mx-lg-auto">
						
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Out</button>
					</form>
				</div>
			</nav>
		</header>
		<!-- //header -->
		<h1 class="inner-title-agileits-w3layouts">Vendor Manager</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="home.php">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Vendor Manager</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->
	<section class="stats py-5">
		<div class="container py-xl-5 py-sm-3">
			<h5 class="main-w3l-title text-white">You have hired <span style="color:#000000;"><strong><?php echo $num_rows1;?> </strong></span> out of <span style="color:#000000;"><strong>13</strong></span>Categories</h5>
			<div class="row stats_inner">
            <div class="progress" style="width:700px; margin-left:100px;">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">
    <?php echo $percentage?>%
  </div>
  </div>
  </div>
  </div>
  </section>
   <div class="row" style="margin-left:550px; margin-top:20px;">
  <div class="col"><a href="favourite.php" class=" btn btn-sq btn-info"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;Favourites&nbsp;<?php echo $num_rows2; ?></a>
  <a href="vendorsHired.php" class= "btn btn-sq btn-info"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;Hired&nbsp;<?php echo $num_rows1; ?></a>
  </div>     
	</div> 
<section class="contact py-5">
    
<div class="container py-xl-5 py-sm-3">
<div class="row">
  <div class="column">
  <a href="venue.php">
    <img src="images/venue.jpg" alt="venue" width="370px" height="300px">
  </a>
 <div class="text-block1">
	 <h4>Venues</h4>
  </div>
  </div>
  <div class="column">
  <a href="catering.php">
    <img src="images/catering.jpg" alt="catering" style="width:370px" height="300px">
  </a>
  <div class="text-block2">
	  <h4>Catering</h4></div>
  </div>
  <div class="column">
  <a href="photography.php">
    <img src="images/professional-photographer.jpg" alt="photography" style="width:370px" height="300px">
  </a>
	  <div class="text-block3">
		  <h4>Photography</h4></div>
  </div>
  <div class="column">
  <a href="dj.php">
    <img src="images/DJ.png" alt="DJ/Band" style="width:370px" height="300px">
  </a>
	<div class="text-block4">
		<h4>DJ/Band</h4></div>
  </div>
  <div class="column">
  <a href="weddingCar.php">
    <img src="images/wedding car.jpg" alt="wedding car" style="width:370px" height="300px">
  </a>
   <div class="text-block5">
	   <h4>Wedding car</h4></div>
  </div>
  <div class="column">
  <a href="invitation.php">
    <img src="images/Wedding-Invitation.jpg" alt="wedding invitations" style="width:370px" height="300px">
  </a>
   <div class="text-block6">
	   <h4>Wedding Invitations</h4></div>
  </div>
  <div class="column">
  <a href="healthAndBeauty.php">
    <img src="images/health and beauty.jpg"alt="health & beauty" style="width:370px" height="300px">
  </a>
	<div class="text-block7">
	   <h4>Health & Beauty</h4></div>
  </div>
  <div class="column">
  <a href="floralDecoration.php">
    <img src="images/Floral Decoration.jpg" alt="floral decoration" style="width:370px" height="300px">
  </a>
  <div class="text-block8">
	   <h4>Floral Decoration</h4></div>
  </div>
  <div class="column">
  <a href="weddingCake.php">
    <img src="images/wedding-cake.jpg" alt="wedding cake" style="width:370px" height="300px">
  </a>
   <div class="text-block9">
	   <h4>Wedding cake</h4></div>
  </div>
  <div class="column">
  <a href="bAccessories.php">
    <img src="images/bridal accessories.jpg" alt="Bridal accessories" style="width:370px" height="300px">
  </a>
	<div class="text-block10">
	   <h4>Bridal Accessories</h4></div>
  </div>
  <div class="column">
  <a href="gAcessories.php">
    <img src="images/groom-accessories-.jpg" alt="Groom accessories" style="width:370px" height="300px">
  </a>
   <div class="text-block11">
	   <h4>Groom Accessories</h4></div>
  </div>
  <div class="column">
  <a href="jewelry.php">
    <img src="images/-Bridal-Jewelry2.jpg" alt="Wedding jewellary" style="width:370px" height="300px">
  </a>
  <div class="text-block12">
	   <h4>Wedding Jewelry</h4></div>
  </div>
	<div class="column">
  <a href="videography.php">
    <img src="images/videography.jpg" alt="videography" style="width:370px" height="250px">
  </a>
  <div class="text-block13">
	   <h4>Videography</h4></div>
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