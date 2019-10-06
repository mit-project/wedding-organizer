<?php
include 'config.php';
include 'analyzeData/totaltask.php';
$email= $_SESSION['email'];

$sqlmsg="SELECT COUNT(id) AS totalmsg FROM reply WHERE receiverMail='$email'";
$resultmsg=mysqli_query($conn,$sqlmsg);
$valuesmsg=mysqli_fetch_assoc($resultmsg);
$num_rowsmsg=$valuesmsg['totalmsg'];

if(isset($_POST['save'])){
$id = $_POST['id'];
$status = $_POST['status'];
$note = $_POST['note'];

$conn->query("UPDATE checklist SET status='$status',note='$note' WHERE id=$id") or die($conn->error);
header("refresh:2");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Checklist | Wedding organizer</title>
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
	.progress-bar{
        height:20px;
        width:<?php echo $percentage?>%;
		background-color:#009966;
	}
	
    .tabs {
  margin: 0px 20px;
  position: relative;
  background: #EFF1E4;
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.2);
  width: 100%;
}

.tabs nav {
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  background: #AD9897;
  color: #6C5D5D;
  text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.2);
  width: 150px;
}

.tabs nav a {
  padding: 20px 0px;
  text-align: center;
  width: 100%;
  cursor: pointer;
}

.tabs nav a:hover,
.tabs nav a.selected {
  background: #6C5D5D;
  color: #AD9897;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
}

.tabs .content {
  padding: 20px 0px;
  position: absolute;
  top: 0px;
  left: 150px;
  color: #6C5D5D;
  width: 0px;
  height: 100%;
  overflow: hidden;
  opacity: 0;
  transition: opacity 0.1s linear 0s;
}

.tabs .content.visible {
  padding: 20px;
  width: calc(100% - 150px);
  overflow: scroll;
  opacity: 1;
}

.tabs .content p { padding-bottom: 2px; }

.tabs .content p:last-of-type { padding-bottom: 0px; }

