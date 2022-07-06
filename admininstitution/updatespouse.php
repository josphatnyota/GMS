<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$iid=$_SESSION['ilogin'];
$mid=$_GET['id'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$memberid=$_POST['memberid'];
$phonenumber=$_POST['phonenumber'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$natureofwork=$_POST['natureofwork'];
$businessname=$_POST['businessname'];
$employer=$_POST['employer'];
$rank=$_POST['rank'];
$workbuilding=$_POST['workbuilding'];
$workroad=$_POST['workroad'];
$worktown=$_POST['worktown'];
$workcounty=$_POST['workcounty'];
$workcountry=$_POST['workcountry'];
$workpostalcode=$_POST['workpostalcode'];
$workpostaltown=$_POST['workpostaltown'];
$workpostalcounty=$_POST['workpostalcounty'];
$workpostalcountry=$_POST['workpostalcountry'];
$workemail=$_POST['workemail'];
$workmobileno=$_POST['workmobileno'];
$workotherno=$_POST['workotherno'];
$workpostaladdress=$_POST['workpostaladdress'];
$sql=" Update tblfamilydetails set WorkOtherNo=:workotherno,WorkMobileNo=:workmobileno,WorkEmail=:workemail,WorkCountyAddress=:workpostalcounty,WorkCountryAddress=:workpostalcountry,WorkPostalCode=:workpostalcode,WorkTownAddress=:workpostaltown,WorkCountry=:workcountry,WorkPostalAddress=:workpostaladdress,WorkCounty=:workcounty,WorkTown=:worktown,WorkBuilding=:workbuilding,WorkRoad=:workroad,Employer=:employer,Rank=:rank,NatureOfWork=:natureofwork,BusinessName=:businessname,Gender=:gender,DOB=:dob,PassportId=:memberid,MobileNo=:phonenumber,FirstName=:firstname,MiddleName=:middlename,LastName=:lastname,Email=:emailid where MemId=:mid and InstitutionID=:iid";
$query = $dbh->prepare($sql);
$query->bindParam(':workemail',$workemail,PDO::PARAM_STR);
$query->bindParam(':workotherno',$workotherno,PDO::PARAM_STR);
$query->bindParam(':workmobileno',$workmobileno,PDO::PARAM_STR);
$query->bindParam(':workpostalcountry',$workpostalcountry,PDO::PARAM_STR);
$query->bindParam(':workpostalcounty',$workpostalcounty,PDO::PARAM_STR);
$query->bindParam(':workpostalcode',$workpostalcode,PDO::PARAM_STR);
$query->bindParam(':workpostaltown',$workpostaltown,PDO::PARAM_STR);
$query->bindParam(':workpostaladdress',$workpostaladdress,PDO::PARAM_STR);
$query->bindParam(':workcountry',$workcountry,PDO::PARAM_STR);
$query->bindParam(':workbuilding',$workbuilding,PDO::PARAM_STR);
$query->bindParam(':worktown',$worktown,PDO::PARAM_STR);
$query->bindParam(':workcounty',$workcounty,PDO::PARAM_STR);
$query->bindParam(':workroad',$workroad,PDO::PARAM_STR);
$query->bindParam(':employer',$employer,PDO::PARAM_STR);
$query->bindParam(':rank',$rank,PDO::PARAM_STR);
$query->bindParam(':businessname',$businessname,PDO::PARAM_STR);
$query->bindParam(':natureofwork',$natureofwork,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':memberid',$memberid,PDO::PARAM_STR);
$query->bindParam(':phonenumber',$phonenumber,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
$query->bindParam(':middlename',$middlename,PDO::PARAM_STR);
$query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();

$msg="Updated Successfully";



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
 <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
		
          <div class="col-lg-12">
		  <?php
$mid=$_GET['id'];
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from  tblfamilydetails where MemId=:mid and InstitutionID=:iid ";
$query = $dbh -> prepare($sql);
$query -> bindParam(':iid',$iid, PDO::PARAM_STR);
$query -> bindParam(':mid',$mid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{               ?>
				<div class="float-left">
				  <a href="editmember.php?mid=<?php echo htmlentities($result->MemId);?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i></a>

				</div><?php }} ?>
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Spouse Details</h1>
				
              </div>
              <form class="user" method="post">
			 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
<?php
$mid=$_GET['id'];
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from  tblfamilydetails where MemId=:mid and InstitutionID=:iid ";
$query = $dbh -> prepare($sql);
$query -> bindParam(':iid',$iid, PDO::PARAM_STR);
$query -> bindParam(':mid',$mid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{               ?> 
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="firstname">First Name </label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->FirstName);?>" name="firstname" id="firstname" placeholder="first name" >
                  </div>
                  <div class="col-sm-6">
				  <label for="middlename">Middle Name</label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->MiddleName);?>" name="middlename" id="middlename" placeholder="middle name">
                  </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="lastname">Surname</label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->LastName);?>" name="lastname" id="lastname" placeholder="last name" >
                  </div>
				  <div class="col-sm-6">
				  <label for="emailid">Email</label>
                  <input type="email" class="form-control form-control" value="<?php echo htmlentities($result->Email);?>" name="emailid" id="emailid" placeholder="email id" >
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="memberid">Member ID</label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->PassportId);?>" name="memberid" id="memberid" placeholder="memberid" >
                  </div>
				  <div class="col-sm-6">
				 <label for="phonenumber">Phone Number</label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->MobileNo);?>" name="phonenumber" id="phonenumber" placeholder="Contact" >
                 </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				   <label for="gender">Gender</label>
                  <select type="text" class="form-control custom-select"  name="gender" id="gender" placeholder="gender" >
                <option value="<?php echo htmlentities($result->Gender);?>"><?php echo htmlentities($result->Gender);?></value>
                <option value="Male">Male</value>
                <option value="Female">Female</value>
                <option value="Intersex">Intersex</value>
				</select>
				  </div>
				  <div class="col-sm-6">
				  <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control form-control" value="<?php echo htmlentities($result->DOB);?>" name="dob" id="dob" placeholder="Date of birth" >
                 
				</div>
                </div>
               
               
				
                
				  <div class="text-center"><span style="color:#032c4b;"><b>Work Details</b></span></div>
                   
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="natureofwork">Nature Of Work</label>
                    <select class="form-control form-control custom-select"  name="natureofwork" id="natureofwork" placeholder="Nature Of Work" >
                       <option value="<?php echo htmlentities($result->NatureOfWork);?>"><?php echo htmlentities($result->NatureOfWork);?></option>
                       <option value="Self Employed">Self Employed</option>
                       <option value="Employed">Employed</option>
                       <option value="Unemployed">Unemployed</option>
                       <option value="Retired">Retired</option>
					   </select>
				 </div>
				  <div class="col-sm-6">
				  <label for="businessname">Business Name</label>
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->BusinessName);?>" name="businessname" id="businessname" placeholder="Business Name" >
                </div>				  
				  </div> 
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="employer">Employer</label>
                    <input class="form-control form-control " value="<?php echo htmlentities($result->Employer);?>" name="employer" id="employer" placeholder="Employer" >
                      
				 </div>
				  <div class="col-sm-6">
				  <label for="rank">Rank/Position</label>
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Rank);?>" name="rank" id="rank" placeholder="Rank" >
                </div>				  
				  </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="workbuilding">Work Building</label>
                    <input class="form-control form-control " value="<?php echo htmlentities($result->WorkBuilding);?>" name="workbuilding" id="workbuilding" placeholder=" Building" >
                      
				 </div>
				  <div class="col-sm-6">
				  <label for="workroad">Road</label>
                    <input class="form-control form-control " value="<?php echo htmlentities($result->WorkRoad);?>" name="workroad" id="workroad" placeholder="Road" >
                      </div>				  
				  </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="worktown">Town</label>
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->WorkTown);?>" name="worktown" id="worktown" placeholder="Town" >
                
				 </div>
				  <div class="col-sm-6">
				  <label for="workcounty">County</label>
                    <input class="form-control form-control " value="<?php echo htmlentities($result->WorkCounty);?>" name="workcounty" id="workcounty" placeholder="County" >
                      </div>				  
				  </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="workcountry">Country</label>
                    <input class="form-control form-control " value="<?php echo htmlentities($result->WorkCountry);?>" name="workcountry" id="workcountry" placeholder="Country" >
                      
				 </div>
				  <div class="col-sm-6">
				  <label for="workpostaladdress">Address</label>
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->WorkPostalAddress);?>" name="workpostaladdress" id="workpostaladdress" placeholder="Address" >
                </div>				  
				  </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="workpostalcode">Code</label>
                    <input class="form-control form-control " value="<?php echo htmlentities($result->WorkPostalCode);?>" name="workpostalcode" id="workpostalcode" placeholder="Code" >
                      
				 </div>
				  <div class="col-sm-6">
				  <label for="workpostaltown">Town</label>
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->WorkTownAddress);?>" name="workpostaltown" id="workpostaltown" placeholder="Town" >
                </div>				  
				  </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="workpostalcounty">County</label>
                    <input class="form-control form-control " value="<?php echo htmlentities($result->WorkCountyAddress);?>" name="workpostalcounty" id="workpostalcounty" placeholder="County" >
                      
				 </div>
				  <div class="col-sm-6">
				  <label for="workpostalcountry">Country</label>
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->WorkCountryAddress);?>" name="workpostalcountry" id="workpostalcountry" placeholder="Country" >
                </div>				  
				  </div>				 
				  <div class="text-center"><span style="color:#032c4b;"><b>Work Contact</b></span></div>

                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="workemail">Email</label>
                    <input type="email" class="form-control form-control " value="<?php echo htmlentities($result->WorkEmail);?>" name="workemail" id="workemail" placeholder="Email" >
                      
				 </div>
				  <div class="col-sm-6">
				  <label for="workmobileno">Mobile</label>
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->WorkMobileNo);?>" name="workmobileno" id="workmobileno" placeholder="Mobile" >
                </div>				  
				  </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="workotherno">Telephone</label>
                    <input class="form-control form-control " value="<?php echo htmlentities($result->WorkOtherNo);?>" name="workotherno" id="workotherno" placeholder="Telephone" >
                      
				 </div>			  
				  </div>
					
				<div style=" padding-left:50%;">
                <input  name="update" type="submit" id="update" value="Save Changes" class="btn btn-primary ">
                 </div>
               
                
<?php }} ?>
              </form>
           
             
            </div>
          </div>
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