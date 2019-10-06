<?php
include 'config.php';
session_start();

$email=$_SESSION['email'];
$name=$_POST['name'];
$Taskname=$_POST['Taskname'];
$contactNo=$_POST['contactNo'];
$AssignDate=$_POST['AssignDate'];
$DueDate=$_POST['DueDate'];
$taskStatus=$_POST['taskStatus'];

$sql = "INSERT INTO task(Name,Taskname,Contactno,Assigndate,Duedate,Status,user_name) VALUES('$name','$Taskname','$contactNo','$AssignDate','$DueDate','$taskStatus','$email')";
if ($conn->query($sql) === TRUE) {
echo ("Assign task successfully");
}
?>