.panel {
  cursor: pointer;
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
						<li class="nav-item active">
							<a class="nav-link" href="checklist.php">Checklist</a>
                            <span class="sr-only">(current)</span>
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
		<h1 class="inner-title-agileits-w3layouts">Checklist</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="home.php">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Checklist</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->
	<section class="stats py-5">
		<div class="container py-xl-5 py-sm-3">
			<h5 class="main-w3l-title text-white">You have completed <span style="color:#000000;"><strong><?php echo $num_rows2;?></strong></span> out of <span style="color:#000000;"><strong><?php echo $num_rows1;?> </strong></span>tasks </h5>
			<div class="row stats_inner">
            <div class="progress" style="width:700px; margin-left:100px;">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">
    <?php echo $percentage?>%
  </div>
  </div>
	</div></div>		
    <div class="row">
                
<div class="col" style="color:#FFFFFF; font-size:24px; padding-left:300px; font-style:oblique;"><strong><label><?php echo $num_rows2;?></label></strong>&nbsp;&nbsp;Tasks completed</div>
					
<div class="col" style="color:#FFFFFF; font-size:24px; font-style:oblique;"><strong><?php echo $num_rowsp;?></strong>&nbsp;&nbsp;Tasks pending
</div>
<div class="col">&nbsp;</div>
</div>
					
	 <div><button class="btn btn-info" style="margin-left:1150px;" data-toggle="modal" data-target="#AddTask">+ New Task</button></div>
				</div>
	
	</section>
    
     <div class="modal fade" id="AddTask" tabindex="-1" role="dialog">
     <form id="checklist" method="post" action="">

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Add New Task
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/check.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="Tname" id="Tname" placeholder="Task Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      </p>
      <br>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
      <option>Venue</option>
      <option>Jewelry</option>
      <option >Photography </option>
      <option>Videography</option>
      <option >Health & Beauty</option>
      <option>Bridal Accessories</option>
      <option>Groom Accessories</option>
      <option >Wedding invitation</option>
      <option >Flowers & Decoration</option>
      <option>Transportation</option>
      <option>Wedding cake</option>
      <option>Catering</option>
      <option >DJ/bands</option>
      <option >Other</option>
     </select>
     
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnAdd" id="btnAdd" value="Add">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>  

<script>
        $(document).ready(function(){
            $("#btnAdd").click(function(){
                var Tname=$("#Tname").val();
                var category=$("#category").val();
                $.ajax({
                    url:'insertChecklist.php',
                    method:'POST',
                    data:{
                        Tname:Tname,
                        category:category
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
        
       <h5 class="main-w3l-title">To Do List</h5>
        
        <div class="tabs">
  <nav>
    <a>Venue</a>
    <a>Catering</a>
    <a>Photography</a>
    <a>Flowers & Decoration</a>
    <a>Wedding Cake</a>
    <a>Health & Beauty</a>
    <a>Videography</a>
    <a>DJ & Band</a>
    <a>Transportation</a>
    <a>Jewelry</a>
    <a>Invitations</a>
    <a>Bridal Accessories</a>
    <a>Groom Accessories</a>
    <a>Other</a>
  </nav>
  <div class="content">
  <span>Venue Checklist</span>
  <div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Venue'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></span>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="venue.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search for Venue</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>


    </p>

  </div>

  <div class="content">
    <p>Catering Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Catering'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></span>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="catering.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search for Caterers</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>


    </p>
  </div>
 <div class="content">
 <p>Photography Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Photography'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="photography.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search Photographers</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>


    </p>
  </div>


 <div class="content">
 <p>Flowers & Decoration Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Flowers & Decoration'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="floralDecoration.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search Floral Decorations</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

<div class="content">
 <p>Wedding Cake Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Wedding cake'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="weddingCake.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search Wedding Cake Vendors</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

 <div class="content">
 <p>Health & Beauty Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Health & Beauty'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="healthAndBeauty.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search Health & Beauty</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

 <div class="content">
 <p>Videography Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Videography'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="videography.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search Videographers</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

 <div class="content">
 <p>DJ/Bands Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='DJ/bands'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="dj.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search DJ/Bands</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

 <div class="content">
 <p>Transportation Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Transportation'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="weddingCar.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search for Wedding Cars</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

 <div class="content">
 <p>Wedding Jewelry Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Jewelry'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="jewelry.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search for Wedding Jewelry</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

 <div class="content">
 <p>Wedding Invitations Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Wedding invitation'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="invitation.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search for Wedding Invitations</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

 <div class="content">
 <p>Bridal Accessories Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Bridal Accessories'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="bAccessories.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search for Bridal Accessories</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
</div>

 <div class="content">
 <p>Groom Accessories Checklist</p>
<div>&nbsp;</div>
    <p>
    <?php
$email = $_SESSION['email'];
$result=$conn->query("SELECT * FROM  checklist WHERE (user_name='$email' OR user_name='admin') AND category='Groom Accessories'") or die($conn->error);
while($row = $result->fetch_array()){
?>

<a href="#<?php echo $row['id']?>" data-toggle="modal" style="color:#000000;">
<div class="alert alert-success">
<input type="checkbox" name="status" value="Complete"<?php if($row['status']=='Complete'){ echo "checked";}?> />&nbsp;<?php echo $row['Taskname'];?>
</div>
</a>



<div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog">
<form name="task" method="post" action="">
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#CC9966;">
        <p class="heading lead" style="color:#FFFFFF;"><?php echo $row['Taskname'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-left">
          <strong>Checklist Status</strong>
          <span style="padding-left:300px;"><button type="button" style="color:#666666; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $row['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
          <script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete!")){
		   window.location.href='deleteTask.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        </p>
        
        <div class="form-check mb-4">
          <input class="form-check-input" name="status" type="radio" id="radio-179" value="Complete" <?php $row['status'] =='Complete'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#009966;">Complete</label>
        </div>

        <div class="form-check mb-4">
        
          <input class="form-check-input" name="status" type="radio" id="radio-279" value="Pending" <?php $row['status'] =='Pending'? print "checked" :"";?> >
          <label class="form-check-label" style="color:#FF0033;">Pending</label>
          
        </div>

        <hr>
        <p class="text-left">
          <strong>Add Notes</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="note" class="md-textarea form-control" rows="3" name="note">
          <?php echo $row['note'];?>
          </textarea>
        </div>
        <div>&nbsp;</div>
        <a href="gAcessories.php" class="btn btn-info">
       <i class="fa fa-search" aria-hidden="true"></i>
       Search for Groom Accessories</a> 
        </div>
         
      

      <!--Footer-->
      <div class="modal-footer">
      
       
        <button class="btn btn-info waves-effect waves-light" name="save">
        <i class="fa fa-paper-plane ml-1"></i>
        Save
        </button>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Modal: modalPoll -->

<?php } ?>
</p>
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