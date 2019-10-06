<?php
session_start();
include 'config.php';

$email = $_SESSION['email'];
$sql="SELECT COUNT(id) AS totalTaskassign FROM task WHERE user_name='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['totalTaskassign'];

$sql1="SELECT COUNT(id) AS taskdone FROM task WHERE user_name='$email' AND status='done'";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows1=$values1['taskdone'];

$sql2="SELECT COUNT(id) AS taskpending FROM task WHERE user_name='$email' AND status='pending'";
$result2=mysqli_query($conn,$sql2);
$values2=mysqli_fetch_assoc($result2);
$num_rows2=$values2['taskpending'];


?>