<?php
include 'config.php';
session_start();
$email = $_SESSION['email'];

$sql="SELECT SUM(Estimatedcost) AS estimate FROM budget WHERE user_name='$email'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['estimate'];

$sql1="SELECT SUM(Finalcost) AS totalcost FROM budget WHERE user_name='$email'";
$result1=mysqli_query($conn,$sql1);
$values=mysqli_fetch_assoc($result1);
$num_rows1=$values['totalcost'];

$sql2="SELECT SUM(Amount) AS totalpaid FROM payment WHERE user_name='$email'";
$result2=mysqli_query($conn,$sql2);
$values2=mysqli_fetch_assoc($result2);
$num_rows2=$values2['totalpaid'];

$sql3="SELECT SUM(Estimatedcost) AS VenueEstimatedCost FROM budget WHERE user_name='$email' AND category='Venue'";
$result3=mysqli_query($conn,$sql3);
$values3=mysqli_fetch_assoc($result3);
$num_rows3=$values3['VenueEstimatedCost'];

$sql4="SELECT SUM(Finalcost) AS VenueFinalCost FROM budget WHERE user_name='$email' AND category='Venue'";
$result4=mysqli_query($conn,$sql4);
$values4=mysqli_fetch_assoc($result4);
$num_rows4=$values4['VenueFinalCost'];

$sql5="SELECT SUM(Amount) AS VenuePaid FROM payment WHERE user_name='$email' AND Category='Venue'";
$result5=mysqli_query($conn,$sql5);
$values5=mysqli_fetch_assoc($result5);
$num_rows5=$values5['VenuePaid'];

$sql6="SELECT SUM(Estimatedcost) AS BridalEstimatedCost FROM budget WHERE user_name='$email' AND category='Bridal Accessories'";
$result6=mysqli_query($conn,$sql6);
$values6=mysqli_fetch_assoc($result6);
$num_rows6=$values6['BridalEstimatedCost'];

$sql7="SELECT SUM(Finalcost) AS BridalFinalCost FROM budget WHERE user_name='$email' AND category='Bridal Accessories'";
$result7=mysqli_query($conn,$sql7);
$values7=mysqli_fetch_assoc($result7);
$num_rows7=$values7['BridalFinalCost'];

$sql8="SELECT SUM(Amount) AS BridalPaid FROM payment WHERE user_name='$email' AND Category='Bridal Accessories'";
$result8=mysqli_query($conn,$sql8);
$values8=mysqli_fetch_assoc($result8);
$num_rows8=$values8['BridalPaid'];

$sql9="SELECT SUM(Estimatedcost) AS cakeEstimatedCost FROM budget WHERE user_name='$email' AND category='Wedding cake'";
$result9=mysqli_query($conn,$sql9);
$values9=mysqli_fetch_assoc($result9);
$num_rows9=$values9['cakeEstimatedCost'];

$sql10="SELECT SUM(Finalcost) AS cakeFinalCost FROM budget WHERE user_name='$email' AND category='Wedding cake'";
$result10=mysqli_query($conn,$sql10);
$values10=mysqli_fetch_assoc($result10);
$num_rows10=$values10['cakeFinalCost'];

$sql11="SELECT SUM(Amount) AS cakePaid FROM payment WHERE user_name='$email' AND Category='Wedding cake'";
$result11=mysqli_query($conn,$sql11);
$values11=mysqli_fetch_assoc($result11);
$num_rows11=$values11['cakePaid'];

$sql12="SELECT SUM(Estimatedcost) AS cateringEstimatedCost FROM budget WHERE user_name='$email' AND category='Catering'";
$result12=mysqli_query($conn,$sql12);
$values12=mysqli_fetch_assoc($result12);
$num_rows12=$values12['cateringEstimatedCost'];

$sql13="SELECT SUM(Finalcost) AS cateringFinalCost FROM budget WHERE user_name='$email' AND category='Catering'";
$result13=mysqli_query($conn,$sql13);
$values13=mysqli_fetch_assoc($result13);
$num_rows13=$values13['cateringFinalCost'];

$sql14="SELECT SUM(Amount) AS cateringPaid FROM payment WHERE user_name='$email' AND Category='Catering'";
$result14=mysqli_query($conn,$sql14);
$values14=mysqli_fetch_assoc($result14);
$num_rows14=$values14['cateringPaid'];

$sql15="SELECT SUM(Estimatedcost) AS djEstimatedCost FROM budget WHERE user_name='$email' AND category='DJ/bands'";
$result15=mysqli_query($conn,$sql15);
$values15=mysqli_fetch_assoc($result15);
$num_rows15=$values15['djEstimatedCost'];

$sql16="SELECT SUM(Finalcost) AS djFinalCost FROM budget WHERE user_name='$email' AND category='DJ/bands'";
$result16=mysqli_query($conn,$sql16);
$values16=mysqli_fetch_assoc($result16);
$num_rows16=$values16['djFinalCost'];

