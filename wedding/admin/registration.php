<?php
include 'config.php';
?>
<!DOCTYPE html>
<head>
<title>Admin | Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JavaScript/jquery-1.6.1.min.js" type="text/javascript"></script>
</head>
<body>
<div class="reg-w3">
<div class="w3layouts-main">
	<h2>Register Now</h2>
		<form action="" method="post" id="register">
			<input type="text" class="ggg" name="Name" id="Name" placeholder="NAME">
			<input type="email" class="ggg" name="Email" id="Email" placeholder="E-MAIL" required="">
			<input type="text" class="ggg" name="Phone" id="Phone" placeholder="PHONE" required="">
			<input type="password" class="ggg" name="Password" id="Password" placeholder="PASSWORD" required="">
			
			
				<div class="clearfix"></div>
				<input type="submit" value="submit" name="register1" id="register1">
                <script>
        $(document).ready(function(){  
           $('#register').on("submit", function(){  
                
				var Name=$("#Name").val();
				var Email=$("#Email").val();
				var Phone=$("#Phone").val();
				var Password=$("#Password").val();
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (Name==null || Name==""){  
                alert(" Name can't be blank");  
                return false;  
                 }
				 
				 else if(Password.length<6){  
                 alert("Password must be at least 6 characters long.");  
                 return false;  
                  }  
  
                 else if(!filter.test(Email)){
                 alert("Please provide a valid email address");
                 return false;
                  }
				  
				 else if(!Phone.match(/^\d{10}/)){
                 alert("Please enter valid phone number");
                 return false;
                    }
  

				
                $.ajax({  
                     url:"register.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          
                     cache:false,                
                     processData:false,            
                     success: function(data){  
                           
                         alert(data); 
						 
                          
                     }  
                })  
           });  
      });  
    </script>
		</form>
		<p>Already Registered.<a href="login.php">Login</a></p>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
