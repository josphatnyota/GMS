<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}
else{
	
function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 300;
    $resizeHeight = 300;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}
 if(isset($_POST['uploadspouse']))
{
	$imageProcess = 0;
    if(is_array($_FILES)) {
		
        $iid=$_SESSION['ilogin'];
        $mid=$_GET['mid'];
	    $image = $_FILES['image']['name'];
        $fileName = $_FILES['image']['tmp_name']; 
		$sql="update tblfamilydetails  set Image=:image where InstitutionID=:iid and MemId=:mid";
	$query = $dbh->prepare($sql);
    $query->bindParam(':image',$image,PDO::PARAM_STR);
    $query->bindParam(':iid',$iid,PDO::PARAM_STR);
    $query->bindParam(':mid',$mid,PDO::PARAM_STR);
	$query->execute();
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $image;
        $uploadPath = "../assets/img/spouse/";
        $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagejpeg($imageLayer,$uploadPath.$resizeFileName);
                break;
 
            
 
            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagepng($imageLayer,$uploadPath.$resizeFileName);
                break;
 
            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($file, $uploadPath. $resizeFileName);
        $imageProcess = 1;
    }
 
	if($imageProcess == 1){
	
		$msg="member updated Successfully";
	
	}else{
			$error="invalid image";

	}
	$imageProcess = 0;
}
 if(isset($_POST['uploadmemberimage']))
{
	$imageProcess = 0;
    if(is_array($_FILES)) {
		
        $iid=$_SESSION['ilogin'];
        $mid=$_GET['mid'];
	    $image = $_FILES['image']['name'];
        $fileName = $_FILES['image']['tmp_name']; 
		$sql="update tblmembers  set Image=:image where InstitutionID=:iid and MemberId=:mid";
	$query = $dbh->prepare($sql);
    $query->bindParam(':image',$image,PDO::PARAM_STR);
    $query->bindParam(':iid',$iid,PDO::PARAM_STR);
    $query->bindParam(':mid',$mid,PDO::PARAM_STR);
	$query->execute();
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $image;
        $uploadPath = "../assets/img/members/";
        $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagejpeg($imageLayer,$uploadPath.$resizeFileName);
                break;
 
            
 
            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagepng($imageLayer,$uploadPath.$resizeFileName);
                break;
 
            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($file, $uploadPath. $resizeFileName);
        $imageProcess = 1;
    }
 
	if($imageProcess == 1){
	
		$msg="member updated Successfully";
	
	}else{
			$error="invalid image";

	}
	$imageProcess = 0;
}
if(isset($_POST['statusupdate']))
{ 
$did=intval($_GET['mid']);
$regstatus=$_POST['updatestatus']; 
$sql="update tblmembers set Status=:regstatus where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':regstatus',$regstatus,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['groupupdate']))
{ 
$did=intval($_GET['mid']);
$updatecommittee=$_POST['updatecommittee']; 
$updateposition=$_POST['updateposition'];  
$sql="update tblmembers set GroupName=:updatecommittee,GroupPosition=:updateposition where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':updateposition',$updateposition,PDO::PARAM_STR);
$query->bindParam(':updatecommittee',$updatecommittee,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['committeeupdate']))
{ 
$did=intval($_GET['mid']);
$updatecommittee=$_POST['updatecommittee']; 
$updateposition=$_POST['updateposition']; 
$updatestartserving=$_POST['updatestartserving']; 
$updateendserving=$_POST['updateendserving']; 
$status=1;
$sql="update tblmembers set ComStatus=:status,CommitteeName=:updatecommittee,Position=:updateposition,StartServing=:updatestartserving,EndServing=:updateendserving where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':updatestartserving',$updatestartserving,PDO::PARAM_STR);
$query->bindParam(':updateendserving',$updateendserving,PDO::PARAM_STR);
$query->bindParam(':updateposition',$updateposition,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':updatecommittee',$updatecommittee,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['grouppositionupdate']))
{ 
$did=intval($_GET['mid']); 
$updateposition=$_POST['updateposition']; 
$updatestartserving=$_POST['updatestartserving']; 
$updateendserving=$_POST['updateendserving']; 
$status=1;
$sql="update tblmembers set GroupPosition=:updateposition,GroupFormer=:updateposition,GroupStart=:updatestartserving,GroupEnd=:updateendserving,GroupStatus=:status where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':updatestartserving',$updatestartserving,PDO::PARAM_STR);
$query->bindParam(':updateendserving',$updateendserving,PDO::PARAM_STR);
$query->bindParam(':updateposition',$updateposition,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['districtupdate']))
{ 
$did=intval($_GET['mid']);
$regstatus=$_POST['updatedistrict']; 
$sql="update tblmembers set District=:regstatus where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':regstatus',$regstatus,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['cellupdate']))
{ 
$did=intval($_GET['mid']);
$regstatus=$_POST['updatecell']; 
$sql="update tblmembers set Cell=:regstatus where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':regstatus',$regstatus,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_GET['mid']))
{
$id=$_GET['mid'];
$sql = "update tblmembers  set CommitteeName='',Position='',ComStatus=0  WHERE MemberId=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Member updated";

}
if(isset($_POST['jumuiaupdate']))
{ 
$did=intval($_GET['mid']);
$regstatus=$_POST['updatejumuia']; 
$sql="update tblmembers set Jumuia=:regstatus where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':regstatus',$regstatus,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['serviceupdate']))
{ 
$did=intval($_GET['mid']);
$regstatus=$_POST['updateservice']; 
$sql="update tblmembers set RegService=:regstatus where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':regstatus',$regstatus,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['subscriptionupdate']))
{ 
$did=intval($_GET['mid']);
$regstatus=$_POST['updatesubscription']; 
$sql="update tblmembers set Subscription=:regstatus where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':regstatus',$regstatus,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['status2update']))
{ 
$did=intval($_GET['mid']);
$regstatus=$_POST['updatestatus2']; 
$sql="update tblmembers set RegStatus=:regstatus where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':regstatus',$regstatus,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
if(isset($_POST['regdateupdate']))
{ 
$did=intval($_GET['mid']);
$regstatus=$_POST['updateregdate']; 
$sql="update tblmembers set ServiceRegDate=:regstatus where MemberId=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':regstatus',$regstatus,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="member updated Successfully";
}
?>
<!DOCTYPE html>
<html lang="en">


<?php include('includes/header2.php');?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<?php include('includes/sidebar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
       
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php include('includes/header.php');?>

      <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Member Profile</h1>                   
			
		  </div>                  <?php 
$iid=$_SESSION['ilogin'];
$mid=$_GET['mid'];
$sql = "SELECT * from tblmembers where MemberId=:mid and InstitutionID=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?> 
		  <div class="btn-group">
		              <a href="#accountstatus" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Account Status</a>
		              <a href="#spousedetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Spouse Details</a>
		              <a href="#childrendetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Children Details</a>
		              <a href="#membershipdetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-bookmark fa-sm text-white-50"></i> Membership Details</a>
		              <a href="#committeedetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> Committee Details</a>
		              <a href="#groupdetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> Group Details</a>
		              <a href="#paymentdetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-dollar fa-sm text-white-50"><h6>$</h6></i> Payment History</a>
</div><?php } } ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                  <?php 
$iid=$_SESSION['ilogin'];
$mid=$_GET['mid'];
$sql = "SELECT * from tblmembers where MemberId=:mid and InstitutionID=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?> 
        <tr>
							<div class="input-field col m4">	  
 <form id="example-form" method="post" enctype="multipart/form-data"  name="updatemp">
        <div>
		<img src="../assets/img/members/<?php echo htmlentities($result->Image);?>" alt="avatar"  style="vertical-align:middle;width:100px;height:100px;max-width:100%;border-radius:300px;">
  	  <input type="file" name="image" accept="image/*" required ></div>
	  	
<button type="submit" name="uploadmemberimage"  id="upload" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">UPLOAD</button>
</form></div>
                                       
                                            <td style="font-size:16px;"> Full Name</td>
                                              <td colspan="3">
                                                <?php echo htmlentities($result->FirstName." ".$result-> MiddleName." ".$result->LastName);?></td>
                                              <td style="font-size:16px;">National ID No.</td>
                                              <td colspan="3"><?php echo htmlentities($result->MemberId);?></td>
											  
                                          </tr>

                                          <tr>
                                             <td style="font-size:16px;">Email</td>
                                            <td  colspan="3"><?php echo htmlentities($result->EmailId);?></td>
                                             <td style="font-size:16px;">Contact No.</td>
                                            <td  colspan="3"><?php echo htmlentities($result->Phonenumber);?></td>
                                            
                                        </tr>

  <tr>
                                              <td style="font-size:16px;">Gender</td>
                                              <td><?php echo htmlentities($result->Gender);?></td>
                                             <td style="font-size:16px;">Date of Birth</td>
                                            <td><?php echo htmlentities($result->DOB);?></td>
                                             <td style="font-size:16px;">Age</td>
                                           <td><?php echo htmlentities($result->Age);?></td>
                                        </tr>

<tr>

                                             <td style="font-size:16px;">Marital Status</td>
                                            <td><?php echo htmlentities($result->MaritalStatus);?></td>
											
                                             <td style="font-size:16px;">Wedding Type</td>
                                            <td><?php echo htmlentities($result->MarriageType);?></td>
                                             <td style="font-size:16px;">Event Date</td>
                                            <td colspan="5"><?php echo htmlentities($result->MarriageDate);?></td>
                                          
                                        </tr>

<tr> <td class="text-center"><h6><b> Postal Address</b></h6></td></tr>
<tr>

                                             <td style="font-size:16px;">Address</td>
                                            <td  colspan="3"><?php echo htmlentities($result->Address);?></td>
                                             <td style="font-size:16px;">Postal Code </td>
                                            <td  colspan="3"><?php echo htmlentities($result->PostalCode);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Town</td>
                                            <td  colspan="3"><?php echo htmlentities($result->PostalTown);?></td>
                                             <td style="font-size:16px;">Country</td>
                                            <td  colspan="3"><?php echo htmlentities($result->PostalCountry);?></td>
</tr>
<tr> <td><h6><b> Residence</b></h6></td></tr>
<tr>

                                             <td style="font-size:16px;"> Residence</td>
                                            <td><?php echo htmlentities($result->Residence);?></td>
                                             <td style="font-size:16px;">House Number</td>
                                            <td><?php echo htmlentities($result->HouseNumber);?></td>
                                             <td style="font-size:16px;">Estate</td>
                                            <td><?php echo htmlentities($result->Estate);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Road</td>
                                            <td><?php echo htmlentities($result->Road);?></td>
                                             <td style="font-size:16px;">Town</td>
                                            <td><?php echo htmlentities($result->Town);?></td>
                                             <td style="font-size:16px;">County</td>
                                            <td><?php echo htmlentities($result->County);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Country</td>
                                            <td><?php echo htmlentities($result->Country);?></td>
</tr>
<tr> <td><h6><b> Work Details</b></h6></td></tr>
<tr>

                                             <td style="font-size:16px;">Nature Of Work</td>
                                            <td><?php echo htmlentities($result->NatureOfWork);?></td>
                                             <td style="font-size:16px;">Business Name</td>
                                            <td><?php echo htmlentities($result->BusinessName);?></td>
                                             <td style="font-size:16px;">Rank</td>
                                            <td><?php echo htmlentities($result->Rank);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Employer</td>
                                            <td><?php echo htmlentities($result->Employer);?></td>
                                             <td style="font-size:16px;">Work Building</td>
                                            <td><?php echo htmlentities($result->WorkBuilding);?></td>
                                             <td style="font-size:16px;">Work Road</td>
                                            <td><?php echo htmlentities($result->WorkRoad);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Work Town</td>
                                            <td><?php echo htmlentities($result->WorkTown);?></td>
                                             <td style="font-size:16px;">Work County</td>
                                            <td><?php echo htmlentities($result->WorkCounty);?></td>
                                             <td style="font-size:16px;">Work Country</td>
                                            <td><?php echo htmlentities($result->WorkCountry);?></td>
</tr>
<tr> <td><h6><b> Work Address</b></h6></td></tr>
<tr>

                                             <td style="font-size:16px;">Address</td>
                                            <td><?php echo htmlentities($result->WorkPostalAddress);?></td>
                                             <td style="font-size:16px;">Postal Code</td>
                                            <td><?php echo htmlentities($result->WorkPostalCode);?></td>
                                             <td style="font-size:16px;">Town</td>
                                            <td><?php echo htmlentities($result->WorkTownAddress);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">County</td>
                                            <td><?php echo htmlentities($result->WorkCountyAddress);?></td>
                                             <td style="font-size:16px;">Country</td>
                                            <td><?php echo htmlentities($result->WorkCountryAddress);?></td>
                                             <td style="font-size:16px;">Email</td>
                                            <td><?php echo htmlentities($result->WorkEmail);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Mobile No.</td>
                                            <td><?php echo htmlentities($result->WorkMobileNo);?></td>
                                             <td style="font-size:16px;">Other Number:</td>
                                            <td><?php echo htmlentities($result->WorkOtherNumber);?></td>
</tr>
<tr>
<div class="btn-group">
<td colspan="1">
  <a href="updatemember.php?id=<?php echo htmlentities($result->MemberId);?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Update</a>
  </td>
  </div>
   </form>                                     </tr>   
<?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
 <div class="container-fluid" id="membershipdetails">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Membership Details</h1>
          </div>    
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Membership</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                  <?php 
$iid=$_SESSION['ilogin'];
$mid=$_GET['mid'];
$sql = "SELECT * from tblmembers where MemberId=:mid and InstitutionID=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?> 
        <tr>
                                       
                                           
											  <td style="font-size:16px;">Member Number</td>
                                              <td><?php echo htmlentities($result->MemberNo);?></td>
											  <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalgroupposition" >Group Position</td></a>
                                              <td><?php echo htmlentities($result->GroupPosition);?></td>
											  
                                          </tr>

                                          <tr>
                                             <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modaldistrict" >District</a></td>
                                            <td><?php echo htmlentities($result->District);?></td>
                                             <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modaljumuia" >Jumuia</a></td>
                                            <td><?php echo htmlentities($result->Jumuia);?></td>
                                           
                                             <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalcell" >Cell</a></td>
                                            <td><?php echo htmlentities($result->Cell);?></td>
                                            
                                        </tr>

  <tr>
                                              <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalservice" >Membership Category</a></td> 
											  <td ><a href="#" data-toggle="modal" data-target="#modalservice" ><?php $stats=$result->RegService;
                                             if($stats==7){
                                             ?>
                                             <span style="color: maroon">New Card</span>
                                              <?php } if($stats==1)  { ?>
                                             <span style="color: blue">Card</span>
                                             <?php } if($stats==2)  { ?>
                                              <span style="color: green">Badge</span>
											  <?php } if($stats==3)  { ?>
                                              <span style="color: orange">Tie and Jacket</span>
											  <?php } if($stats==4)  { ?>
                                              <span style="color: #36b9cc">Follower</span>
											  <?php } if($stats==5)  { ?>
                                              <span style="color: indigo">Scarf</span>
											  <?php } if($stats==6)  { ?>
                                              <span style="color: violet">Full Uniform</span>
											  <?php } if($stats==0)  { ?>
                                              <span style="color: red">Not Registered</span>
											  
                                              <?php }?></a>
                                             </td>
                                             <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalregdate" >Registration Date</a></td>
                                            <td><?php echo htmlentities($result->ServiceRegDate);?></td>
                                        </tr>

<tr>

                                             <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalstatus2" >Status</a></td>
                                          <td><a href="#" data-toggle="modal" data-target="#modalstatus2" ><?php $stats=$result->RegStatus;
                                             if($stats==0){
                                             ?>
                                             <span style="color: red">Inactive</span>
                                              <?php } if($stats==1)  { ?>
                                             <span style="color: green">Active</span>
                                             <?php } if($stats==2)  { ?>
                                              <span style="color: #10387a">Transfer In</span>
											  <?php } if($stats==3)  { ?>
                                              <span style="color: #36b9cc">Transfer Out</span>
											  <?php } if($stats==4)  { ?>
                                              <span style="color: orange">Deceased</span>
											  <?php } if($stats==5)  { ?>
                                              <span style="color: green">Disciplinary</span>
											  <?php } if($stats==6)  { ?>
                                              <span style="color: red">Withdrawn</span>
											  
                                              <?php }?> </a>

                                             </td>
											
                                             <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalsubcription" >Subscription</a></td>
                                            <td><?php echo htmlentities($result->Subscription);?></td>
                                            
                                        </tr>


                                      <tr>
   </form>                                     </tr>   
<?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
 <div class="container-fluid" id="committeedetails">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Committee Details</h1>
          </div>    
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Committee</h6>
			  <div class="float-right">
			  <a href="editmember.php?mid=<?php echo htmlentities($result->MemberId);?>" onclick="return confirm('Do you want to remove member from committee officials?');" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" >Remove</a>
			            <a href="#" data-toggle="modal" data-target="#modalcommittee" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i> Update</a>

            </div>
            </div>
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                  <?php 
$iid=$_SESSION['ilogin'];
$mid=$_GET['mid'];
$sql = "SELECT * from tblmembers where MemberId=:mid and InstitutionID=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?> 
        <tr>
                                       
                                           
											  <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalcommittee" >Committee Name</a></td>
                                              <td><a href="committeemembers.php?cname=<?php echo htmlentities($result->CommitteeName);?>"><?php echo htmlentities($result->CommitteeName);?></a></td>
											  
                                          </tr>

                                          <tr>
                                             <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalcommittee" >Position</a></td>
                                            <td><?php echo htmlentities($result->Position);?></td>
											</tr>
											<tr>
                                             <td style="font-size:16px;"><a href="#" data-toggle="modal" data-target="#modalcommittee" >Start Serving</a></td>
                                            <td><?php echo htmlentities($result->StartServing);?></td>
                                           
                                             <td style="font-size:16px;">End Serving</td>
                                            <td><?php echo htmlentities($result->EndServing);?></td>
                                            
                                        </tr>




   </form>                                      
<?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
    <div class="container-fluid" id="paymentdetails">

          <!-- Page Heading -->
         <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Payment Details</h1>
          </div>
		
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Payment History</h6>
			
			  <div class="float-right">
			            <a href="addreciept.php?mid=<?php echo htmlentities($_GET['mid']);?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> Add Reciept</a>

            </div>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>#</th>
                      <th>Description</th>
                      <th>Amount (Ksh)</th>
                      <th>Reciept No.</th>
                      <th>Payment Date</th>
                    </tr>
                  </thead>
                  <tbody>
   <?php 
$iid=$_SESSION['ilogin'];
$mid=$_GET['mid'];
$sql = "SELECT * from tblreciepts where InstitutionID=:iid and MemberId=:mid";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>
                    <tr>
                      <td> <?php echo htmlentities($result->id);?></td>
                      <td><?php echo htmlentities($result->Pay_Description);?></td>
                      <td><?php echo htmlentities($result->Amount_paid);?></td>
                      <td><?php echo htmlentities($result->Reciept_no);?></td>
                      <td><?php echo htmlentities($result->Payment_date);?></td>
                                         </td>
                    </tr>
<?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
		 <div class="container-fluid" id="spousedetails">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Spouse Details</h1>
          </div>   
		   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
			  <div class="float-right">
            <a href="addspouse.php?id=<?php echo htmlentities($result->MemberId);?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add Spouse</a>
         
            </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                  <?php 
$iid=$_SESSION['ilogin'];
$mid=$_GET['mid'];
$sql = "SELECT * from tblfamilydetails where MemId=:mid and InstitutionID=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?> 
        <tr>
							<div class="input-field col m4">	  
 <form id="example-form" method="post" enctype="multipart/form-data"  name="updatemp">
        <div>
		<img src="../assets/img/spouse/<?php echo htmlentities($result->Image);?>" alt="avatar"  style="vertical-align:middle;width:100px;height:100px;max-width:100%;border-radius:300px;">
  	  <input type="file" name="image" accept="image/*"required ></div>
	  	
<button type="submit" name="uploadspouse"  id="upload" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">UPLOAD</button>
</form></div>
                                       
                                            <td style="font-size:16px;"> Full Name</td>
                                              <td>
                                                <?php echo htmlentities($result->FirstName." ".$result-> MiddleName." ".$result->LastName);?></td>
                                              <td style="font-size:16px;">ID Number</td>
                                              <td><?php echo htmlentities($result->PassportId);?></td>
											  
                                          </tr>

                                          <tr>
                                             <td style="font-size:16px;"><Email id:</td>
                                            <td><?php echo htmlentities($result->EmailId);?></td>
                                             <td style="font-size:16px;">Contact No.</td>
                                            <td><?php echo htmlentities($result->MobileNo);?></td>
                                            <td>&nbsp;</td>
                                             <td>&nbsp;</td>
                                        </tr>

  <tr>
                                              <td style="font-size:16px;">Gender</td>
                                              <td><?php echo htmlentities($result->Gender);?></td>
                                             <td style="font-size:16px;">Date of Birth</td>
                                            <td><?php echo htmlentities($result->DOB);?></td>
                                             <td style="font-size:16px;">Age</td>
                                           <td><?php echo htmlentities($result->Age);?></td>
                                        </tr>



<tr> <td ><h6><b> Work Details</b></h6></td></tr>
<tr>

                                             <td style="font-size:16px;">Nature Of Work</td>
                                            <td><?php echo htmlentities($result->NatureOfWork);?></td>
                                             <td style="font-size:16px;">Business Name</td>
                                            <td><?php echo htmlentities($result->BusinessName);?></td>
                                             <td style="font-size:16px;">Rank</td>
                                            <td><?php echo htmlentities($result->Rank);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Employer</td>
                                            <td><?php echo htmlentities($result->Employer);?></td>
                                             <td style="font-size:16px;">Work Building</td>
                                            <td><?php echo htmlentities($result->WorkBuilding);?></td>
                                             <td style="font-size:16px;">Work Road</td>
                                            <td><?php echo htmlentities($result->WorkRoad);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Work Town</td>
                                            <td><?php echo htmlentities($result->WorkTown);?></td>
                                             <td style="font-size:16px;">Work County</td>
                                            <td><?php echo htmlentities($result->WorkCounty);?></td>
                                             <td style="font-size:16px;">Work Country</td>
                                            <td><?php echo htmlentities($result->WorkCountry);?></td>
</tr>
<tr> <td><h6><b> Work Address</b></h6></td></tr>
<tr>

                                             <td style="font-size:16px;">Address</td>
                                            <td><?php echo htmlentities($result->WorkPostalAddress);?></td>
                                             <td style="font-size:16px;">Postal Code</td>
                                            <td><?php echo htmlentities($result->WorkPostalCode);?></td>
                                             <td style="font-size:16px;">Town</td>
                                            <td><?php echo htmlentities($result->WorkTownAddress);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">County</td>
                                            <td><?php echo htmlentities($result->WorkCountyAddress);?></td>
                                             <td style="font-size:16px;">Country</td>
                                            <td><?php echo htmlentities($result->WorkCountryAddress);?></td></tr>
                                             
<tr> <td><h6><b> Work Contact</b></h6></td></tr><tr>
											 <td style="font-size:16px;">Email</td>
                                            <td><?php echo htmlentities($result->WorkEmail);?></td>
											</tr><tr>
                                             <td style="font-size:16px;">Mobile No.</td>
                                            <td><?php echo htmlentities($result->WorkMobileNo);?></td>
                                             <td style="font-size:16px;">Other Number:</td>
                                            <td><?php echo htmlentities($result->WorkOtherNo);?></td>
</tr>
<tr>
<div class="btn-group">
<td colspan="1">
  <a href="updatespouse.php?id=<?php echo htmlentities($result->MemId);?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Update</a>
  </td>
 </div>
   </form>                                     </tr>   
<?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
 <!-- Begin Page Content -->
        <div class="container-fluid" id="childrendetails">

          <!-- Page Heading -->
         <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Children</h1>
          </div>
		
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Children</h6>
			
			  <div class="float-right">
			            <a href="addchild.php?mid=<?php echo htmlentities($_GET['mid']);?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add Child</a>

            </div>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Gender</th>
                      <th>RegDate</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
   <?php 
$iid=$_SESSION['ilogin'];
$mid=$_GET['mid'];
$sql = "SELECT * from tblchildren where InstitutionID=:iid and MemberId=:mid";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>
                    <tr>
                      <td> <?php echo htmlentities($result->id);?></td>
                      <td><?php echo htmlentities($result->FirstName. " ". $result->MiddleName . " ". $result-> LastName);?></td>
                      <td><?php echo htmlentities($result->MobileNo);?></td>
                      <td><?php echo htmlentities($result->Gender);?></td>
					  
                      <td><?php echo htmlentities($result->SubmitDate);?></td>
					   <td><a href="childdetails.php?mid=<?php echo htmlentities($result->id);?>"   class="btn btn-info" >Details</a>
                                         </td>
                    </tr>
<?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
		
 <div class="container-fluid" id="accountstatus">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Account Status</h1>
          </div>  
        <?php 
$iid=$_SESSION['ilogin'];
$mid=$_GET['mid'];
$sql = "SELECT * from tblmembers where MemberId=:mid and InstitutionID=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>		  
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Status</h6>
			  <div class="float-right">   <a href="#" data-toggle="modal" data-target="#modalstatus"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" >Update</a>
</div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
           
        <tr>
                                       
                                           
											  <td style="font-size:16px;">Status</td> 
											  <td ><?php $stats=$result->Status;
                                             if($stats==0){
                                             ?>
                                             <span style="color: red">Inactive</span>
                                              <?php } if($stats==1)  { ?>
                                             <span style="color: blue">Pending</span>
                                             <?php } if($stats==2)  { ?>
                                              <span style="color: green">Active</span>
											  <?php }?>
                                             </td>
											  
                                          </tr>

                                          
											




   </form>                                      
<?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

<?php include('includes/footer.php'); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Make sure you  have saved all changes.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- subscription Modal-->
  <div class="modal fade" id="modalsubcription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Subscription</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		<select name="updatesubscription" class="custom-select" autocomplete="off" required>
		<option value="">Subscription</option>
		<option value="50Years">50Years</option>
		<option value="Annual">Annual</option>
		<option value="No Subscription Yet">No Subscription</option>
		</select>
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="subscriptionupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end subscription modal-->
  <!-- Status Modal-->
  <div class="modal fade" id="modalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Member Status</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		<select name="updatestatus" class="custom-select" autocomplete="off" required>
		<option value="">Status</option>
		<option value="2">Active</option>
		<option value="1">Pending</option>
		<option value="0">Inactive</option>
		</select>
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="statusupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end status modal-->
  <!-- RegDate Modal-->
  <div class="modal fade" id="modalregdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Date</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST"> 
		<div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		<input name="updateregdate" class="custom-select" type="date" autocomplete="off" required>
		
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="regdateupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end status modal-->
  <!-- service Modal-->
  <div class="modal fade" id="modalservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		<select name="updateservice" class="custom-select" autocomplete="off" required>
		<option value="">Select Category</option>
		<option value="7">New Card</option>
		<option value="1">Card</option>
		<option value="2">Badge</option>
		<option value="3">Tie & Jacket</option>
		<option value="4">Follower</option>
		<option value="5">Scarf</option>
		<option value="6">Full Uniform</option>
		<option value="0">Not Registered</option>
		</select>
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="serviceupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end service modal-->
  <!-- district Modal-->
  <div class="modal fade" id="modaldistrict" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update District</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		<input type="text" name="updatedistrict" class="form-control" placeholder="District"autocomplete="off" required>
		
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="districtupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end district modal-->
  <!-- jumuia Modal-->
  <div class="modal fade" id="modaljumuia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Jumuia</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		<input type="text" name="updatejumuia" class="form-control" placeholder="Jumuia"autocomplete="off" required>
		
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="jumuiaupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end jumuia modal-->
  <!-- cell Modal-->
  <div class="modal fade" id="modalcell" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Cell</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		<input type="text" name="updatecell" class="form-control" placeholder="Cell"autocomplete="off" required>
		
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="cellupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end cell modal-->
  <!-- group Modal-->
  <div class="modal fade" id="modalgroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Group</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		 <div class="form-group row">
		  <div class="col-sm-6 mb-3 mb-sm-0">
		<select name="updatecommittee" class="custom-select" autocomplete="off" required>
	<option value="">Select Group...</option>
<?php
$iid=$_SESSION['ilogin']; 
$sql = "SELECT  Name from tblgroups  where InstitutionID=:iid";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->Name);?>"><?php echo htmlentities($result->Name);?></option>

<?php }} ?>
<option value="No Committee">No Group</option>
		</select></div>
		  <div class="col-sm-6">
<select name="updateposition" class="custom-select" >
<option value="">Position</option>
<option value="Chairperson">Chairperson</option>
<option value="Vice Chairperson">Vice Chairperson</option>
<option value="Secretary">Secretary</option>
<option value="Vice Secretary">Vice Secretary</option>
<option value="Treasurer ">Treasurer</option>
<option value="Assistant Treasurer  ">Assistant Treasurer </option>
<option value="Member">Member</option>
</select>
    </div>
    </div>
               
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="groupupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end group modal-->
  <!-- committee Modal-->
  <div class="modal fade" id="modalcommittee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Committee</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		 <div class="form-group row">
		  <div class="col-sm-6 mb-3 mb-sm-0">
		<select name="updatecommittee" class="custom-select" autocomplete="off" required>
	<option value="">Select Committee...</option>
<?php
$iid=$_SESSION['ilogin']; 
$sql = "SELECT  Name from tblcommittees  where InstitutionID=:iid";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->Name);?>"><?php echo htmlentities($result->Name);?></option>

<?php }} ?>
<option value="No Committee">No Committee</option>
		</select></div>
		  <div class="col-sm-6">
