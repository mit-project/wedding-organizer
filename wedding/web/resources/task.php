<?php
include 'config.php';
include 'analyzeData/assignTask.php';
$email= $_SESSION['email'];

$sqlmsg="SELECT COUNT(id) AS totalmsg FROM reply WHERE receiverMail='$email'";
$resultmsg=mysqli_query($conn,$sqlmsg);
$valuesmsg=mysqli_fetch_assoc($resultmsg);
$num_rowsmsg=$valuesmsg['totalmsg'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Task Managment | Wedding organizer</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <li class="nav-item active">
							<a class="nav-link" href="task.php">Task Management</a></li>
                            <span class="sr-only">(current)</span>
                          
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
		<h1 class="inner-title-agileits-w3layouts">Task Management</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="home.php">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Task Management</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->
	<section class="stats py-5">
		
        <div style="padding-left:580px; font-size:24px; color:#FFFFFF;"> <?php echo $num_rows; ?>&nbsp;&nbsp;Tasks Assigning </div>
        <hr style="width:500px;" align="center">
        
        <div class="row" style="padding-left:420px; font-size:24px; color:#FFFFFF;">
				
		<div class="col" > <?php echo $num_rows1; ?>&nbsp;&nbsp;Tasks done</div>
					
		<div class="col"> <?php echo $num_rows2; ?>&nbsp;&nbsp;Tasks pending</div>
        
        <div class="col">&nbsp;</div>
					
		</div>				
					
       <div><button class="btn btn-info" style="margin-left:1100px;" data-toggle="modal" data-target="#AddTask">+ Assign Task</button>
             
	  </section>
    
     <div class="modal fade" id="AddTask" tabindex="-1" role="dialog">
     <form id="task" method="post" action="">

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Assign New Task
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/task.jpg" alt="avatar" class="rounded-circle img-responsive" width="100px" height="100px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="name" id="name" placeholder="Name" class="form-control" required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      <input type="text" name="Taskname" id="Taskname" placeholder="Task Name" class="form-control" required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      
      <input type="text" name="contactNo" id="contactNo" placeholder="Contact No" class="form-control" required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      
      <input type="text" name="AssignDate" id="AssignDate" placeholder="Assign Date" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      
      
      <input type="text" name="DueDate" id="DueDate" placeholder="Due Date" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;"><br>
      <label>Status</label><br />
<input type="radio" name="taskStatus" id="taskStatus" value="done" />Done &nbsp;&nbsp;&nbsp;
<input type="radio" name="taskStatus" id="taskStatus" value="pending" />Pending<br />
      </p>
     </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnAssign" id="btnAssign" value="Assign Task">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>  

<script>
        $(document).ready(function(){
            $("#task #btnAssign").click(function(){
                var name=$("#name").val();
                var Taskname=$("#Taskname").val();
				var contactNo=$("#contactNo").val();
				var AssignDate=$("#AssignDate").val();
				var DueDate=$("#DueDate").val();
				var taskStatus=$("#taskStatus:checked").val();
				var AssDate = new Date(AssignDate);
                var DueDate1 = new Date(DueDate);
				var today = new Date();
               if (DueDate1.setHours(0,0,0,0)<AssDate.setHours(0,0,0,0)){
               alert("Due date cannot be before assign date");
               return false;
                }
				
				else if(!contactNo.match(/^\d{10}/)){
                alert("Please enter valid phone number");
                return false;
                 }
				 
			   if (AssDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Assign date cannot be future date");
               return false;
                }
                $.ajax({
                    url:'insertTask.php',
                    method:'POST',
                    data:{
                        name:name,
                        Taskname:Taskname,
						contactNo:contactNo,
						AssignDate:AssignDate,
						DueDate:DueDate,
						taskStatus:taskStatus
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
        <h5 class="main-w3l-title">Assign Task Summary</h5>
        <br>
        
       <div class="container">
                        <div class="row">
                            <div class="col col-md-14">
                                <div id="result">
                                   
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Name</th>
                                                    <th>Task Name</th>
                                                    <th>Contact No</th>
                                                    <th>Task assign date</th>
                                                    <th>Task due date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                                <?php $sql = "SELECT * FROM task WHERE user_name='$email'";?>
                                               <?php $result = mysqli_query($conn, $sql);?>
                                               <?php //var_dump($result);die;?>
												<?php if ($result){?>
												<?php foreach($result as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['Name']; ?></td>
                                                    <td><?php echo $value['Taskname']; ?></td>
                                                    <td><?php echo $value['Contactno']; ?></td>
                                                    <td><?php echo $value['Assigndate']; ?></td>
                                                    <td><?php echo $value['Duedate']; ?></td>
                                                    <td><?php echo $value['Status']; ?></td>
                                                    <td>
   <a class="btn btn-info" style="color:#003366; border: 0; background: none;" data-toggle="tooltip" title="Edit" href="editTask.php?update=<?php echo $value['id']; ?>" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
                                 <a href="#" data-toggle="tooltip" title="Delete"> <button type="button" style="color:#FF0033; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
                                                    </td>
                                                    <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete this Task?")){
		   window.location.href='deleteAssignTask.php?del_id=' +delid+'';
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