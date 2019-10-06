<?php
include 'config.php';
session_start();
$email = $_SESSION['email'];

$businessName = $_POST['businessName'];
$contactPerson = $_POST['contactPerson'];
$contactNo = $_POST['contactNo'];
$category = $_POST['category'];
$city = $_POST['city'];
$image = $_POST['image'];
$vendor_id = $_POST['vendor_id'];
$vendorMail = $_POST['vendorMail'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phoneNo = $_POST['phoneNo'];


$sql = "INSERT INTO hired_vendors (businessName,contactPerson,Contactno,vendorMail,image,clientName,clientContact,category,vendor_id,status,user_name) VALUES ('$businessName','$contactPerson','$contactNo','$vendorMail','$image','$fname $lname','$phoneNo','$category','$vendor_id','HIRED','$email')";


if ($conn->query($sql) === TRUE) {
echo "You have successfully mark this vendor as hired";

	}
?>