<select name="updateposition" class="custom-select" >
<option value="">Position</option>
<option value="Chairperson">Chairperson</option>
<option value="Vice Chairperson">Vice Chairperson</option>
<option value="Secretary">Secretary</option>
<option value="Vice Secretary">Vice Secretary</option>
<option value="Treasurer ">Treasurer</option>
<option value="Assistant Treasurer  ">Assistant Treasurer </option>
<option value="Member">Member</option>
</select>
    </div>
    </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                 <input type="date" class="form-control form-control"  name="updatestartserving"  placeholder="Start Serving" >

				</div>
				  <div class="col-sm-6">
                  <input type="date" class="form-control form-control"  name="updateendserving"  placeholder="End Serving" >
                </div>
                </div>
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="committeeupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end committee modal-->
  <!-- groupposition Modal-->
  <div class="modal fade" id="modalgroupposition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Position</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		 <div class="form-group row">
		
		  <div class="col-sm-6">
<select name="updateposition" class="custom-select" >
<option value="">Position</option>
<option value="Chairperson">Chairperson</option>
<option value="Vice Chairperson">Vice Chairperson</option>
<option value="Secretary">Secretary</option>
<option value="Vice Secretary">Vice Secretary</option>
<option value="Treasurer ">Treasurer</option>
<option value="Assistant Treasurer  ">Assistant Treasurer </option>
</select>
    </div>
    </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                 <input type="date" class="form-control form-control"  name="updatestartserving"  placeholder="Start Serving" >

				</div>
				  <div class="col-sm-6">
                  <input type="date" class="form-control form-control"  name="updateendserving"  placeholder="End Serving" >
                </div>
                </div>
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="grouppositionupdate" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end committee modal-->
  <!-- status2 Modal-->
  <div class="modal fade" id="modalstatus2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form method="POST">
		 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
		<select name="updatestatus2" class="custom-select" autocomplete="off" required>
		<option value="">Status</option>
		<option value="2">Transfer In</option>
		<option value="3">Transfer Out</option>
		<option value="4">Deceased</option>
		<option value="5">Disciplinary</option>
		<option value="6">Withdrawn</option>
		<option value="1">Active</option>
		</select>
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary" type="submit" name="status2update" value="Submit">
        </div></form>
      </div>
    </div>
  </div>
<!-- end status2 modal-->
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/gms.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/chart-area-demo.js"></script>
  <script src="../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php } ?>