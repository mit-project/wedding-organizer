<?php
include 'config.php';
include 'analyzeData/guestSum.php';
$email= $_SESSION['email'];
$sqlmsg="SELECT COUNT(id) AS totalmsg FROM reply WHERE receiverMail='$email'";
$resultmsg=mysqli_query($conn,$sqlmsg);
$valuesmsg=mysqli_fetch_assoc($resultmsg);
$num_rowsmsg=$valuesmsg['totalmsg'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Guest List | Wedding organizer</title>
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css">
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
                        <li class="nav-item active">
							<a class="nav-link" href="guestList.php">Guest List</a>
						</li>
                        <span class="sr-only">(current)</span>
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
		<h1 class="inner-title-agileits-w3layouts">Guest List</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="home.php">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Guest List</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->
	<section class="stats py-5">
			
        <div style="padding-left:580px; font-size:24px; color:#FFFFFF;"><label ><?php echo $num_rows; ?></label>&nbsp;&nbsp;Guest Invited
                </div>
                    
                <hr style="width:600px;" align="center">
                <div class="row" style="padding-left:380px; font-size:24px; color:#FFFFFF;">
				
                <div class="col" ><?php echo $num_rows1; ?>&nbsp;&nbsp;Attending</div>
					
                <div class="col"><?php echo $num_rows2; ?>&nbsp;&nbsp;Pending</div>
                
                <div class="col"><?php echo $num_rows3; ?>&nbsp;&nbsp;Decline</div>
                <div class="col">&nbsp;</div>
                    
                </div>
                    
            
             
             <button class="btn btn-info" style="margin-left:1200px;" data-toggle="modal" data-target="#AddTask">+ Guest</button>&nbsp;
             
             </div>
				</div>
		
        
			</div>
		</div>
	</section>
 
 <div style="padding-top:20px;">
 <a href="download.php" class="btn btn-info" style="margin-left:50px;">Download Template</a> &nbsp;
 <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#importCSV">Import Spreadsheet</button> 
 <a href="guestSummary.php" class="btn btn-info">View summary</a>  
 </div>
 
     <div class="modal fade" id="AddTask" tabindex="-1" role="dialog">
     <form id="guest" method="post" action="">

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Add New Guest
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/guest.png" alt="avatar" class="rounded-circle img-responsive" width="120px" height="120px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="Fname" id="Fname" placeholder="First Name" class="form-control" required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      <input type="text" name="Sname" id="Sname" placeholder="Last Name" class="form-control" required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      <select name="group" id="group" class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;" required>
      <option value="" disabled selected>Choose category</option>
      <option value="Choose group">Choose group</option>
      <option value="Family friends of bride">Family friends of bride</option>
      <option value="Family friends of groom">Family friends of groom</option>
      <option value="Coworkers of bride">Coworkers of bride</option>
      <option value="Bride family">Bride family</option>
      <option value="Friends of bride">Friends of bride</option>
      <option value="Coworkers of groom">Coworkers of groom</option>
      <option value="Groom family">Groom family</option>
      <option value="Friends of groom">Friends of groom</option>
      <option value="Mutual friends">Mutual friends</option>
      </select>
      <br>
      
      <input type="text" name="mobileNo" id="mobileNo" placeholder="Mobile Number" class="form-control" required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      
      <input type="text" name="address" id="address" placeholder="Address" class="form-control"  required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      

<label>Status</label><br />
<input type="radio" name="status" id="status" value="attending" />Attending &nbsp;&nbsp;&nbsp;
<input type="radio" name="status" id="status" value="pending" />Pending &nbsp;&nbsp;&nbsp;
<input type="radio" name="status" id="status" value="declined" />Declined &nbsp;&nbsp;&nbsp;
      </p>
     </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnAdd" id="btnAdd" value="Add Guest">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>  

<script>
        $(document).ready(function(){
            $("#guest #btnAdd").click(function(){
                var Fname=$("#Fname").val();
                var Sname=$("#Sname").val();
				var group=$("#group").val();
				var mobileNo=$("#mobileNo").val();
				var address=$("#address").val();
				var status=$("#status:checked").val();
				var regName = /^[a-zA-Z]$/;
				
				if(!mobileNo.match(/^\d{10}/)){
                alert("Please enter valid phone number");
                return false;
                 }
				 
				
				else if(!address.match(/^[a-zA-Z0-9\s,.'-]{3,}$/)){
                alert("Please enter valid phone number");
                return false;
                 }
				
                $.ajax({
                    url:'insertGuest.php',
                    method:'POST',
                    data:{
                        Fname:Fname,
                        Sname:Sname,
						group:group,
						mobileNo:mobileNo,
						address:address,
						status:status
                    },
                   success:function(data){
                       alert(data);
            
  

                   }
                });
            });
        });
    </script>

	<section class="contact py-5">
    
		<div class="container py-xl-5 py-sm-3">
        <h5 class="main-w3l-title">Guest List Summary</h5>
        <br>
        
       <div class="container">
                        <div class="row">
                            <div class="col col-md-14">
                                <div id="result">
                                   
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Family side</th>
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                                <?php $sql = "SELECT * FROM guest WHERE user_name='$email'";?>
                                               <?php $result = mysqli_query($conn, $sql);?>
                                               <?php //var_dump($result);die;?>
												<?php if ($result){?>
												<?php foreach($result as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['familySide']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                    <td>
   <a class="btn btn-info" style="color:#003366; border: 0; background: none;" data-toggle="tooltip" title="Edit" href="editGuest.php?update=<?php echo $value['id']; ?>" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
                                 <a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#FF0033; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
                                                    </td>
        <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Guest?")){
		   window.location.href='deleteGuest.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
                                                </tr>
                                            <?php
                                                }?>
												<?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>

        
       
</div>

			
</div>
</section>
<div class="modal fade" id="importCSV" tabindex="-1" role="dialog">
     <form id="import" method="post" action="" enctype="multipart/form-data">

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Upload Guest List
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/importing-csv.png" alt="avatar" class="rounded-circle img-responsive" width="120px" height="120px">
      </p>
      <br>
      <p class="text-left">
      <input type="file" name="myFile" id="myFile" class="form-control" style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      
     </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpload" id="btnUpload" value="Upload">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div> 


<script>
        $(document).ready(function(){  
           $('#import').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"uploadGuest.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }  
                          else  
                          {  
                               alert (data);  
                          }  
                     }  
                })  
           });  
      });  
    </script>
              

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