<?php
include '../vendor/config.php';
if(isset($_GET['del_id'])){
$id=$_GET['del_id'];

$conn->query("DELETE FROM photos WHERE id=$id") or die($conn->error);
header("Location:photos.php");
}
?>