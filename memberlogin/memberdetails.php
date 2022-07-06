<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['mlogin'])==0)
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
		
        $mid=$_SESSION['mlogin'];
	    $image = $_FILES['image']['name'];
        $fileName = $_FILES['image']['tmp_name']; 
		$sql="update tblfamilydetails  set Image=:image where MemId=:mid";
	$query = $dbh->prepare($sql);
    $query->bindParam(':image',$image,PDO::PARAM_STR);
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
		
        $mid=$_SESSION['mlogin'];
	    $image = $_FILES['image']['name'];
        $fileName = $_FILES['image']['tmp_name']; 
		$sql="update tblmembers  set Image=:image where  MemberId=:mid";
	$query = $dbh->prepare($sql);
    $query->bindParam(':image',$image,PDO::PARAM_STR);
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
			
		  </div>  
<?php		  
		  $iid=$_SESSION['mlogin'];
$sql = "SELECT * from tblmembers where MemberId=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?> 
		  <div class="btn-group">
		              <a href="institutionprofile.php?iid=<?php echo htmlentities($result->InstitutionID);?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-building fa-sm text-white-50"></i> Institution</a>
		              <a href="#spousedetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Spouse Details</a>
		              <a href="#childrendetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Children Details</a>
		              <a href="#membershipdetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-bookmark fa-sm text-white-50"></i> Membership Details</a>
		              <a href="#committeedetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> Committee Details</a>
		              <a href="#groupdetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> Group Details</a>
					  <a href="#paymentdetails" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-dollar fa-sm text-white-50"><h6>$</h6></i> Payment History</a>
</div><?php }} ?>
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
$iid=$_SESSION['mlogin'];
$sql = "SELECT * from tblmembers where MemberId=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
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
                                              <td  colspan="3">
                                                <?php echo htmlentities($result->FirstName." ".$result-> MiddleName." ".$result->LastName);?></td>
                                              <td style="font-size:16px;">ID Number</td>
                                              <td  colspan="3"><?php echo htmlentities($result->MemberId);?></td>
											  
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

   </form>                                        
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
$iid=$_SESSION['mlogin'];
$sql = "SELECT * from tblmembers where MemberId=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
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
											  
                                          </tr>

                                          <tr>
                                             <td style="font-size:16px;">District</td>
                                            <td><?php echo htmlentities($result->District);?></td>
                                             <td style="font-size:16px;">Jumuia</td>
                                            <td><?php echo htmlentities($result->Jumuia);?></td>
                                           
                                             <td style="font-size:16px;">Cell</td>
                                            <td><?php echo htmlentities($result->Cell);?></td>
                                            
                                        </tr>

  <tr>
                                              <td style="font-size:16px;">Membership Catergory</td> 
											  <td ><?php $stats=$result->RegService;
                                             if($stats==0){
                                             ?>
                                             <span style="color: red">Not Registered</span>
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
											  <?php } if($stats==7)  { ?>
                                              <span style="color: maroon">Full Uniform</span>
											  
                                              <?php }?>
                                             </td>
                                             <td style="font-size:16px;">Registration Date</td>
                                            <td><?php echo htmlentities($result->ServiceRegDate);?></td>
                                        </tr>

<tr>

                                             <td style="font-size:16px;">Status</td>
                                          <td><?php $stats=$result->RegStatus;
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
											  
                                              <?php }?>

                                             </td>
											
                                             <td style="font-size:16px;">Subscription</td>
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
			  
            </div>
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                        <?php 
$iid=$_SESSION['mlogin'];
$sql = "SELECT * from tblmembers where MemberId=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?> 
        <tr>
                                       
                                           
											  <td style="font-size:16px;">Committee Name</td>
                                              <td><?php echo htmlentities($result->CommitteeName);?></td>
											  
                                          </tr>

                                          <tr>
                                             <td style="font-size:16px;">Position</td>
                                            <td><?php echo htmlentities($result->Position);?></td>
											</tr>
											<tr>
                                             <td style="font-size:16px;">Start Serving</td>
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
 <div class="container-fluid" id="groupdetails">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Group Details</h1>
          </div>    
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Group</h6>
			  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                   <?php 
$iid=$_SESSION['mlogin'];
$sql = "SELECT * from tblmembers where MemberId=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?> 
        <tr>
                                       
                                           
											  <td style="font-size:16px;">Group Name</td>
                                              <td><?php echo htmlentities($result->GroupName);?></td>
											  
                                          </tr>

                                          <tr>
                                             <td style="font-size:16px;">Position</td>
                                            <td><?php echo htmlentities($result->GroupPosition);?></td>
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
$mid=$_SESSION['mlogin'];
$sql = "SELECT * from tblreciepts where  MemberId=:mid";
$query = $dbh -> prepare($sql);
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
			 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
           <?php 
$iid=$_SESSION['mlogin'];
$sql = "SELECT * from tblfamilydetails where MemId=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
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
	  	
<button type="submit" name="uploadspouse"  id="upload" class="btn btn-primary">UPLOAD</button>
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
   </form>                                       
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
			

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>ID</th>
                      <th>Contact</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>RegDate</th>
                    </tr>
                  </thead>
                  <tbody>
             <?php 
$iid=$_SESSION['mlogin'];
$sql = "SELECT * from tblchildren where MemberId=:iid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
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
                      <td><?php echo htmlentities($result->FirstName. " ". $result->MiddleName . " ". $result-> MiddleName. " ". $result-> LastName);?></td>
                      <td><?php echo htmlentities($result->ID_No);?></td>
                      <td><?php echo htmlentities($result->MobileNo);?></td>
                      <td><?php echo htmlentities($result->Email);?></td>
                      <td><?php echo htmlentities($result->Gender);?></td>
                      <td><?php echo htmlentities($result->DOB);?></td>
					  
                      <td><?php echo htmlentities($result->SubmitDate);?></td>
					   
                    </tr>
<?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div> 
		
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
 <!-- Message Modal-->
  <div class="modal fade" id="modalmessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Message</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
		<?php
$sql = "SELECT * from tblmessages where InstitutionID=232323 order by id desc";
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
<li>
        <div class="modal-body">
                    <div class="text-truncate"><?php echo htmlentities($result->Message);?></div></li>
					</div>
<?php }} ?>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
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