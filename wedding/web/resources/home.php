<?php
session_start();
include 'getWeddingDetailse.php';
include 'config.php';
$email= $_SESSION['email'];

$sqlmsg="SELECT COUNT(id) AS totalmsg FROM reply WHERE receiverMail='$email'";
$resultmsg=mysqli_query($conn,$sqlmsg);
$valuesmsg=mysqli_fetch_assoc($resultmsg);
$num_rowsmsg=$valuesmsg['totalmsg'];

$sqlp="SELECT COUNT(id) AS taskPending FROM checklist WHERE (user_name='$email' OR user_name='admin') AND status='Pending'";
$resultp=mysqli_query($conn,$sqlp);
$valuesp=mysqli_fetch_assoc($resultp);
$num_rowsp=$valuesp['taskPending'];

$sqle="SELECT SUM(Estimatedcost) AS estimate FROM budget WHERE user_name='$email'";
$resulte=mysqli_query($conn,$sqle);
$valuese=mysqli_fetch_assoc($resulte);
$num_rowse=$valuese['estimate'];

$sql1="SELECT SUM(Finalcost) AS totalcost FROM budget WHERE user_name='$email'";
$result1=mysqli_query($conn,$sql1);
$values=mysqli_fetch_assoc($result1);
$num_rows1=$values['totalcost'];

$sql2="SELECT COUNT(id) AS totalAttending FROM guest WHERE user_name='$email' AND status='attending'";
$result2=mysqli_query($conn,$sql2);
$values2=mysqli_fetch_assoc($result2);
$num_rows2=$values2['totalAttending'];

$sql3="SELECT COUNT(id) AS totalTaskassign FROM task WHERE user_name='$email'";
$result3=mysqli_query($conn,$sql3);
$values3=mysqli_fetch_assoc($result3);
$num_rows3=$values3['totalTaskassign'];

