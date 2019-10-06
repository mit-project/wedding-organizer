<?php
include 'config.php';


$Name = $_POST['Name'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];


$sql = "INSERT INTO admin_register(Name, Phone, Email,Password) VALUES ('$Name', '$Phone', '$Email','$Password')";

if ($conn->query($sql) === TRUE) {
    echo ("You have successfully registered ..");
 }  

?>
