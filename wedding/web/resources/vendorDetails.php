<?php
include 'config.php';
session_start();
$email= $_SESSION['email'];
if (isset($_GET['view'])){
$id = $_GET['view'];
$result=$conn->query("SELECT * FROM  vendor_registration WHERE id=$id") or die($conn->error);
$row = $result->fetch_array();
}
?>
<?php
$result4=$conn->query("SELECT * FROM  wedding_details WHERE user_name='$email'") or die($conn->error);
$row4 = $result4->fetch_array();

$result5=$conn->query("SELECT * FROM  user_details WHERE email='$email'") or die($conn->error);
$row5 = $result5->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $row['businessName'];?>&nbsp;|&nbsp;<?php echo $row['category'];?></title>
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
    
    <script src="fancybox/jquery.fancybox.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 
    <link  href="/path/to/jquery.fancybox.min.css" rel="stylesheet">
   <script src="/path/to/jquery.fancybox.min.js"></script>

<script>
$("[data-fancybox]").fancybox();
</script>  
    

<style type="text/css">
@import url('http://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
 
   *, *:before, *:after {margin: 0; padding: 0; box-sizing: border-box;}
   body {background: #fff; color:#006666; font: 14px 'Open Sans', calibri;}

h1 {padding: 100px 0; font-weight: 400; text-align: center;}
   p {margin: 0 0 20px; line-height: 1.5;}
 
   .main {margin:; min-width: 320px; max-width: 800px;}
   .content {background: #fff; color: #373737;}
   .content > div {display: none; padding: 20px 0px 10px;}
 
   input {display: none;}
   label {display: inline-block; padding: 15px 25px; font-weight: 600; text-align: center;}
   label:hover {color:#333333; cursor: pointer;}
   input:checked + label {background: #ed5a6a; color: #fff;}
 
   #tab1:checked ~ .content #content1,
   #tab2:checked ~ .content #content2,
   #tab3:checked ~ .content #content3,
   #tab4:checked ~ .content #content4,
   #tab5:checked ~ .content #content5,
   #tab6:checked ~ .content #content6,
   #tab7:checked ~ .content #content7
   {
     display: block;
   }
 
   @media screen and (max-width: 400px) { label {padding: 15px 10px;} }
   
section{ 
     width:30%;
	 float:right;
	 padding:10px;
   
}
main{
    width:70%;
	float:right;
	padding:0px;
	}
.style1 {font-family: Arial, Helvetica, sans-serif}

.gallery img{
        width:20%;
		height:auto;
		border-radius: 5px;
		cursor:pointer;
		transition: .3s;    
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
		<h2 style="padding-left:550px; padding-top:160px; color:#003333;"><?php echo $row['businessName']; ?></h2>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="vendorManager.php">Vendor Manager</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Vendor Details</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->
	<!-- contact -->
    
		
<img src="<?php echo 'uploads/'.$row['profileImage'];?>" class="img-fluid" alt="Responsive image" style="width:1350px; height:300px;">
<div style="padding-top:20px; padding-left:90px; font-size:16px; color:#000000;">

<?php
if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>" style="width:500px;">
<?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
?>
</div>
<?php endif ?>

<span style="color:#000066; font-size:22px;"><?php echo $row['businessName']; ?></span>
<div>
<?php
$resultS=$conn->query("SELECT * FROM favourite WHERE vendor_id=$id AND user_name='$email'") or die($conn->error);
if($resultS->num_rows==0){ ?>
<form action="" method="post" enctype="multipart/form-data" id="form1">
<input type="hidden" name="businessName" id="businessName" value="<?php echo $row['businessName']; ?>" required>
<input type="hidden" name="contactPerson" id="contactPerson" value="<?php echo $row['Name']; ?>" required>
<input type="hidden" name="contactNo" id="contactNo" value="<?php echo $row['contactno']; ?>" required>
<input type="hidden" name="category" id="category" value="<?php echo $row['category']; ?>" required>
<input type="hidden" name="city" id="city" value="<?php echo $row['city']; ?>" required>
<input type="hidden" name="image" id="image" value="<?php echo $row['profileImage']; ?>" required>
<input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo $row['id']; ?>" required>
<button class="btn btn-info" name="save" style="background-color:#FFFFFF; color:#000000; margin-left:1000px;" id="save" type="submit">
<i class="fa fa-heart" aria-hidden="true" style="color:#FF0033;"></i>&nbsp;Save</button>
</form>

<?php } ?>
<script>
        $(document).ready(function(){  
           $('#form1').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"addFavourite.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#msg")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
    </div>
<div>
<?php
$resultS=$conn->query("SELECT * FROM hired_vendors WHERE vendor_id=$id AND user_name='$email'") or die($conn->error);
if($resultS->num_rows==0){
$rowS = $resultS->fetch_array();
?>
<form name="form2" action="" method="post" enctype="multipart/form-data" id="form2">
<input type="hidden" name="businessName" id="businessName" value="<?php echo $row['businessName']; ?>" required>
<input type="hidden" name="contactPerson" id="contactPerson" value="<?php echo $row['Name']; ?>" required>
<input type="hidden" name="contactNo" id="contactNo" value="<?php echo $row['contactno']; ?>" required>
<input type="hidden" name="category" id="category" value="<?php echo $row['category']; ?>" required>
<input type="hidden" name="city" id="city" value="<?php echo $row['city']; ?>" required>
<input type="hidden" name="image" id="image" value="<?php echo $row['profileImage']; ?>" required>
<input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo $row['id']; ?>" required>
<input type="hidden" name="vendorMail" id="vendorMail" value="<?php echo $row['email']; ?>" required>
<input type="hidden" name="fname" id="fname" value="<?php echo $row5['fname']; ?>" required>
<input type="hidden" name="lname" id="lname" value="<?php echo $row5['lname']; ?>" required>
<input type="hidden" name="phoneNo" id="phoneNo" value="<?php echo $row4['phonenumber']; ?>" required>


<button name="hire" class="btn btn-info" style="background-color:#FFFFFF; color:#000000; margin-left:1000px; margin-top:5px;" id="hire" type="submit">
<i class="fa fa-handshake" aria-hidden="true"></i>&nbsp;Hired?</button>&nbsp;&nbsp;
</form>
<?php } ?>
<script>
        $(document).ready(function(){  
           $('#form2').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"hireVendor.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#form2")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
</div>
<?php
$resultSS=$conn->query("SELECT * FROM favourite WHERE vendor_id=$id AND user_name='$email'") or die($conn->error);
if($resultSS->num_rows>0){
$rowSS = $resultSS->fetch_array();
?>
<a href="favourite.php" class="btn btn-info" name="saved" style="background-color:#FFFFFF; color:#000000; margin-left:1000px;" id="saved" type="submit">
<i class="fa fa-heart" aria-hidden="true" style="color:#FF0033;"></i>&nbsp;Saved</a>&nbsp;&nbsp;
<?php } ?>

<?php
$resultS=$conn->query("SELECT * FROM hired_vendors WHERE vendor_id=$id AND user_name='$email'") or die($conn->error);
if($resultS->num_rows>0){
$rowS = $resultS->fetch_array();
?>
<a href="vendorsHired.php" name="hired" class="btn btn-info" style="background-color:#FFFFFF; color:#000000;" id="hired" type="submit">
<i class="fa fa-handshake" aria-hidden="true"></i>&nbsp;Hired</a>&nbsp;&nbsp;
<?php } ?>
<br>

<span><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $row['address']; ?></span><br>
<span><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<?php echo $row['contactno']; ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;<?php echo $row['mobileNo']; ?></span><br>
<span><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;<?php echo $row['email']; ?></span><br>
<a href="<?php echo $row['website'];?>/" target="_blank" style="color:#000000;"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;<?php echo $row['website'];?></a>

</div>
<div style="padding-left:90px; font-size:16px; color:#000000;">
<?php
$email = $_SESSION['email'];
$sqlR="SELECT COUNT(rating_id) AS totalReviews FROM reviews WHERE vendor_id=$id";
$resultR=mysqli_query($conn,$sqlR);
$valuesR=mysqli_fetch_assoc($resultR);
$num_rowsR=$valuesR['totalReviews'];

$ratingDetails = "SELECT ratingNumber FROM reviews WHERE vendor_id=$id";
$rateResult = mysqli_query($conn, $ratingDetails) or die("database error:". mysqli_error($conn));
$ratingNumber = 0;
$count = 0;
$fiveStarRating = 0;
$fourStarRating = 0;
$threeStarRating = 0;
$twoStarRating = 0;
$oneStarRating = 0;
while($rate = mysqli_fetch_assoc($rateResult)){
      $ratingNumber+= $rate['ratingNumber'];
	  $count += 1;
	  if($rate['ratingNumber'] ==5){
	          $fiveStarRating +=1;
	  } else if($rate['ratingNumber'] ==4){
	          $fourStarRating +=1;		  
      } else if($rate['ratingNumber'] ==3){
              $threeStarRating +=1;
       } else if($rate['ratingNumber'] ==2){
                $twoStarRating +=1;
       } else if($rate['ratingNumber'] ==1){
           $oneStarRating +=1;
		   }
		   }
 
  $average = 0;
  if($ratingNumber && $count){
  $average = $ratingNumber/$count;
  }
?> 
<br>
<div id="ratingDetails">
<div class="row">
<div class="col-sm-3">
<span style="color:#003366;"><?php echo $num_rowsR; ?>&nbsp; Reviews</span><br>
<?php
$averageRating = round($average,0);
$img="";
$i=1;
while($i<=$averageRating){
$img=$img."<img src=images/star.gif>";
$i=$i+1;
}
while($i<=5){
$i=$i+1;
}
echo $img;

?>

<br>
<span class="bold padding-bottom-7" style="color:#CC0000;"><strong><?php printf('%.1f',$average)?>&nbsp;out of 5.0</strong></span>
</div>
</div>    
<hr>    
<section class="contact py-5">
<h5 class="main-w3l-title">Contact Vendor</h5>
<div class="container" style="display:block; border:groove; width:350px; margin-bottom:10px;">

<br />
<form id="msg" action="" method="post">
<input type="hidden" name="vendorMail" id="vendorMail" class="form-control" value="<?php echo $row['email'];?>"  required/>
<input type="hidden" name="vendor_id" id="vendor_id" class="form-control" value="<?php echo $row['id'];?>"  required/>
<input type="hidden" name="receiverName" id="receiverName" class="form-control" value="<?php echo $row['businessName'];?>"  required/>
<input type="hidden" name="Name" id="Name" class="form-control" value="<?php echo $row['Name'];?>"  required/>

<span style="color:#333333; font-weight:bold;">SENDER NAME</span>
<label>&nbsp;</label>
<div class="form-group">
<input type="text" name="name" id="name" class="form-control" value="<?php echo $row5['fname'];?>"  style="border:none; border-bottom: 2px solid #006666;" required/>
</div>
<span style="color:#333333; font-weight:bold;">EMAIL</san>
<label>&nbsp;</label>
<div class="form-group">
<input type="text" name="email" id="email" class="form-control" value="<?php echo $row4['user_name'];?>" style="border:none; border-bottom: 2px solid #006666;" required/>
</div>
<span>PHONE NUMBER</san>
<label>&nbsp;</label>
<div class="form-group">
<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $row4['phonenumber'];?>" required style="border:none; border-bottom: 2px solid #006666;" />
</div> 
<span>WEDDING DATE</san>
<label>&nbsp;</label>
<div class="form-group">
<input type="date" name="date" id="date" class="form-control" value="<?php echo $row4['weddingdate'];?>" style="border:none; border-bottom: 2px solid #006666;" required/>
</div>

<span>MESSAGE (Write only message)</span>
<label>&nbsp;</label>
<br />
<textarea name="message" id="message" cols="37" rows="8" required>
</textarea>

<span>Contact via</span>
<label>&nbsp;</label>
<br />
<div class="form-group">
<select name="contact" id="contact" class="form-control" style="border:none; border-bottom: 2px solid #006666;">
<option value="" disabled selected>Choose category</option>
<option value="Email">Email</option>
<option value="Phone">Phone</option>
</select>
</div>
<br />
<br />
<input type="submit" class="btn btn-info" name="save" id="save" value="Submit" style="display:block; width:300px;" />
<br />
<label>&nbsp;</label>
</form>
</div>
<script>
        $(document).ready(function(){  
           $('#msg').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"sentMessage.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#msg")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
</section>        


<main role="main">
<br>
<br>

<input id="tab1" type="radio" name="tabs" checked>
 <label for="tab1">About</label>
	
		  <input id="tab2" type="radio" name="tabs">
		  <label for="tab2">Photos</label>
	
		  <input id="tab3" type="radio" name="tabs">
		  <label for="tab3">Videos</label>
	
		  <input id="tab4" type="radio" name="tabs">
		  <label for="tab4">Deals</label>
          
          <input id="tab5" type="radio" name="tabs">
		  <label for="tab5">Pricing</label>
          
          <input id="tab6" type="radio" name="tabs">
		  <label for="tab6">Events</label>
          
          <input id="tab7" type="radio" name="tabs">
		  <label for="tab7">Reviews</label>
          
	
		  <div class="content">  
			  <div id="content1">
              <h5>About <?php echo $row['businessName'];?></h5>
              <hr>
				<p><?php echo $row['description'];?></p>
                <br>
                <?php
                $result16=$conn->query("SELECT * FROM  socialmedia WHERE vendor_id=$id ") or die($conn->error);
                if($result16->num_rows>0){
                 while($row16 = $result16->fetch_array()){
?>
<div class ="row">
<div style="padding-left:20px;">Follow <?php echo $row['businessName'];?> on &nbsp;<a href="<?php echo $row16['facebook'];?>" target="_blank"><img src="images/facebook1.png" width="30px" height="30px" class="avatar"></a>&nbsp;<a href="<?php echo $row16['instagram'];?>" target="_blank"><img src="images/instagram.png" width="30px" height="30px" class="avatar">&nbsp;<a href="<?php echo $row16['twitter'];?>" target="_blank"><img src="images/twitter.png" width="30px" height="30px" class="avatar">&nbsp;<a href="<?php echo $row16['youtube'];?>" target="_blank"><img src="images/youtube-icon.png" width="30px" height="30px" class="avatar"></div>
</div>
<?php } ?>
<?php } ?>
			  </div>
	
			  <div id="content2">
              <h5>Photos</h5>
              <hr>
				<p>
                <?php
              $result6=$conn->query("SELECT * FROM  photos WHERE vendor_id=$id") or die($conn->error);
              while($row6 = $result6->fetch_array()){
              $imageThumburl='photos/thumb/'.$row6['photo'];
               $imageurl='photos/'.$row6['photo'];
                ?>
				<a href="<?php echo $imageurl;?>" data-fancybox="gallery" data-caption="<?php echo $row6['title'];?>">
                <div class="container" style="display:inline-block; width:100px;">
                 <img src="<?php echo $imageThumburl ;?>" width="100px" height="100px" id="myImg"  />
                </div>
                </a>
                <?php } ?>
				</p>
				
			  </div>
	
			  <div id="content3">
              <h5>Videos</h5>
              <hr>
				<p>
                <?php
             $result7=$conn->query("SELECT * FROM  videos WHERE vendor_id=$id") or die($conn->error);
             if($result7->num_rows>0){
             while($row7 = $result7->fetch_array()){
             ?>
				<div class="grid_info second" style="width:350px; background-color:#0099CC;">
                <div class="icon_info text-left p-4">
                <iframe src="<?php echo 'uploads/'.$row7['video'];?>?autoplay=0" width="300px" height="150px" ></iframe>
                <span style="color:#FF6633;"><strong><?php echo $row7['Title'];?></strong></span><br>
                <span><?php echo $row7['Description'];?></span><br>
                </div>
                </div>
                <?php }
				} 
				?>
                
                 <?php
             $result7=$conn->query("SELECT * FROM  videos WHERE vendor_id=$id") or die($conn->error);
             if($result7->num_rows===0){
             
             ?>
             <span>No videos added by the vendor</span>
             <?php } ?>
				</p>
				
			  </div>
              
              <div id="content4">
              <h5>Wedding Deals and Discounts</h5>
              <hr>
              <p>
              <?php
              $result9=$conn->query("SELECT * FROM  deal WHERE vendor_id=$id") or die($conn->error);
              if($result9->num_rows>0){
               while($row9 = $result9->fetch_array()){
                ?>
               <div class="d-sm-flex main-story">
				<div class="col-lg-7 story-info">
                <h3 class="subheading-wthree mb-3"><?php echo $row9['discount'];?>&nbsp;discount for weddingOrganizer couples</h3>
					<p class="paragraph-agileinfo">If you found us on WeddingOrganizer we will give you a <?php echo $row9['discount'];?>&nbsp;                      discount on our services. Remember to show us your voucher when you come see us.</p>
                    <h4 class="story-names"><a href="deal.php?deal=<?php echo $row['id']; ?>" style="color:#996699;">Get Deal</a></h4>
                    <span class="styory-date">Permanent Promotion</span>
				</div>
                <div class="col-lg-5">
                  <img src="<?php echo 'uploads/'.$row['profileImage'] ;?>" width="300px" height="300px" style="border-radius:25px;">
				</div>
                </div>
                <?php }
				}
				?>
                
                <?php
              $result9=$conn->query("SELECT * FROM  deal WHERE vendor_id=$id") or die($conn->error);
              if($result9->num_rows===0){
               
                ?>
                <span>There are no discounts offered by the vendor</span>
                <?php } ?>
                <br>
                <br>
                <?php
                $result10=$conn->query("SELECT * FROM  new_deal WHERE vendor_id=$id") or die($conn->error);
                if($result10->num_rows>0){
                while($row10 = $result10->fetch_array()){
                 ?>
                <h5>Other Deals </h5>
                <br>
                <div class="d-lg-flex main-story">
				<div class="col-lg-7 story-info">
					<h4 class="story-names"><?php echo $row10['dealName'];?></h4>
					<p class="paragraph-agileinfo"><?php echo $row10['dealDescription'];?></p>
                    <span class="styory-date">Valid Until:&nbsp;<?php echo $row10['validUntil'];?></span>
                    <h3 class="subheading-wthree mb-3"><a href="promotion.php?promo=<?php echo $row['id']; ?>">Get Deal</a></h3>
				</div>
				<div class="col-lg-5">
               <img src="<?php echo 'uploads/'.$row10['image'] ;?>" width="300px" height="300px" style="border-radius:25px;">
				</div>
			</div>
            <?php }
			}
			?>
			
              </p>
              </div>
              


              <div id="content5">
              <h5>Pricing</h5>
              <hr>
              <p>
              <?php
             $result11=$conn->query("SELECT * FROM  pricing WHERE vendor_id=$id") or die($conn->error);
             if($result11->num_rows>0){
             while($row11 = $result11->fetch_array()){
             ?>
             <label style="font-size:18px; font-weight:bold;"><?php echo $row['businessName'];?>&nbsp;Pricing</label>
             <div class="grid_info second" style="width:400px;">
             <div class="icon_info text-left p-4">
             <div style="font-size:24px;"><?php echo $row['businessName'];?>&nbsp;Price Rates</div>
             <div>
            <a href="<?php echo 'uploads/'.$row11['filename'];?>" target="_blank" style="font-weight:bold; font-size:16px;">View Pricing</a>
            </div>
             </div>
             </div>
             <?php }
			 }
			 ?>
             
             <?php
             $result11=$conn->query("SELECT * FROM  pricing WHERE vendor_id=$id") or die($conn->error);
             if($result11->num_rows===0){
             
             ?>
             <span>No price rates added by the vendor</span>
             <?php }
			 ?>
              </p>
              </div>

             <div id="content6">
              <h5>Upcoming Events</h5>
              <hr>
              <p>
              <?php
              $result15=$conn->query("SELECT * FROM  event WHERE vendor_id=$id") or die($conn->error);
              if($result15->num_rows>0){
              while($row15 = $result15->fetch_array()){
			  $date=date_create($row15['StartDate']);
              $startDate = date_format($date,"M d, Y");
			  $date1=date_create($row15['EndDate']);
              $endDate = date_format($date1,"M d, Y");
              ?>
              <div class="d-lg-flex main-story">
				<div class="col-lg-7 story-info">
					<h4 class="story-names"><?php echo $row15['EventName'];?></h4>
					
					<p class="paragraph-agileinfo"><?php echo $row15['EventDescription'];?></p>
                    <span class="styory-date"><strong>Address:&nbsp;</strong></span>
                    <p class="paragraph-agileinfo"><?php echo $row15['Address'];?></p>
				</div>
				<div class="col-lg-5" style="padding-top:80px;">
                <span class="styory-date"><strong>Start :</strong> <?php echo $startDate;?> at <?php echo $row15['StartTime'];?></span>
                <span class="styory-date"><strong>End :</strong> <?php echo $endDate;?> at <?php echo $row15['EndTime'];?></span>
                                
				</div>
			</div>
		
        <?php
		}
		}
		?>
        
        <?php
              $result15=$conn->query("SELECT * FROM  event WHERE vendor_id=$id") or die($conn->error);
              if($result15->num_rows===0){
              ?>
              <span>There are no upcoming events</span>
              <?php } ?>
              </p>
              </div>
 
            <div id="content7">
              <h5>User Reviews</h5>
              <hr>
				<p>
                <span style="color:#003333; font-weight:bold; font-size:18px;">
				<?php echo $num_rowsR;?>&nbsp;Reviews for <?php echo $row['businessName'];?>
  <a href="review.php?rate=<?php echo $row['id']; ?>" id="rateProduct" class="btn btn-info" style="width:130px; height:40px; margin-left:450px;">Write a Review</a>
                </span>
<?php
$ratinguery =$conn->query("SELECT rating_id, vendor_id, username,Name, ratingNumber, title, comment, created, modified FROM reviews WHERE vendor_id=$id") or die($conn->error);
if($ratinguery->num_rows>0){
while($rating = $ratinguery->fetch_array()){
$date=date_create($rating['created']);
$reviewDate = date_format($date,"M d, Y");
?>
<div class="row">
<div class="col">

<img src="images/user_icon.png" class="avatar" width="100px" height="100px" >
<div class="review-block-name">By <?php echo $rating['Name'];?></div>
<div class="review-block-date"><?php echo $reviewDate; ?></div>
</div>
<div class="col-sm-10">
<div class="review-block-rate">
<?php
$averageRating = round($average,0);
$img="";
$i=1;
while($i<=$averageRating){
$img=$img."<img src=images/star.gif>";
$i=$i+1;
}
while($i<=5){
$i=$i+1;
}
echo $img;
?>

</div>
<div class="review-block-title"><strong><?php echo $rating['title']; ?></strong></div>
<div class="review-block-description"><?php echo $rating['comment']; ?></div>
</div>
</div>
<hr/>
<?php }
}
?>
</p>

 </div>
 </div>
	

	
	

	<!-- Required common Js -->
	<script src='js/jquery-2.2.3.min.js'></script>
	<!-- //Required common Js -->
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