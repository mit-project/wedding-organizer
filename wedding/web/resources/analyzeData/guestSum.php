<?php
session_start();
include 'config.php';

$email = $_SESSION['email'];
$sql="SELECT COUNT(id) AS totalinvite FROM guest WHERE user_name='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalinvite'];

$sql1="SELECT COUNT(id) AS totalAttending FROM guest WHERE user_name='$email' AND status='attending'";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows1=$values1['totalAttending'];

$sql2="SELECT COUNT(id) AS totalpending FROM guest WHERE user_name='$email' AND status='pending'";
$result2=mysqli_query($conn,$sql2);
$values2=mysqli_fetch_assoc($result2);
$num_rows2=$values2['totalpending'];

$sql3="SELECT COUNT(id) AS totaldecline FROM guest WHERE user_name='$email' AND status='declined'";
$result3=mysqli_query($conn,$sql3);
$values3=mysqli_fetch_assoc($result3);
$num_rows3=$values3['totaldecline'];

?>