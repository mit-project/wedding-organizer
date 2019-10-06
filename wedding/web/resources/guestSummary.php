<?php
include 'config.php';
include 'analyzeData/guestSum.php';
$email = $_SESSION['email'];
$sql="SELECT status, COUNT(*) AS number FROM guest WHERE user_name='$email' GROUP BY status";
$result = mysqli_query($conn, $sql);

$sqlT="SELECT COUNT(id) AS totalGuest FROM guest WHERE user_name='$email'";
$resultT=mysqli_query($conn,$sqlT);
$valuesT=mysqli_fetch_assoc($resultT);
$total=$valuesT['totalGuest'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Guest Summary | Wedding organizer</title>
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
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css">
    <style type="text/css">
	.progress{
        width:600px;
		margin-left:0px;
		height:20px;
		background-color:#CCCCCC;
      }
	  
.progress-bar{
        height:25px;
        width:<?php echo $percentage?>%;
		background-color:#339966;
		}
.progress-bar1{
        height:25px;
        width:<?php echo $percentage1?>%;
		background-color:#339966;
		}
		
.progress-bar3{
        height:25px;
        width:<?php echo $percentage3?>%;
		background-color:#339966;
		}
.progress-bar4{
        height:25px;
        width:<?php echo $percentage4?>%;
		background-color:#339966;
		}
.progress-bar5{
        height:25px;
        width:<?php echo $percentage5?>%;
		background-color:#339966;
		}
.progress-bar6{
        height:25px;
        width:<?php echo $percentage6?>%;
		background-color:#339966;
		}
		
.progress-bar7{
        height:25px;
        width:<?php echo $percentage7?>%;
		background-color:#339966;
		}
		
.progress-bar8{
        height:25px;
        width:<?php echo $percentage8?>%;
		background-color:#339966;
		}
		
.progress-bar9{
        height:25px;
        width:<?php echo $percentage9?>%;
		background-color:#339966;
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
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['status', 'number'],
		  <?php
		   while($row = mysqli_fetch_array($result)){
           echo "['".$row['status']."',".$row['number']."],";
		  }
		  ?>
          
        ]);

        var options = {
          title: 'Guest Attendance'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
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
		<h1 class="inner-title-agileits-w3layouts">Guest List Summary</h1>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="guestList.php">Guset List</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Guest List Summary</li>
		</ol>
	</nav>
	<!-- //breadcrumb -->
	
    
     
	<section class="contact py-5">
    
		<div class="container py-xl-5 py-sm-3">
        
       <h5 class="main-w3l-title">Graphical Representation</h5>
        
        <div class="tabs">
  <nav>
    <a>Guest Attendance</a>
    <a>Bride Family</a>
    <a>Groom Family</a>
    <a>Bride's Friends</a>
    <a>Groom's Friends</a>
    <a>Mutual Friends</a>
    <a>Coworkers of Bride</a>
    <a>Coworkers of Groom</a>
    <a>Family Friends of Bride</a>
    <a>Family Friends of Groom</a>
  </nav>
  <div class="content">
  <span>Guest Attendance</span>
  <div>&nbsp;</div>
    <p>
    <label style="font-size:24px; color:#003300; padding-left:0px;">Total Guest:&nbsp;<?php echo $num_rows; ?></label>
    <div><br></div>
    <div id="piechart" style="width: 850px; height: 500px; margin-left:30px;"></div>
   </p>

  </div>

<div class="content">
 <p><strong>Bride Family</strong></p>
<div>&nbsp;</div>
  <p>
<?php
$email = $_SESSION['email'];
$sql2="SELECT COUNT(id) AS totalBridefamily FROM guest WHERE user_name='$email' AND familySide='Bride family'";
$result2=mysqli_query($conn,$sql2);
$values2=mysqli_fetch_assoc($result2);
$current=$values2['totalBridefamily'];

$percentage = round(($current/$total) * 100,1);	
?>
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current; ?></label>
<div class="progress">
<div class="progress-bar"><?php echo $percentage?>%</div>
</div>
<label><br></label>
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                                <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Bride family'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  
                                                  </div>
                                                  </div>
                                                 
</p>
</div>
  
 <div class="content">
<p><strong>Groom Family</strong></p>
<div>&nbsp;</div>
<p>
<?php
$sql1="SELECT COUNT(id) AS totalGroomfamily FROM guest WHERE user_name='$email' AND familySide='Groom family'";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$current1=$values1['totalGroomfamily'];

$percentage1 = round(($current1/$total) * 100,1);   
?>
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current1; ?></label>
<div class="progress">
<div class="progress-bar1" style="font-size:12px; color:#FFFFFF;" align="center"><?php echo $percentage1?>%</div>
</div>
<label><br></label>
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                                <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Groom family'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  
                                                  </div>
                                                  </div>
                                                 
</p>
</div>


<div class="content">
<p><strong>Bride's Friends</strong></p>
<div>&nbsp;</div>
<p>
<?php
$sql3="SELECT COUNT(id) AS totalBridefriends FROM guest WHERE user_name='$email' AND familySide='Friends of bride'";
$result3=mysqli_query($conn,$sql3);
$values3=mysqli_fetch_assoc($result3);
$current3=$values3['totalBridefriends'];

$percentage3 = round(($current3/$total) * 100,1);
?>  
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current3; ?></label>  
<div class="progress">
<div class="progress-bar3" style="font-size:12px; color:#FFFFFF;" align="center"><?php echo $percentage3?>%</div>
</div>
<label><br></label>
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                         <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Friends of bride'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  
                                                  </div>
                                                  </div>
                                    
</p>
</div>

<div class="content">
<p><strong>Groom's Friends</strong></p>
<div>&nbsp;</div>
<p>
<?php
$sql4="SELECT COUNT(id) AS totalGroomfriends FROM guest WHERE user_name='$email' AND familySide='Friends of groom'";
$result4=mysqli_query($conn,$sql4);
$values4=mysqli_fetch_assoc($result4);
$current4=$values4['totalGroomfriends'];

$percentage4 = round(($current4/$total) * 100,1);
?>
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current4; ?></label>   
<div class="progress">
<div class="progress-bar4" style="font-size:12px; color:#FFFFFF;" align="center"><?php echo $percentage4?>%</div>
</div>
<label><br></label> 
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                         <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Friends of groom'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  
                                                  </div>
                                                  </div>
  
</p>
</div>

 <div class="content">
 <p><strong>Mutual Friends</strong></p>
<div>&nbsp;</div>
<p>
<?php
$sql5="SELECT COUNT(id) AS totalMutualfriends FROM guest WHERE user_name='$email' AND familySide='Mutual friends'";
$result5=mysqli_query($conn,$sql5);
$values5=mysqli_fetch_assoc($result5);
$current5=$values5['totalMutualfriends'];

$percentage5 = round(($current5/$total) * 100,1);  
?> 
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current5; ?></label>  
<div class="progress">
<div class="progress-bar5" style="font-size:12px; color:#FFFFFF;" align="center"><?php echo $percentage5?>%</div>
</div>
<label><br></label>
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                         <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Mutual friends'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  
                                                  </div>
                                                  </div>
      
</p>
</div>

 <div class="content">
 <p><strong>Coworkers of Bride</strong></p>
<div>&nbsp;</div>
<p>
<?php
$sql6="SELECT COUNT(id) AS totalBridecoworkers FROM guest WHERE user_name='$email' AND familySide='Coworkers of bride'";
$result6=mysqli_query($conn,$sql6);
$values6=mysqli_fetch_assoc($result6);
$current6=$values6['totalBridecoworkers'];

$percentage6 = round(($current6/$total) * 100,1);
?>
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current6; ?></label>
<div class="progress">
<div class="progress-bar6" style="font-size:12px; color:#FFFFFF;" align="center"><?php echo $percentage6?>%</div>
</div>
<label><br></label>
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                         <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Coworkers of bride'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  
                                                  </div>
                                                  </div>
                                    
</p>
</div>

 <div class="content">
 <p><strong>Coworkers of Groom</strong></p>
<div>&nbsp;</div>
<p>
<?php
$sql7="SELECT COUNT(id) AS totalGroomcoworkers FROM guest WHERE user_name='$email' AND familySide='Coworkers of groom'";
$result7=mysqli_query($conn,$sql7);
$values7=mysqli_fetch_assoc($result7);
$current7=$values7['totalGroomcoworkers'];

$percentage7 = round(($current7/$total) * 100,1);
?>
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current7; ?></label>
<div class="progress">
<div class="progress-bar7" style="font-size:12px; color:#FFFFFF;" align="center"><?php echo $percentage7?>%</div>
</div>
<label><br></label>
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                         <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Coworkers of groom'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  
                                                  </div>
                                                  </div>
                                    
</p>
</div>

<div class="content">
 <p><strong>Family Friends of Bride</strong></p>
<div>&nbsp;</div>
<p>
<?php
$sql8="SELECT COUNT(id) AS totalFamilyfriendsofBride FROM guest WHERE user_name='$email' AND familySide='Family friends of bride'";
$result8=mysqli_query($conn,$sql8);
$values8=mysqli_fetch_assoc($result8);
$current8=$values8['totalFamilyfriendsofBride'];

$percentage8 = round(($current8/$total) * 100,1);
?>
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current8; ?></label>
<div class="progress">
<div class="progress-bar8" style="font-size:12px; color:#FFFFFF;" align="center"><?php echo $percentage8?>%</div>
</div>
<label><br></label>
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                   <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Family friends of bride'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  
                                                  </div>
                                                  </div>
                                    

</p>
</div>

 <div class="content">
 <p><strong>Family Friends of Groom</strong></p>
<div>&nbsp;</div>
<p>
<?php
$sql9="SELECT COUNT(id) AS totalFamilyfriendsofGroom FROM guest WHERE user_name='$email' AND familySide='Family friends of groom'";
$result9=mysqli_query($conn,$sql9);
$values9=mysqli_fetch_assoc($result9);
$current9=$values9['totalFamilyfriendsofGroom'];

$percentage9 = round(($current9/$total) * 100,1);
?>
<label style="font-size:24px; color:#006666;">Total Guest:&nbsp;<?php echo $current9; ?></label>
<div class="progress">
<div class="progress-bar9" style="font-size:12px; color:#FFFFFF;" align="center"><?php echo $percentage9?>%</div>
</div>
<label><br></label>
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
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';?>
                                                <?php $email = $_SESSION['email'];?>
                                   <?php $sqlG1 = "SELECT * FROM guest WHERE user_name='$email' AND familySide='Family friends of groom'";?>
                                               <?php $resultG1 = mysqli_query($conn, $sqlG1);?>
                                               <?php //var_dump($resultG1G1);die;?>
												<?php if ($resultG1){?>
												<?php foreach($resultG1 as $key => $value){?>
                                                
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $value['firstname']; ?></td>
                                                    <td><?php echo $value['lastname']; ?></td>
                                                    <td><?php echo $value['mobileNo']; ?></td>
                                                    <td><?php echo $value['Address']; ?></td>
                                                     <td><?php echo $value['status']; ?></td>
                                                  </tr>
                                                   <?php } ?>
                                                   <?php } ?>
                                                  </tbody>
                                                  </table>
                                                  </div>
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