$sql17="SELECT SUM(Amount) AS djPaid FROM payment WHERE user_name='$email' AND Category='DJ/bands'";
$result17=mysqli_query($conn,$sql17);
$values17=mysqli_fetch_assoc($result17);
$num_rows17=$values17['djPaid'];

$sql18="SELECT SUM(Estimatedcost) AS flowerEstimatedCost FROM budget WHERE user_name='$email' AND category='Flowers & Decoration'";
$result18=mysqli_query($conn,$sql18);
$values18=mysqli_fetch_assoc($result18);
$num_rows18=$values18['flowerEstimatedCost'];

$sql19="SELECT SUM(Finalcost) AS flowerFinalCost FROM budget WHERE user_name='$email' AND category='Flowers & Decoration'";
$result19=mysqli_query($conn,$sql19);
$values19=mysqli_fetch_assoc($result19);
$num_rows19=$values19['flowerFinalCost'];

$sql20="SELECT SUM(Amount) AS flowerPaid FROM payment WHERE user_name='$email' AND Category='Flowers & Decoration'";
$result20=mysqli_query($conn,$sql20);
$values20=mysqli_fetch_assoc($result20);
$num_rows20=$values20['flowerPaid'];

$sql21="SELECT SUM(Estimatedcost) AS groomEstimatedCost FROM budget WHERE user_name='$email' AND category='Groom Accessories'";
$result21=mysqli_query($conn,$sql21);
$values21=mysqli_fetch_assoc($result21);
$num_rows21=$values21['groomEstimatedCost'];

$sql22="SELECT SUM(Finalcost) AS groomFinalCost FROM budget WHERE user_name='$email' AND category='Groom Accessories'";
$result22=mysqli_query($conn,$sql22);
$values22=mysqli_fetch_assoc($result22);
$num_rows22=$values22['groomFinalCost'];

$sql23="SELECT SUM(Amount) AS groomPaid FROM payment WHERE user_name='$email' AND Category='Groom Accessories'";
$result23=mysqli_query($conn,$sql23);
$values23=mysqli_fetch_assoc($result23);
$num_rows23=$values23['groomPaid'];

$sql24="SELECT SUM(Estimatedcost) AS healthEstimatedCost FROM budget WHERE user_name='$email' AND category='Health & Beauty'";
$result24=mysqli_query($conn,$sql24);
$values24=mysqli_fetch_assoc($result24);
$num_rows24=$values24['healthEstimatedCost'];

$sql25="SELECT SUM(Finalcost) AS healthFinalCost FROM budget WHERE user_name='$email' AND category='Health & Beauty'";
$result25=mysqli_query($conn,$sql25);
$values25=mysqli_fetch_assoc($result25);
$num_rows25=$values25['healthFinalCost'];

$sql26="SELECT SUM(Amount) AS healthPaid FROM payment WHERE user_name='$email' AND Category='Health & Beauty'";
$result26=mysqli_query($conn,$sql26);
$values26=mysqli_fetch_assoc($result26);
$num_rows26=$values26['healthPaid'];

$sql27="SELECT SUM(Estimatedcost) AS invitationEstimatedCost FROM budget WHERE user_name='$email' AND category='Wedding invitation'";
$result27=mysqli_query($conn,$sql27);
$values27=mysqli_fetch_assoc($result27);
$num_rows27=$values27['invitationEstimatedCost'];

$sql28="SELECT SUM(Finalcost) AS invitationFinalCost FROM budget WHERE user_name='$email' AND category='Wedding invitation'";
$result28=mysqli_query($conn,$sql28);
$values28=mysqli_fetch_assoc($result28);
$num_rows28=$values28['invitationFinalCost'];

$sql29="SELECT SUM(Amount) AS invitationPaid FROM payment WHERE user_name='$email' AND Category='Wedding invitation'";
$result29=mysqli_query($conn,$sql29);
$values29=mysqli_fetch_assoc($result29);
$num_rows29=$values29['invitationPaid'];

$sql30="SELECT SUM(Estimatedcost) AS JeweleryEstimatedCost FROM budget WHERE user_name='$email' AND category='Jewelery'";
$result30=mysqli_query($conn,$sql30);
$values30=mysqli_fetch_assoc($result30);
$num_rows30=$values30['JeweleryEstimatedCost'];

$sql31="SELECT SUM(Finalcost) AS JeweleryFinalCost FROM budget WHERE user_name='$email' AND category='Jewelery'";
$result31=mysqli_query($conn,$sql31);
$values31=mysqli_fetch_assoc($result31);
$num_rows31=$values31['JeweleryFinalCost'];

