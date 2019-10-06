<?php
include 'config.php';
include 'analyzeData/budgetCost.php';
$email= $_SESSION['email'];

$sqlmsg="SELECT COUNT(id) AS totalmsg FROM reply WHERE receiverMail='$email'";
$resultmsg=mysqli_query($conn,$sqlmsg);
$valuesmsg=mysqli_fetch_assoc($resultmsg);
$num_rowsmsg=$valuesmsg['totalmsg'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Budget | Wedding organizer</title>
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
	
    <style type="text/css">
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
						<li class="nav-item active">
							<a class="nav-link" href="budget.php">Budget</a>
                            <span class="sr-only">(current)</span>
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
		<h1 class="inner-title-agileits-w3layouts">Budget</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="home.php">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Budget</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->
   


<section class="stats py-5">
<div class="stat-grids-w3layouts">
<div style="color:#FFFFFF; font-size:24px; padding-left:550px; font-style:oblique;"><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;&nbsp;Final Cost:&nbsp;&nbsp;&nbsp;&nbsp;Rs.&nbsp;<?php echo $num_rows1; ?><label style="padding-left:200px;">Status:&nbsp;
<?php
$result12=$conn->query("SELECT * FROM budget WHERE user_name='$email'") or die($conn->error);
if($result12->num_rows>0){
$status=$num_rows-$num_rows2;
if($status > "o"){
echo '<div style="color:#CC6600; font-weight:bold;">UNDER BUDGET</div>';
}
else{
echo '<div style="color:red; font-weight:bold;">OVER BUDGET</div>';
}
}
?>
</label></div>
<hr style="width:700px;" align="center">
<div class="row">
<div class="col" style="color:#FFFFFF; font-size:24px; padding-left:350px; font-style:oblique;"><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;&nbsp;Estimated Cost:&nbsp;&nbsp;&nbsp;&nbsp;Rs.&nbsp;<?php echo $num_rows; ?></div>
<div class="col" style="color:#FFFFFF; font-size:24px; font-style:oblique;"><i class="fa fa-money-bill-alt" aria-hidden="true"></i>&nbsp;&nbsp;Total Paid:&nbsp;&nbsp;&nbsp;&nbsp;Rs.&nbsp;<?php echo $num_rows2; ?></div>
</div>
               
</div>        
</section>

<section class="contact py-5">
<div>
<button class="btn btn-info btn-sq" style="margin-left:1050px;" data-toggle="modal" data-target="#budget">+ Expense</button>
<a href="payment.php" class="btn btn-info">Payment Summary</a>

<div class="modal fade" id="budget" tabindex="-1" role="dialog">
<form id="budget" method="post" action="">
     

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Add Expense
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <label>Expense</label>
      <input type="text" name="expense" id="expense" value="" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue">Venue</option>
      <option value="Jewelery">Jewelery</option>
      <option value="Photography">Photography</option>
      <option value="Videography">Videography</option>
      <option value="Health & Beauty">Health & Beauty</option>
      <option value="Bridal Accessories">Bridal Accessories</option>
      <option value="Groom Accessories">Groom Accessories</option>
      <option value="Wedding invitation">Wedding invitation</option>
      <option value="Flowers & Decoration">Flowers & Decoration</option>
      <option value="Transportation">Transportation</option>
      <option value="Wedding cake">Wedding cake</option>
      <option value="Catering">Catering</option>
      <option value="DJ/bands">DJ/bands</option>
      <option value="Officiant">Officiant</option>
      <option value="Other">Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value=""  style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="" class="form-control" onFocus="(this.type='date')"  style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">

        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save Expense">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<script>
        $(document).ready(function(){
            $("#budget #btnSave").click(function(){
                var expense=$("#expense").val();
                var category=$("#category").val();
				var Ecost=$("#Ecost").val();
				var Fcost=$("#Fcost").val();
				var Duedate=$("#Duedate").val();
				
                var DueDate1 = new Date(Duedate);
				var today = new Date();
               if (DueDate1.setHours(0,0,0,0)<today.setHours(0,0,0,0)){
               alert("Payment due date cannot be past date. Please insert upcoming date!");
               return false;
                }
				
				
                $.ajax({
                    url:'insertBudget.php',
                    method:'POST',
                    data:{
                       expense:expense,
                        category:category,
						 Ecost: Ecost,
						Fcost:Fcost,
						Duedate:Duedate
						
                    },
                   success:function(data){
                       alert(data);
            
  

                   }
                });
            });
        });
    </script>
				
<div class="container py-xl-5 py-sm-3">
<h5 class="main-w3l-title mb-sm-3 mb-2">Budget Summary</h5>
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
  <span style="padding-left:400px;"><img src="images/venue.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;"> </span>
  <div style="padding-left:380px; color:#000066;"><h5 class="main-w3l-title">Venue</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows3; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows4; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows5; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Venue'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal"><i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a class="btn btn-info" href="#update" style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update" tabindex="-1" role="dialog">
     <form id="updateBudget" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
  <span style="padding-left:400px;"><img src="images/catering.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;"> </span>
  <div style="padding-left:380px; color:#000066;"><h5 class="main-w3l-title">Catering</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows12; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows13; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows14; ?>
  </div>
  </div>
 
<p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Catering'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal"><i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a class="btn btn-info" href="#update1" style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update1" tabindex="-1" role="dialog">
     <form id="updateBudget1" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget1').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget1")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
  <span style="padding-left:400px;"><img src="images/professional-photographer.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;"> </span>
  <div style="padding-left:380px; color:#000066;"><h5 class="main-w3l-title">Photography</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows39; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows40; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows41; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Photography'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update2" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update2" tabindex="-1" role="dialog">
     <form id="updateBudget2" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget2').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget2")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
  <span style="padding-left:400px;"><img src="images/Floral Decoration.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;"> </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Flowers & Decoration</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows18; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows19; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows20; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Flowers & Decoration'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update3" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update3" tabindex="-1" role="dialog">
     <form id="updateBudget3" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget3').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget3")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
  <span style="padding-left:400px;"><img src="images/wedding-cake.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;"> </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Wedding Cake</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows9; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows10; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows11; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Wedding cake'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update4" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update4" tabindex="-1" role="dialog">
     <form id="updateBudget4" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget4').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget4")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
 <span style="padding-left:400px;"><img src="images/health and beauty.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;"> </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Health & Beauty</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows24; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows25; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows26; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Health & Beauty'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update5" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update5" tabindex="-1" role="dialog">
     <form id="updateBudget5" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget5').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget5")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
 <span style="padding-left:400px;"><img src="images/videography.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;">      </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Videography</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows45; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows46; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows47; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Videography'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update6" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update6" tabindex="-1" role="dialog">
     <form id="updateBudget6" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget6').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget6")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
 <span style="padding-left:400px;"><img src="images/DJ.png" class="avatar" style="width:100px; height:100px; border-radius:50%;">      </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">DJ/Bands</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows15; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows16; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows17; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='DJ/bands'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update7" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update7" tabindex="-1" role="dialog">
     <form id="updateBudget7" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget7').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget7")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
 <span style="padding-left:400px;"><img src="images/wedding car.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;">      </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Transportation</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows42; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows43; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows44; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Transportation'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update8" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update8" tabindex="-1" role="dialog">
     <form id="updateBudget8" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget8').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget8")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
 <span style="padding-left:400px;"><img src="images/-Bridal-Jewelry2.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;">      </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Wedding Jewelry</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows30; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows31; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows32; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Jewelery'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update9" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update9" tabindex="-1" role="dialog">
     <form id="updateBudget9" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget9').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget9")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
 <span style="padding-left:400px;"><img src="images/Wedding-Invitation.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;">      </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Wedding Invitation</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows27; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows28; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows29; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Wedding invitation'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update6" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update10" tabindex="-1" role="dialog">
     <form id="updateBudget10" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget10').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget10")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>


<div class="content">
 <span style="padding-left:400px;"><img src="images/bridal accessories.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;">      </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Bridal Accessories</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows6; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows7; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows8; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Bridal Accessories'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update11" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update11" tabindex="-1" role="dialog">
     <form id="updateBudget11" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget11').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget11")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
</div>

<div class="content">
 <span style="padding-left:400px;"><img src="images/groom-accessories-.jpg" class="avatar" style="width:100px; height:100px; border-radius:50%;">      </span>
  <div style="padding-left:280px; color:#000066;"><h5 class="main-w3l-title">Groom Accessories</h5></div>
  <div class="row" style="font-size:18px; font-style:italic; padding-left:80px; color:#003333; font-weight:bold;">
  <div class="col">
  Estimated Cost: Rs. &nbsp;<?php echo $num_rows21; ?>
  </div>
  <div class="col">
  Final Cost: Rs.&nbsp;<?php echo $num_rows22; ?>
  </div>
  <div class="col">
  Paid so far: Rs.&nbsp;<?php echo $num_rows23; ?>
  </div>
  </div>
  
    <p>
<div class="row">
<div class="col col-md-12">
<div id="result">
<div class="table-responsive">
<table class="table table-striped table-sm" style="margin-top:50px; font-size:16px;">
<thead>
<tr>
<th>Expense</th>
<th>Estimated Cost</th>
<th>Final Cost</th>
<th>Payment Due Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM budget WHERE user_name='$email' AND category='Groom Accessories'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
if ($result){
foreach($result as $key => $value){
?>
<tr>
<td><?php echo $value['Expense']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Estimatedcost']; ?></td>
<td>Rs.&nbsp;<?php echo $value['Finalcost']; ?></td>
<td><?php echo $value['PaymentDueBy']; ?></td>
<td>  
<a href="#<?php echo $value['id'];?>" class="btn btn-primary" style="color:#000000; border: 0; background: none;" data-toggle="modal">         <i class="fa fa-money-bill-alt" aria-hidden="true"></i></a>                        
<a href="#update6" class="btn btn-info"  style="color:#000000; border: 0; background: none;" data-toggle="modal" ><i class="fa fa-edit fa-1x" aria-hidden="true"></i></a>
<a href="#" data-toggle="modal" title="Delete"> <button type="button" style="color:#000000; border: 0; background: none;" name="Delete" value="Delete" onClick="deleteme(<?php echo $value['id'];?>)"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button></a>
</td>
</tr>
<div class="modal fade" id="<?php echo $value['id'];?>" tabindex="-1" role="dialog">
     <form id="payment" method="post" action="">
     <input type="hidden" name="id" value="<?php echo $id;?>" />
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Payment for&nbsp;<?php echo $value['Expense'];?>
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/payment.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" class="form-control" name="expense" id="expense" value="<?php echo $value['Expense'];?>" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <br>
      
 <select class="w3-select" class="form-control" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      
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
     <label>&nbsp;</label> <br>
     
<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
     
     <input type="text" id="paymentDate" name="paymentDate" placeholder="Date of Payment" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
     <br>
     
     <input type="text" class="form-control"  name="name" id="name" placeholder="Payer Name" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      <input type="text" class="form-control" id="payMethod" name="payMethod" placeholder="Payment Method" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     
      <br>
      
      </div>
     <br>    
      

      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnSave" id="btnSave" value="Save">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#payment').on("submit", function(){  
                
				var paymentDate=$("#paymentDate").val();
				var PayDate = new Date(paymentDate);
				var today = new Date();
				if (PayDate.setHours(0,0,0,0)>today.setHours(0,0,0,0)){
               alert("Payment date cannot be future date");
               return false;
                }
                $.ajax({  
                     url:"addPayment.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#payment")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>                                           
</div> 

<script>
		function deleteme(delid)
		{
		if(confirm("Do you want to Delete?")){
		   window.location.href='deleteBudget.php?del_id=' +delid+'';
		   return true;
		}
		}
		</script>
        
 <div class="modal fade" id="update12" tabindex="-1" role="dialog">
     <form id="updateBudget12" method="post" action="">
     <input type="hidden" name="budget_id" id="budget_id" value="<?php echo $value['id'];?>" />

  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color:#339999;">
        <p class="heading lead" style="color:#FFFFFF;">Update Budget
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      <p class="text-center">
      <img src="images/budget.png" alt="avatar" class="rounded-circle img-responsive" width="150px" height="150px">
      </p>
      <br>
      <p class="text-left">
      <input type="text" name="expense" id="expense" value="<?php echo $value['Expense'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
      
      <div>&nbsp;</div>
      <select class="w3-select" name="category" style="border:none; border-bottom: 2px solid #006666; width:450px;" required id="category">
      <option value="" disabled selected>Choose category</option>
       <option value="Venue"<?php if($value['category']=="Venue"){ echo "selected";}?>>Venue</option>
      <option value="Jewelery"<?php if($value['category']=="Jewelery"){ echo "selected";}?>>Jewelery</option>
      <option value="Photography"<?php if($value['category']=="Photography"){ echo "selected";}?>>Photography</option>
      <option value="Videography"<?php if($value['category']=="Videography"){ echo "selected";}?>>Videography</option>
      <option value="Health & Beauty"<?php if($value['category']=="Health & Beauty"){ echo "selected";}?>>Health & Beauty</option>
      <option value="Bridal Accessories"<?php if($value['category']=="Bridal Accessories"){ echo "selected";}?>>Bridal Accessories</option>
      <option value="Groom Accessories"<?php if($value['category']=="Groom Accessories"){ echo "selected";}?>>Groom Accessories</option>
      <option value="Wedding invitation"<?php if($value['category']=="Wedding invitation"){ echo "selected";}?>>Wedding invitation</option>
      <option value="Flowers & Decoration"<?php if($value['category']=="Flowers & Decoration"){ echo "selected";}?>>Flowers & Decoration</option>
      <option value="Transportation"<?php if($value['category']=="Transportation"){ echo "selected";}?>>Transportation</option>
      <option value="Wedding cake"<?php if($value['category']=="Wedding cake"){ echo "selected";}?>>Wedding cake</option>
      <option value="Catering" <?php if($value['category']=="Catering"){ echo "selected";}?>>Catering</option>
      <option value="DJ/bands"<?php if($value['category']=="DJ/bands"){ echo "selected";}?>>DJ/bands</option>
      <option value="Officiant" <?php if($value['category']=="Officiant"){ echo "selected";}?>>Officiant</option>
      <option value="Other" <?php if($value['category']=="Other"){ echo "selected";}?>>Other</option>
     </select>
    
     <div>&nbsp;</div>
     <label>Estimated Cost</label> 
      
     <input type="number" name="Ecost" id="Ecost" value="<?php echo $value['Estimatedcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Final Cost</label> 
      
     <input type="number" name="Fcost" id="Fcost" value="<?php echo $value['Finalcost'];?>"required style="border:none; border-bottom: 2px solid #006666; width:450px;">
     <div>&nbsp;</div>
     <label>Payment Due By</label>
     <input type="text" id="Duedate" name="Duedate" value="<?php echo $value['PaymentDueBy'];?>" class="form-control" onFocus="(this.type='date')" required style="border:none; border-bottom: 2px solid #006666; width:450px;">
    
      </p>
     </div>
      <!--Footer-->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info waves-effect waves-light" name="btnUpdate" id="btnUpdate" value="Save Changes">
        <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function(){  
           $('#updateBudget12').on("submit", function(e){  
                
				 e.preventDefault();
                $.ajax({  
                     url:"editBudget.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                           
                         alert (data); 
						 $("#updateBudget12")[0].reset();
					      window.location.reload(); 
                          
                     }  
                })  
           });  
      });  
    </script>
  </form>
</div>  
<?php
}
}
?>
</tbody>
</table>

</div>	
</div>
</div>
</div>
</p>
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