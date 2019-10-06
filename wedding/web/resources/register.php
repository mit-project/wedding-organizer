<?php
include 'config.php';
$fname = $lname = $email = $password = "";
$fnameErr="";

if (isset($_POST['but1'])){

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "INSERT INTO user_details (fname, lname, email,password) VALUES ('$fname', '$lname', '$email','$password')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] ="You have successfully registered for wedding organizer..";
    $_SESSION['msg_type'] ="success";
	header("refresh:2;url=login.php");

} else {
     $error = "Error: " . $sql . "<br>" . $conn->error;
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Register | Wedding organizer</title>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="//fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">

<script type="text/javascript">
function formValidation(){
var fname=document.register.fname.value;
var lname=document.register.lname.value;
var email=document.register.email.value;
var password=document.register.password.value;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (fname==null || fname==""){  
  alert("First Name can't be blank");  
  return false;  
}
else if(lname==null || lname==""){  
  alert("Last Name can't be blank");  
  return false;  
}


else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }  
  
 else if(!filter.test(email)){
alert("Please provide a valid email address");
return false;
}
  
}
</script>

</head>
<body>
	<section class="agile-header">
    
		<div class="agile-heading">
        
			<h1><span class="image"></span><label>w</label>edding<label>O</label>rganizer register form</h1>
		</div>
        <?php
if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>" style="width:500px; margin-left:100px; font-size:24px; color:#FF0066;">
<?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
?>
</div>
<?php endif ?>
		<div class="agile-form">
			<form action="#" method="post" name="register" id="register" onSubmit="return formValidation()">
            
            <div class="agile-fname">
					<p>first name</p>
					<input type="text" placeholder="first name" name="fname" id="fname" required>
				</div>
				<div class="agile-lname">
					<p>last name</p>
					<input type="text"  placeholder="last name" name="lname" id="lname" required>
				</div>
				<div class="clear"></div>
				<div class="agile-email">
					<p>email-address</p>
					<input type="email" placeholder="email-address" name="email" id="email" required="">
				</div>
				<div class="agile-password">
					<p>password</p>
					<input type="password" name="password" id="password" placeholder="password" required="">
				</div>
				
             
				<div class="agile-submit">
					<input type="submit" value="register" id="but1" name="but1">
				</div>
			</form>
		</div>
		<div class="clear"></div>
		 
		
	</section>

</body>
</html>