$sql32="SELECT SUM(Amount) AS JeweleryPaid FROM payment WHERE user_name='$email' AND Category='Jewelery'";
$result32=mysqli_query($conn,$sql32);
$values32=mysqli_fetch_assoc($result32);
$num_rows32=$values32['JeweleryPaid'];

$sql33="SELECT SUM(Estimatedcost) AS OfficiantEstimatedCost FROM budget WHERE user_name='$email' AND category='Officiant'";
$result33=mysqli_query($conn,$sql33);
$values33=mysqli_fetch_assoc($result33);
$num_rows33=$values33['OfficiantEstimatedCost'];

$sql34="SELECT SUM(Finalcost) AS OfficiantFinalCost FROM budget WHERE user_name='$email' AND category='Officiant'";
$result34=mysqli_query($conn,$sql34);
$values34=mysqli_fetch_assoc($result34);
$num_rows34=$values34['OfficiantFinalCost'];

$sql35="SELECT SUM(Amount) AS OfficiantPaid FROM payment WHERE user_name='$email' AND Category='Officiant'";
$result35=mysqli_query($conn,$sql35);
$values35=mysqli_fetch_assoc($result35);
$num_rows35=$values35['OfficiantPaid'];

$sql36="SELECT SUM(Estimatedcost) AS OtherEstimatedCost FROM budget WHERE user_name='$email' AND category='Other'";
$result36=mysqli_query($conn,$sql36);
$values36=mysqli_fetch_assoc($result36);
$num_rows36=$values36['OtherEstimatedCost'];

$sql37="SELECT SUM(Finalcost) AS OtherFinalCost FROM budget WHERE user_name='$email' AND category='Other'";
$result37=mysqli_query($conn,$sql37);
$values37=mysqli_fetch_assoc($result37);
$num_rows37=$values37['OtherFinalCost'];

$sql38="SELECT SUM(Amount) AS OtherPaid FROM payment WHERE user_name='$email' AND Category='Other'";
$result38=mysqli_query($conn,$sql38);
$values38=mysqli_fetch_assoc($result38);
$num_rows38=$values38['OtherPaid'];

$sql39="SELECT SUM(Estimatedcost) AS PhotographyEstimatedCost FROM budget WHERE user_name='$email' AND category='Photography'";
$result39=mysqli_query($conn,$sql39);
$values39=mysqli_fetch_assoc($result39);
$num_rows39=$values39['PhotographyEstimatedCost'];

$sql40="SELECT SUM(Finalcost) AS PhotographyFinalCost FROM budget WHERE user_name='$email' AND category='Photography'";
$result40=mysqli_query($conn,$sql40);
$values40=mysqli_fetch_assoc($result40);
$num_rows40=$values40['PhotographyFinalCost'];

$sql41="SELECT SUM(Amount) AS PhotographyPaid FROM payment WHERE user_name='$email' AND Category='Photography'";
$result41=mysqli_query($conn,$sql41);
$values41=mysqli_fetch_assoc($result41);
$num_rows41=$values41['PhotographyPaid'];

$sql42="SELECT SUM(Estimatedcost) AS TransportationEstimatedCost FROM budget WHERE user_name='$email' AND category='Transportation'";
$result42=mysqli_query($conn,$sql42);
$values42=mysqli_fetch_assoc($result42);
$num_rows42=$values42['TransportationEstimatedCost'];

$sql43="SELECT SUM(Finalcost) AS TransportationFinalCost FROM budget WHERE user_name='$email' AND category='Transportation'";
$result43=mysqli_query($conn,$sql43);
$values43=mysqli_fetch_assoc($result43);
$num_rows43=$values43['TransportationFinalCost'];

$sql44="SELECT SUM(Amount) AS TransportationPaid FROM payment WHERE user_name='$email' AND Category='Transportation'";
$result44=mysqli_query($conn,$sql44);
$values44=mysqli_fetch_assoc($result44);
$num_rows44=$values44['TransportationPaid'];

$sql45="SELECT SUM(Estimatedcost) AS VideographyEstimatedCost FROM budget WHERE user_name='$email' AND category='Videography'";
$result45=mysqli_query($conn,$sql45);
$values45=mysqli_fetch_assoc($result45);
$num_rows45=$values45['VideographyEstimatedCost'];

$sql46="SELECT SUM(Finalcost) AS VideographyFinalCost FROM budget WHERE user_name='$email' AND category='Videography'";
$result46=mysqli_query($conn,$sql46);
$values46=mysqli_fetch_assoc($result46);
$num_rows46=$values46['VideographyFinalCost'];

$sql47="SELECT SUM(Amount) AS VideographyPaid FROM payment WHERE user_name='$email' AND Category='Videography'";
$result47=mysqli_query($conn,$sql47);
$values47=mysqli_fetch_assoc($result47);
$num_rows47=$values47['VideographyPaid'];
?>