<?php
include 'config.php';
session_start();

           $email = $_SESSION['email'];
           $Fname=$_POST['Fname'];
		   $Sname=$_POST['Sname'];
		   $group=$_POST['group'];
		   $mobileNo=$_POST['mobileNo'];
		   $address=$_POST['address'];
		   $status=$_POST['status'];
		   
$sql = "INSERT INTO guest(firstname,lastname,familySide,mobileNo,Address,status,user_name) VALUES ('$Fname','$Sname','$group','$mobileNo','$address','$status','$email')";

if ($conn->query($sql) === TRUE) {
echo ("New Guest added successfully");
}

?>
