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
$query = "SELECT Id,FirstName,MiddleName,LastName,EmailId,MemberId,MemberNo,Phonenumber,Gender,DOB,District,Jumuia,Cell,MaritalStatus,MarriageType,
MarriageDate,Address,PostalCode,PostalTown,PostalCountry,Residence,HouseNumber,Estate,Road,Town,County,Country,NatureOfWork,
BusinessName,Rank,Employer,WorkBuilding,WorkRoad,WorkTown,WorkCounty,WorkCountry,WorkPostalAddress,WorkPostalCode,
WorkTownAddress,WorkCountyAddress,WorkCountryAddress,WorkEmail,WorkMobileNo,WorkOtherNumber,
CommitteeName,Position,StartServing,EndServing FROM tblmembers where InstitutionID=$iid";
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
header('Content-Disposition: attachment; filename=AllMembers.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('No', 'First Name','Middle Name', 'Last Name', 'Email','Member ID','Member No','Mobile No','Gender','Date of Birth',
'District','Jumuia','Cell','Marital Status','Wedding Type','Event Day','Postal Address','Code','Town','Country','Residence','House Number','Estate',
'Road','Town','County','Country','Nature of Work','Business Name','Rank','Employer','Work Building','Work Road','Work Town','Work County',
'Work Country','Work Postal Address','Code','Town','County','Country','Work Email','Work Mobile No.','Work Telephone No.','Committee Name',
'Position','Start Serving','End Serving'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>
<?php } ?>