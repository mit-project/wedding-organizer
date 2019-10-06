<?php
include 'config.php';
session_start();
$email= $_SESSION['email'];
if(isset($_GET['deal'])){
$id=$_GET['deal'];

$result=$conn->query("SELECT * FROM deal WHERE vendor_id=$id") or die($conn->error);
$row = $result->fetch_array();

$result1=$conn->query("SELECT * FROM user_details WHERE email='$email'") or die($conn->error);
$row1 = $result1->fetch_array();

$result2=$conn->query("SELECT profileImage,address FROM vendor_registration WHERE id=$id") or die($conn->error);
$row2 = $result2->fetch_array();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Promotions | Wedding organizer</title>
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
	
    <script type="text/javascript" src="html2canvas/dist/html2canvas.js"></script>
<script type="text/javascript" src="jsPDF-1.3.2/dist/jspdf.min.js"></script>
<script type="text/javascript">
function genPDF(){
html2canvas(document.body).then(function(canvas) {
                var img = canvas.toDataURL('image/png');
                var doc = new jsPDF();
                doc.addImage(img, 'JPEG', 0, 0);
                doc.save('deal.pdf');
            });
}
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
						
						<li class="nav-item active">
							<a class="nav-link" href="vendorManager.php">Vendor Manager</a>
                            <span class="sr-only">(current)</span>
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
		<h2 style="padding-left:500px; padding-top:160px; color:#003333;">Deals/Discounts</h2>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="vendorManager.php">Vendor Manager</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Get Deal</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->

			
<div style="padding-left:900px; padding-top:10px;"><a href="Javascript:genPDF()">DOWNLOAD</a></div>
<div id="getPromotion">


 <div class="d-sm-flex main-story">
				<div class="col-lg-7 story-info">
                <div class="col-lg-5">
                <span class="styory-date">Name:&nbsp;<?php echo $row1['fname'];?> &nbsp;<?php echo $row1['lname'];?></span>
                <span class="styory-date">Email:&nbsp;<?php echo $row1['email'];?></span>
                  <img src="<?php echo 'uploads/'.$row2['profileImage'] ;?>" width="500px" height="300px" style="border-radius:25px;">
				</div>
                <br>
                <h3 class="subheading-wthree mb-3"><?php echo $row['discount'];?> for wedding organizer couples</h3>
					<p class="paragraph-agileinfo">If you found us on WeddingOrganizer we will give you a <?php echo $row['discount'];?>&nbsp;                    discount on our services. 
                     <div>Remember to show us your voucher when you come see us.</div><br /></p>
                    
                    <span class="styory-date">Address:&nbsp;</span> <div><?php echo $row2['address']?></div>
				</div>
                
                </div>
</div>
</body>

</html>