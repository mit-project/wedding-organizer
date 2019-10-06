<?php
include 'config.php';

if(isset($_GET['update'])){
$id=$_GET['update'];
$update=true;
$result=$conn->query("SELECT * FROM guest WHERE id=$id") or die($conn->error);

$row = $result->fetch_array();
$u_firstname=$row['firstname'];	 
$u_lastname=$row['lastname'];
$u_familySide=$row['familySide'];
$u_mobileNo=$row['mobileNo'];
$u_address=$row['Address'];
$u_status=$row['status']; 
}

if(isset($_POST['btnUpdate'])){
           $id=$_POST['id'];
           $firstname=$_POST['Fname'];
		   $lastname=$_POST['Sname'];
		   $familySide=$_POST['group'];
		   $mobileNo=$_POST['mobileNo'];
		   $address=$_POST['address'];
		   $status=$_POST['status'];

$conn->query("UPDATE guest SET firstname='$firstname',lastname='$lastname',familySide='$familySide',mobileNo='$mobileNo',Address='$address',status='$status' WHERE id=$id")             or die($conn->error);
$_SESSION['message'] ="Record has been updated";
$_SESSION['msg_type'] ="warning";
header("Refresh:2; URL=guestList.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit Guest | Wedding organizer</title>
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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css">
    <style type="text/css">
	
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
						
						<li class="nav-item">
							<a class="nav-link" href="vendorManager.php">Vendor Manager</a>
						</li>
                        <li class="nav-item active">
							<a class="nav-link" href="guestList.php">Guest List</a>
						</li>
                         <span class="sr-only">(current)</span>
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
		<h1 class="inner-title-agileits-w3layouts">Update Guest</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="guestList.php">Guest List</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Edit Guest</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->

	<section class="contact py-5">
    
		<div class="container py-xl-5 py-sm-3">
        <?php
if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
?>
</div>
<?php endif ?>
        
<form id="guest" method="post" action="">
<input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Guest
        </p>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/guest.png" alt="avatar" class="rounded-circle img-responsive" width="120px" height="120px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="Fname" id="Fname" placeholder="First Name" class="form-control"  value="<?php echo $u_firstname; ?>"style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      <input type="text" name="Sname" id="Sname" placeholder="Last Name" class="form-control" value="<?php echo $u_lastname; ?>" style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      <select name="group" id="group" class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;" required>
      <option value="" disabled selected>Choose category</option>
      <option value="Family friends of bride"<?php if($row['familySide']=="Family friends of bride"){ echo "selected";}?>>Family friends of bride</option>
      <option value="Family friends of groom"<?php if($row['familySide']=="Family friends of groom"){ echo "selected";}?>>Family friends of groom</option>
      <option value="Coworkers of bride"<?php if($row['familySide']=="Coworkers of bride"){ echo "selected";}?>>Coworkers of bride</option>
      <option value="Bride family"<?php if($row['familySide']=="Bride family"){ echo "selected";}?>>Bride family</option>
      <option value="Friends of bride"<?php if($row['familySide']=="Friends of bride"){ echo "selected";}?>>Friends of bride</option>
      <option value="Coworkers of groom"<?php if($row['familySide']=="Coworkers of groom"){ echo "selected";}?>>Coworkers of groom</option>
      <option value="Groom family"<?php if($row['familySide']=="Groom family"){ echo "selected";}?>>Groom family</option>
      <option value="Friends of groom"<?php if($row['familySide']=="Friends of groom"){ echo "selected";}?>>Friends of groom</option>
      <option value="Mutual friends"<?php if($row['familySide']=="Mutual friends"){ echo "selected";}?>>Mutual friends</option>
      </select>
      <br>
      
      <input type="text" name="mobileNo" id="mobileNo" placeholder="Mobile Number" class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;" value="<?php echo $u_mobileNo; ?>"><br>
      
      <input type="text" name="address" id="address" placeholder="Address" class="form-control" value="<?php echo $u_address; ?>"style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      

<label>Status</label><br />
<input type="radio" name="status" id="status" value="attending" <?php $row['status'] =='attending'? print "checked" :"";?> />Attending &nbsp;&nbsp;&nbsp;
<input type="radio" name="status" id="status" value="pending" <?php $row['status'] =='pending'? print "checked" :"";?> />Pending &nbsp;&nbsp;&nbsp;
<input type="radio" name="status" id="status" value="declined" <?php $row['status'] =='declined'? print "checked" :"";?> />Declined &nbsp;&nbsp;&nbsp;
      </p>
     </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Update Guest">
        
      </div>
    </div>
  </div>
  </form>
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