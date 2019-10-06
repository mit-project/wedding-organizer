<?php
include 'config.php';
session_start();

$email=$_SESSION['email'];
$Tname=$_POST['Tname'];
$category=$_POST['category'];
$sql = "INSERT INTO checklist(Taskname,category,status,user_name) VALUES ('$Tname','$category','Pending','$email')";
if ($conn->query($sql) === TRUE) {
echo ("Data inserted successfully");
}

?>