<?php
session_start();
error_reporting(0);
include('includes/dataexport.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}
else{
	$iid=$_SESSION['ilogin'];
$query = "SELECT Id,FirstName,MiddleName,LastName,MemberId,MemberNo,EmailId,Phonenumber FROM tblmembers where InstitutionID=$iid and RegService=1";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=CardRegistered.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('No', 'First Name','Middle Name', 'Last Name','Member ID','Member No','Email','Mobile Number'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>
<?php } ?>