if(isset($_POST['but1'])){
$email = $_SESSION['email'];
$groomName = $_POST['groomName'];
$brideName = $_POST['brideName'];

$weddingdate = $_POST['wdate'];
$homecomingdate = $_POST['bdate'];
$phonenumber = $_POST['number'];
$date = date("dd-mm-yyyy");

$sql1 = "INSERT INTO wedding_details (user_name, groomName, brideName,weddingdate,homecomingdate,phonenumber)
VALUES ('$email', '$groomName', '$brideName','$weddingdate','$homecomingdate','$phonenumber')";

if ($conn->query($sql1) === TRUE) {
    header("location: home.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home | Wedding organizer </title>
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
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!--// Style-sheets -->
	<!--web-fonts-->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!--//web-fonts-->
    
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
function validateForm(){
var date = document.getElementById("wdate").value;
var HCdate = document.getElementById("bdate").value;
var phone = document.getElementById("number").value;

var cDate = new Date(date); //dd-mm-YYYY
var HCDate = new Date(HCdate);
var today = new Date();
today.setDate( today.getDate() + 21 );



if (cDate.setHours(0,0,0,0)<=today.setHours(0,0,0,0)){
alert("Please insert the wedding date that must be atleast 3 weeks ahead");
return false;
}
else if (HCDate.setHours(0,0,0,0)<=cDate.setHours(0,0,0,0)){
alert("Home coming date cannot before wedding date");
return false;
}
else if(!phone.match(/^\d{10}/)){
alert("Please enter valid phone number");
return false;
}
}
</script>

 
</head>

<body>
	<!-- banner -->
	<div class="banner" id="home">
		<!-- header -->
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="../index.html">Wedding organizer</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="../index.html">Home
								<span class="sr-only">(current)</span></a></li>
						<li class="nav-item">
							<a class="nav-link" href="checklist.php">Checklist</a></li>
						<li class="nav-item">
							<a class="nav-link" href="budget.php">Budget</a>	</li>
						<li class="nav-item">
							<a class="nav-link" href="vendorManager.php">Vendor Manager</a></li>
                        <li class="nav-item">
							<a class="nav-link" href="guestList.php">Guest List</a></li>
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
		<div class="container">
			<!-- banner-text -->
			<div class="banner-text">
				<div class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
                         
                          <?php if ($result) { ?>
                            <?php $row = mysqli_fetch_array($result);
							$date=date_create($row['weddingdate']);
                             $weddingDate = date_format($date,"M d, Y");
							 ?>
							<div class="slider-info">
								<h3 style="padding-left:100px;"><?php echo $row['brideName'] ?> weds <?php echo $row['groomName'] ?> </h3>
								<p style="padding-left:700px;">Wedding Date: <?php echo $weddingDate; ?></p>
                                <?php
                        } else {
                            echo 'query error';
                        }
                        ?>
								<h3 class="text-right mt-lg-0 mt-md-3 mt-sm-4 mt-3">Save the Date</h3>
														</div>
						</li>
						
					</ul>
				</div>
		  </div>
		</div>
	</div>
	<!-- //banner -->
	<!--about-->
	<section class="about-section py-5" id="about">
		<div class="container py-xl-5 py-sm-3">
			<h5 class="main-w3l-title mb-sm-3 mb-2">About Us</h5>
			<div class="about-top">
				<h3 class="subheading-wthree mb-3">Something About Us</h3>
				<p class="paragraph-agileinfo">Before two hearts unite in celebration, a lot goes into preparations. Before the love is declared in public, there are many defining moments of choosing and picking. wedding organizer is one of the reputed wedding planning website that will create the dream wedding you have always wished for, without a single detail missing.
				</p>
			</div>
			<div class="about-main row d-lg-flex justify-content-around">
				<div class="col-lg-6 about-w3-left">
					<div class="about-img">
					</div>
					<div class="about-bottom">
				
					</div>
				</div>

				<div class="col-lg-6 about-w3ls-right">
					<h3 class="subheading-wthree mb-3">Your wedding planning adventure</h3>
					<ul class="list-group">
						<li class="list-group-item active text-white">Checklist</li>
						<li class="list-group-item">
							<i class="fas fa-share"></i>Checklist has everything you need to include on your wedding</li>
						
						<li class="list-group-item active text-white">Budget</li>
						<li class="list-group-item">
				<i class="fas fa-share"></i>Set your wedding expenses and we’ll add them up to break down your estimates and total spent.</li>
						
						<li class="list-group-item active text-white">Guest List</li>
						<li class="list-group-item">
							<i class="fas fa-share"></i>Build your wedding guest list and easily keep track of guest attendance.</li>
						
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--//about-->
	<!-- services -->
	<section class="services-section">
		<div class="container-fluid">
			<div class="services-grids row">
				<div class="col-lg-6 services-img1"></div>
				<div class="col-lg-6 services-info top-services p-xl-5 p-4">
					<h5 class="main-w3l-title mb-sm-3 mb-2">Services</h5>
					<h3 class="subheading-wthree mb-3">Everything You Need to Start</h3>

					<p class="paragraph-agileinfo">We offer great variety of services & programs. Our clients and our experience proves that the following services can
						literally change your life!</p>
					<ul>
						<li class="mt-sm-4 mt-3">
							<span class="fas fa-check" aria-hidden="true"></span>Wedding Venues</li>
						<li class="mt-sm-4 mt-3">
							<span class="fas fa-check" aria-hidden="true"></span>Wedding Decoration</li>
						<li class="mt-sm-4 mt-3">
							<span class="fas fa-check" aria-hidden="true"></span>Florist Services</li>
						<li class="mt-sm-4 mt-3">
							<span class="fas fa-check" aria-hidden="true"></span>Bridal Accessories</li>
						<li class="mt-sm-4 mt-3">
							<span class="fas fa-check" aria-hidden="true"></span>Catering Services</li>
						<li class="mt-sm-4 mt-3">
							<span class="fas fa-check" aria-hidden="true"></span>Wedding Invitations & more</li>
					</ul>
				</div>
			</div>
			<div class="services-grids row">
				<div class="col-lg-6 services-info bottom-services  p-xl-5 p-4">
					<h5 class="main-w3l-title mb-sm-3 mb-2">Summary</h5>
					
					<div class="serv-inner1 d-md-flex justify-content-around">
						<div class="col-md-6 serv-left">
							<h6>
								<span>C</span>hecklist
								</h6>
							<p class="paragraph-agileinfo text-white"><?php echo $num_rowsp; ?> Checklist to do <br>
                            <a href="checklist.php" class="btn btn-info">Add Tasks</a>
							</p>
						</div>
						<div class="col-md-6 serv-right">
							<h6>
								<span>B</span>udget
								</h6>
							<p class="paragraph-agileinfo text-white">
                            <span>Estimated Cost:&nbsp;Rs. <?php echo $num_rowse;?></span><br>
                            <span>Final Cost:&nbsp;Rs. <?php echo $num_rows1;?></span><br>
                            <a href="budget.php" class="btn btn-info">Manage Expenses</a>
							</p>
						</div>
					</div>
					<div class="serv-inner2 d-md-flex">
						<div class="col-md-6 serv-left">
							<h6>
								<span>G</span>uest
								<span>L</span>ist</h6>
							<p class="paragraph-agileinfo text-white">
                            <?php echo $num_rows2;?> Guest attending for your wedding<br>
                            <a href="guestList.php" class="btn btn-info">Add Guest </a>
							</p>
						</div>
						<div class="col-md-6 serv-right">
							<h6>
								<span>T</span>ask
								<span>M</span>anagement</h6>
							<p class="paragraph-agileinfo text-white"> 
                            <?php echo $num_rows3;?> Task assinged <br>
                            <a href="task.php" class="btn btn-info">Assign Tasks </a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 services-img2"></div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#CC9966;">
                        
                        <h4 class="modal-title text-white">Wedding Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" name="wed" onSubmit="return validateForm()">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Groom Name:</label>
                                <input type="text" name="groomName" class="form-control" id="groomName" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Bride Name:</label>
                                <input type="text" name="brideName" class="form-control" id="brideName" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Date of Wedding:</label>
                                <input type="date" name="wdate" class="form-control" id="wdate" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Date of HomeComing</label>
                                <input type="date" name="bdate" class="form-control" id="bdate" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Phone Number</label>
                                <input type="pnumber" name="number" class="form-control" id="number">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="but1" id="but1">Create</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

        </div>

									

	<!-- Testimonials -->

	<!-- Footer -->
	
	<!-- copyright -->
	<div class="copyright-w3layouts">
		<div class="container">
			<p class="py-xl-4 py-3">© 2019 Wedding organizer . All Rights Reserved | Design by Hiruni Chandrasiri
				
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- Required common Js -->
	<script src='../js/jquery-2.2.3.min.js'></script>
	<!-- //Required common Js -->
	<!-- stats -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<script src="../js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- Responsiveslides -->
	<script src="../js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- // Responsiveslides -->
	<!-- flexSlider -->
	<script defer src="../js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>

	<!-- //flexSlider -->

	<!-- start-smoth-scrolling -->
	<script src="../js/move-top.js"></script>
	<script src="../js/easing.js"></script>
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
	<!-- Js for bootstrap working-->
	<script src="../js/bootstrap.min.js"></script>
	<!-- //Js for bootstrap working -->
    <script type="text/javascript">
       
<?php
$email = $_SESSION['email'];

$sql = "SELECT * FROM wedding_details WHERE user_name='$email'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
$count = mysqli_num_rows($result);

if (!$count >= 1) {
    ?>

            $(document).ready(function () {
                $("#myModal").modal();
            });
<?php } ?>
    </script>
   
</body>
</html>