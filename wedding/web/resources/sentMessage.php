<?php
include 'config.php';

$senderName = $_POST['name'];
$mail = $_POST['email'];
$phone = $_POST['phone'];
$weddingDate = $_POST['date'];
$message = $_POST['message'];
$contactMethod = $_POST['contact'];
$vendorMail = $_POST['vendorMail'];
$vendor_id = $_POST['vendor_id'];
$receiverName = $_POST['receiverName'];
$Name = $_POST['Name'];

$sql = "INSERT INTO message(senderName,subject,email,phoneNumber,weddingDate,message,contactMethod,vendorMail,receiverName,vendor_id) VALUES('$senderName','RequestPricing','$mail','$phone','$weddingDate','$message','$contactMethod','$vendorMail','$Name',
'$vendor_id')";

if ($conn->query($sql) === TRUE) {

$sql1 = "INSERT INTO sent_message (senderMail,senderName,receiverMail,receiverName,message) VALUES('$mail','$senderName','$vendorMail','$receiverName','$message')";

if ($conn->query($sql1) === TRUE) {

echo "You have successfully sent the message";
header("refresh:2");
	}
	}
?>