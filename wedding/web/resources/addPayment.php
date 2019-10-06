<?php
include 'config.php';
session_start();
$email = $_SESSION['email'];
           $expense=$_POST['expense'];
		   $category=$_POST['category'];
		   $amount=$_POST['amount'];
		   $paymentDate=$_POST['paymentDate'];
		   $name=$_POST['name'];
		   $payMethod=$_POST['payMethod'];
		   
$sql = "INSERT INTO payment(Expense,Category,Amount,Paymentdate,Payer,PaymentMethod,user_name) VALUES ('$expense','$category','$amount','$paymentDate','$name','$payMethod','$email')";

if ($conn->query($sql) === TRUE) {
echo ("Add payment successfully");
}


?>