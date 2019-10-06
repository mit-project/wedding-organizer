<?php
include 'config.php';
session_start();
$email= $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Payment | Wedding organizer</title>
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
		<h1 class="inner-title-agileits-w3layouts">Payment Summary</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="budget.php">Budget</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Payment summary</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->

<section class="contact py-5">
<div class="container py-xl-5 py-sm-3">
<div class="container-fluid">
<div class="row">
                            <div class="col col-md-14">
                                <div id="result">
                                   
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Expense</th>
                                                    <th>DETAILS</th>
                                                    <th>AMOUNT</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                
                                               
                                                <?php $sql = "SELECT * FROM payment WHERE user_name='$email'";?>
                                               <?php $result = mysqli_query($conn, $sql);?>
                                               <?php //var_dump($result);die;?>
												<?php if ($result){?>
												<?php foreach($result as $key => $value){
												$date=date_create($value['Paymentdate']);
                                                $payDate = date_format($date,"M d, Y");
												
												?>
                                                
                                                
                                                <tr>
<td><?php echo $value['Expense'];?><br /><label style="font-size:16px;"><?php echo $value['Category'];?></label></td>
<td><label>Piad on&nbsp;<?php echo $payDate;?></label> <br/><label> by&nbsp;<?php echo $value['Payer'];?></label><label style="padding-left:105px;">By&nbsp;<?php echo $value['PaymentMethod'];?></td>
<td>Rs.&nbsp;<?php echo $value['Amount'];?></td>
<td><a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style=" border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a></td>
<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this payment detail?")){
		   window.location.href='deletePayment.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
                   
</tr>
<?php }?>
</tbody>
<?php }?>
</table>
</div>
   
                                    
                            </div>
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