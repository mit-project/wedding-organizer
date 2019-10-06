<?php
include 'config.php';

$budget_id=$_POST['budget_id'];
$expense=$_POST['expense'];
$category=$_POST['category'];
$Ecost=$_POST['Ecost'];
$Fcost=$_POST['Fcost'];
$Duedate=$_POST['Duedate'];

$sql = "UPDATE budget SET Expense='$expense',category='$category',Estimatedcost='$Ecost',Finalcost='$Fcost',PaymentDueBy='$Duedate' WHERE id=$budget_id";

if ($conn->query($sql) === TRUE) {
echo ("Update record successfully");
}
?>