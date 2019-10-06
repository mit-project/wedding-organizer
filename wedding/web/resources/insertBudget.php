<?php
include 'config.php';
session_start();

           $email = $_SESSION['email'];
           $expense=$_POST['expense'];
		   $category=$_POST['category'];
		   $Ecost=$_POST['Ecost'];
		   $Fcost=$_POST['Fcost'];
		   $Duedate=$_POST['Duedate'];
		   
		   
$sql = "INSERT INTO budget(Expense,category,Estimatedcost,Finalcost,PaymentDueBy,user_name) VALUES ('$expense','$category','$Ecost','$Fcost','$Duedate','$email')";

if ($conn->query($sql) === TRUE) {
echo ("New Expense added successfully");
}

?>
