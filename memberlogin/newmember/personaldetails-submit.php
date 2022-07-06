<?php
session_start();
error_reporting(0);
require ("includes/config.php");
if(strlen($_SESSION['mlogin'])==0)
    {   
header('location:../index.php');
}
else{
if(isset($_POST['add'])){
	
	$id = filter_var($_SESSION['mlogin'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$mobile = filter_var($_POST['mobile'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$marriagestatus = filter_var($_POST['marriagestatus'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$marriagetype = filter_var($_POST['marriagetype'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$eventdate = filter_var($_POST['eventdate'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$address = filter_var($_POST['address'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$postalcode = filter_var($_POST['postalcode'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$town = filter_var($_POST['town'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$country = filter_var($_POST['country'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$residenceaddress = filter_var($_POST['residenceaddress'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$houseno = filter_var($_POST['houseno'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$estate = filter_var($_POST['estate'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$road = filter_var($_POST['road'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$hometown = filter_var($_POST['hometown'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$homecounty = filter_var($_POST['homecounty'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$homecountry = filter_var($_POST['homecountry'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$district = filter_var($_POST['district'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$jumuia = filter_var($_POST['jumuia'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$cell = filter_var($_POST['cell'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$status=1;
	 $sql = mysqli_query($link,"UPDATE tblmembers set Residence='".$residenceaddress."',HouseNumber='".$houseno."',Estate='".$estate."',
	 Road='".$road."',Town='".$hometown."',County='".$homecounty."',Country='".$homecountry."',Address='".$address."',PostalCode='".$postalcode."',
	 PostalTown='".$town."',PostalCountry='".$country."',PhoneNumber='".$mobile."',Status='".$status."',MaritalStatus='".$marriagestatus."',
	 MarriageType='".$marriagetype."',MarriageDate='".$eventdate."',District='".$district."',Cell='".$cell."',Jumuia='".$jumuia."'  WHERE MemberId='".$id."'  LIMIT 1");

	
	header('location:workdetails.php?success');


}
}
?>