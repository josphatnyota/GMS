<?php
session_start();
error_reporting(0);
require ("includes/config.php");
if(strlen($_SESSION['mlogin'])==0)
    {   
header('location:../index.php');
}
else{
if(isset($_POST['submitfamilydetails'])){
	
	$id = filter_var($_SESSION['mlogin'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$middlename = filter_var($_POST['middlename'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$dob = filter_var($_POST['dob'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$age = filter_var($_POST['age'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$gender = filter_var($_POST['gender'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$idno = filter_var($_POST['idno'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$phonenumber = filter_var($_POST['phonenumber'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$now = filter_var($_POST['now'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$employer = filter_var($_POST['employer'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$businessname = filter_var($_POST['businessname'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$rank = filter_var($_POST['rank'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$building = filter_var($_POST['building'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$worktown = filter_var($_POST['worktown'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workroad = filter_var($_POST['workroad'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workcounty = filter_var($_POST['workcounty'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workcountry = filter_var($_POST['workcountry'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workaddress = filter_var($_POST['workaddress'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workpostalcode = filter_var($_POST['workpostalcode'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$worktown2 = filter_var($_POST['worktown2'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workcounty2 = filter_var($_POST['workcounty2'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workcountry2 = filter_var($_POST['workcountry2'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workemail = filter_var($_POST['workemail'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workphonenumber = filter_var($_POST['workphonenumber'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$workotherphonenumber = filter_var($_POST['workotherphonenumber'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

		
	
		$sql = mysqli_query($link,"UPDATE tblfamilydetails SET FirstName='".$firstname."',MiddleName='".$middlename."',LastName='".$lastname."',DOB='".$dob."',PassportId='".$idno."',Age='".$age."',
		Gender='".$gender."',Email='".$email."',MobileNo='".$phonenumber."',NatureOfWork='".$now."',Employer='".$employer."',BusinessName='".$businessname."',
		Rank='".$rank."',WorkBuilding='".$building."',WorkRoad='".$workroad."',WorkTown='".$worktown."',WorkCounty='".$workcounty."',
		WorkCountry='".$workcountry."',WorkPostalAddress='".$workaddress."',WorkPostalCode='".$workpostalcode."',WorkTownAddress='".$worktown2."',
		WorkCountyAddress='".$workcounty2."',WorkCountryAddress='".$workcountry2."',WorkEmail='".$workemail."',WorkMobileNo='".$workphonenumber."',
		WorkOtherNo='".$workotherphonenumber."' WHERE MemId='".$id."' LIMIT 1") ;
			
		
		header('location:childrendetails.php?success');
		
	
	
					
	}
}


?>