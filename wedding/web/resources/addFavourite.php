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

$sql = "INSERT INTO favourite (businessName,contact_person,Contactno,category,city,image,user_name,vendor_id,status) VALUES ('$businessName','$contactPerson','$contactNo','$category','$city','$image','$email','$vendor_id','SAVED')";
if ($conn->query($sql) === TRUE) {
echo "Vendor add to favourite";

}
?>