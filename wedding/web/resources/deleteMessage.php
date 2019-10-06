<?php
include 'config.php';
if(isset($_GET['del_id'])){
$id=$_GET['del_id'];

$conn->query("DELETE FROM reply WHERE id=$id") or die($conn->error);
header("Location:messages.php");
}
?>