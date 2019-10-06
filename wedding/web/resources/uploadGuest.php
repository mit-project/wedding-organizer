<?php
include 'config.php';
session_start();


if( $_FILES['myFile']['name']){
$filename = explode('.',$_FILES['myFile']['name']);
if($filename[1] == 'csv'){
$handle = fopen($_FILES['myFile']['tmp_name'], "r");
while($data = fgetcsv($handle)){
$No = mysqli_real_escape_string($conn, $data[0]);
$firstname = mysqli_real_escape_string($conn, $data[1]);
$lastname =  mysqli_real_escape_string($conn, $data[2]);
$familySide = mysqli_real_escape_string($conn, $data[3]);
$mobileNo = mysqli_real_escape_string($conn, $data[4]);
$address = mysqli_real_escape_string($conn, $data[5]);
$status = mysqli_real_escape_string($conn, $data[6]);
$email = $_SESSION['email'];
$sql = "INSERT INTO guest(No,firstname,lastname,familySide,mobileNo,Address,status,user_name) VALUES                                             ('$No','$firstname','$lastname','$familySide','$mobileNo','$address','$status','$email')";
mysqli_query($conn, $sql);
}
fclose($handle);
echo ("Import guest list successfully");
}

else{
echo "Please Select CSV files only";
}
}
else{
echo "Please select the File";
}


?>