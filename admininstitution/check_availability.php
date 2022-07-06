<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}
else{
if(!empty($_POST["membernumber"])) {
	$membernumber=$_POST["membernumber"];
$sql ="SELECT MemberNo FROM tblmembers WHERE MemberNo=:membernumber";
$query= $dbh->prepare($sql);
$query-> bindParam(':membernumber',$membernumber, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
echo "<span style='color:red'> Member Number already exists .</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> Member Number available for Registration .</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
}
}

// code for emailid availablity
if(!empty($_POST["memberid"])) {
$memberid= $_POST["memberid"];
$sql ="SELECT MemberId FROM tblmembers WHERE MemberId=:memberid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':memberid',$memberid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Member ID already exists .</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> Member ID available for Registration .</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
}
}




?>
<?php } ?>