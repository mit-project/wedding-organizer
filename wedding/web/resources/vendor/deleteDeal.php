<?php
include '../vendor/config.php';
if(isset($_GET['del_id'])){
$id=$_GET['del_id'];

$conn->query("DELETE FROM new_deal WHERE id=$id") or die($conn->error);
header("Location:deals.php");
}
?>