<?php
session_start();
error_reporting(0);
require ("includes/config.php");
if(strlen($_SESSION['mlogin'])==0)
    {   
header('location:../index.php');
}
else{
if(isset($_POST['submitchild'])){
	
	$id = filter_var($_SESSION['mlogin'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$firstname1 = filter_var($_POST['firstname1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$middlename1 = filter_var($_POST['middlename1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$lastname1 = filter_var($_POST['lastname1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$dob1 = filter_var($_POST['dob1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$id1 = filter_var($_POST['id1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$age1 = filter_var($_POST['age1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$gender1 = filter_var($_POST['gender1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$email1 = filter_var($_POST['email1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$mobileno1 = filter_var($_POST['mobileno1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
		
	
		$sql =mysqli_query($link,"UPDATE tblchildren SET FirstName='".$firstname1."',MiddleName='".$middlename1."',LastName='".$lastname1."',
		DOB='".$dob1."',ID_No='".$id1."',Age='".$age1."',Gender='".$gender1."',
		Email='".$email1."',MobileNo='".$mobileno1."' WHERE MemberId='".$id."' LIMIT 1") ;
		
		echo "<script>
	if(confirm('Details Submited  Successfully. Please Wait for Admin Approval.')){
		window.location = 'logout.php';
	}
	</script>";
	
	
	}
					
	}
if(isset($_POST['submitandadd'])){
	
	$id = filter_var($_SESSION['mlogin'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$firstname1 = filter_var($_POST['firstname1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$middlename1 = filter_var($_POST['middlename1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$lastname1 = filter_var($_POST['lastname1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$dob1 = filter_var($_POST['dob1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$id1 = filter_var($_POST['id1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$age1 = filter_var($_POST['age1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$gender1 = filter_var($_POST['gender1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$email1 = filter_var($_POST['email1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$mobileno1 = filter_var($_POST['mobileno1'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$institution=45454545;
	
		
	
		$sql ="INSERT INTO tblchildren(FirstName,MiddleName,LastName,DOB,ID_No,Age,Gender,Email,MobileNo,MemberId,InstitutionID) 
		VALUES ('".$firstname1."','".$middlename1."','".$lastname1."','".$dob1."','".$id1."','".$age1."','".$gender1."','".$email1."','".$mobileno1."','".$id."','".$institution."')";
		if(mysqli_query($link,$sql)){	
		
header('location:childrendetails.php?success');
	
	}
		else{
			echo "ERROR: COULD NOT EXECUTE $sql,".
		mysqli_error($link);
		}
					
	}




?>