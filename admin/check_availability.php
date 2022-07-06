<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(!empty($_POST["membernumber"])) {
	$membernumber=$_POST["membernumber"];
$sql ="SELECT UserID FROM tblinstitution WHERE UserID=:membernumber ";
$query= $dbh->prepare($sql);
$query-> bindParam(':membernumber',$membernumber, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
echo "<span style='color:red'> UserID already exists .</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> UserID available for Registration .</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
}
}






?>
<?php } ?>