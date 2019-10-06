<?php
include 'config.php';

if(isset($_GET['update'])){
$id=$_GET['update'];
$update=true;
$result=$conn->query("SELECT * FROM task WHERE id=$id") or die($conn->error);

$row = $result->fetch_array();
$u_name=$row['Name'];
$u_taskname=$row['Taskname'];
$u_contactno=$row['Contactno'];
$u_assigndate=$row['Assigndate'];
$u_duedate=$row['Duedate'];
$u_status=$row['Status'];
}

if(isset($_POST['btnUpdate'])){
           $id=$_POST['id'];
		   $name=$_POST['name'];
           $taskname=$_POST['Taskname'];
           $contactno=$_POST['contactNo'];
           $assigndate=$_POST['AssignDate'];
           $duedate=$_POST['DueDate'];
		   $status=$_POST['taskStatus'];
           

$conn->query("UPDATE task SET Name='$name',Taskname='$taskname',Contactno='$contactno',Assigndate='$assigndate',Duedate='$duedate',Status='$status' WHERE id=$id")             or die($conn->error);
$_SESSION['message'] ="Record has been updated";
$_SESSION['msg_type'] ="warning";
header("Refresh:2; URL=task.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit Task | Wedding organizer</title>
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
                        <li class="nav-item">
							<a class="nav-link" href="guestList.php">Guest List</a>
						</li>
                        <li class="nav-item active">
							<a class="nav-link" href="task.php">Task Management</a></li>
                            <span class="sr-only">(current)</span>
					</ul>
					<form action="../index.php" class="form-inline my-2 my-lg-0 search mx-lg-auto">
						
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Out</button>
					</form>
				</div>
			</nav>
		</header>
		<!-- //header -->
		<h1 class="inner-title-agileits-w3layouts">Update Assign Task</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="task.php">Task Management</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Edit Task</li>
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
        
<form id="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Task
        </p>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/task.jpg" alt="avatar" class="rounded-circle img-responsive" width="100px" height="100px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="name" value="<?php echo $u_name; ?> " class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      <input type="text" name="Taskname" id="Taskname" value="<?php echo $u_taskname=$row['Taskname']; ?>" class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      
      <input type="text" name="contactNo" id="contactNo" value="<?php echo $u_contactno; ?>" class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      
      <input type="date" name="AssignDate" id="AssignDate" value="<?php echo $u_assigndate; ?>" class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      
      
      <input type="date" name="DueDate" id="DueDate" value="<?php echo $u_duedate; ?>" class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      <label>Status</label><br />
<input type="radio" name="taskStatus" id="taskStatus" value="done"  <?php $row['Status'] =='done'? print "checked" :"";?> />Done &nbsp;&nbsp;&nbsp;
<input type="radio" name="taskStatus" id="taskStatus" value="pending" <?php $row['Status'] =='pending'? print "checked" :"";?> />Pending<br />
      </p>
     </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Update Task">
        
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