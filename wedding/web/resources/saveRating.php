<?php
include 'config.php';
session_start();
$email= $_SESSION['email'];

if(!empty($_POST['vendorId']) && !empty($_POST['rating'])){

$vendorId = $_POST['vendorId'];
$title = $_POST['title'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];
$vendorMail = $_POST['vendorMail'];
$name = $_POST['name'];


$sql = "INSERT INTO reviews (vendor_id, username,vendorMail,Name, ratingNumber, title, comment) VALUES ('$vendorId','$email','$vendorMail','$name','$rating','$title','$comment')";
if ($conn->query($sql) === TRUE) {
echo "rating saved!";
header("refresh:2");
}
}
?>