<?php


include 'config.php';
$email = $_SESSION['email'];

$sql = "SELECT * FROM wedding_details WHERE user_name='$email'";
$result = mysqli_query($conn, $sql);
//var_dump($result);die;
?>