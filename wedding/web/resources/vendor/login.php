<?php
include '../vendor/config.php';
session_start();

if (isset($_POST['login'])) {
    // email and password sent from form 

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mypassword =  $_POST['password'];

    $sql = "SELECT id,Login_email,password FROM vendor_registration WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $error = "";
    if ($email != "" && $mypassword != "") {
        if ($row != NULL) {
		if ($mypassword == $row['password']){
            
               
				$_SESSION['login_user'] = $email;
                header("location: index.php");
            } 
			else {
                $error = "Invalid Password";
            }
        } else {
            $error = "No User Found.";
        } 
		}else {
        $error = "Please Check Inputs.";
		}
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Vondor Login | Wedding organizer</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="wedlock register form a Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css -->
<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
<!--// css -->
<link href="//fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
</head>
<body>
	<section class="agile-header">
		<div class="agile-heading">
			<h1><span class="image"></span><label>w</label>edding&nbsp;<label>O</label>rganizer </h1>
		</div>
         <?php 
                                if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert" style="width:500px; margin-left:100px; font-size:20px; color:white;">
                                        '.$error.'
                                      </div>';
                                }
                                
                                ?>
		<div class="agile-form">
        <div align="center" style="font-size:36px;">Log in to your account</div>
        <div align="center" style="font-size:18px; font-weight:bold;">Access your wedding organizer account</div><br>
			<form action="" method="post">
            
           
				<div class="agile-email">
					<p>email-address</p>
					<input type="email" name="email" placeholder="email-address" required="">
				</div>
				<div class="agile-password">
					<p>password</p>
					<input type="password" name="password" placeholder="password" required="">
				</div>
			
                
				<div class="agile-submit">
					<input type="submit" value="Login" name="login">
				</div>
			</form>
		</div>
		<div class="clear"></div>
		 
		
	</section>

</body>
</html>