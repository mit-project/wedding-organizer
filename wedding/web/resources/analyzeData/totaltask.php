<?php
include 'config.php';
session_start();
$email = $_SESSION['email'];

$sql="SELECT COUNT(id) AS totaltask FROM checklist WHERE user_name='$email' OR user_name='admin'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows1=$values['totaltask'];

$sql1="SELECT COUNT(id) AS taskComplete FROM checklist WHERE (user_name='$email' OR user_name='admin') AND status='Complete'";
$result1=mysqli_query($conn,$sql1);
$values1=mysqli_fetch_assoc($result1);
$num_rows2=$values1['taskComplete'];

$sqlp="SELECT COUNT(id) AS taskPending FROM checklist WHERE (user_name='$email' OR user_name='admin') AND status='Pending'";
$resultp=mysqli_query($conn,$sqlp);
$valuesp=mysqli_fetch_assoc($resultp);
$num_rowsp=$valuesp['taskPending'];

$percentage = round(($num_rows2/$num_rows1) * 100,1);

$sql3="SELECT COUNT(id) AS venue FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Venue'";
$result3=mysqli_query($conn,$sql3);
$values3=mysqli_fetch_assoc($result3);
$venue=$values3['venue'];

$sql4="SELECT COUNT(id) AS catering FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Catering'";
$result4=mysqli_query($conn,$sql4);
$values4=mysqli_fetch_assoc($result4);
$catering=$values4['catering'];

$sql5="SELECT COUNT(id) AS photography FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Photography'";
$result5=mysqli_query($conn,$sql5);
$values5=mysqli_fetch_assoc($result5);
$photography=$values5['photography'];

$sql6="SELECT COUNT(id) AS flower FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Flowers & Decoration'";
$result6=mysqli_query($conn,$sql6);
$values6=mysqli_fetch_assoc($result6);
$flower=$values6['flower'];

$sql7="SELECT COUNT(id) AS cake FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Wedding cake'";
$result7=mysqli_query($conn,$sql7);
$values7=mysqli_fetch_assoc($result7);
$cake=$values7['cake'];

$sql8="SELECT COUNT(id) AS beauty FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Health & Beauty'";
$result8=mysqli_query($conn,$sql8);
$values8=mysqli_fetch_assoc($result8);
$beauty=$values8['beauty'];

$sql9="SELECT COUNT(id) AS videography FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Videography'";
$result9=mysqli_query($conn,$sql9);
$values9=mysqli_fetch_assoc($result9);
$videography=$values9['videography'];

$sql10="SELECT COUNT(id) AS music FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='DJ/bands'";
$result10=mysqli_query($conn,$sql10);
$values10=mysqli_fetch_assoc($result10);
$music=$values10['music'];

$sql11="SELECT COUNT(id) AS transport FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Transportation'";
$result11=mysqli_query($conn,$sql11);
$values11=mysqli_fetch_assoc($result11);
$transport=$values11['transport'];

$sql12="SELECT COUNT(id) AS jewelry FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Jewelry'";
$result12=mysqli_query($conn,$sql12);
$values12=mysqli_fetch_assoc($result12);
$jewelry=$values12['jewelry'];

$sql13="SELECT COUNT(id) AS invitation FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Wedding invitation'";
$result13=mysqli_query($conn,$sql13);
$values13=mysqli_fetch_assoc($result13);
$invitation=$values13['invitation'];

$sql14="SELECT COUNT(id) AS bridal FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Bridal Accessories'";
$result14=mysqli_query($conn,$sql14);
$values14=mysqli_fetch_assoc($result14);
$bridal=$values14['bridal'];

$sql15="SELECT COUNT(id) AS groom FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Groom Accessories'";
$result15=mysqli_query($conn,$sql15);
$values15=mysqli_fetch_assoc($result15);
$groom=$values15['groom'];

$sql16="SELECT COUNT(id) AS other FROM checklist WHERE (user_name='$email' OR user_name='admin') AND category='Other'";
$result16=mysqli_query($conn,$sql16);
$values16=mysqli_fetch_assoc($result16);
$other=$values16['other'];

?>