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
$mid=$_GET['mid'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$memberid=$_POST['memberid'];
$phonenumber=$_POST['phonenumber'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$sql=" Update tblchildren set ID_No=:memberid,MobileNo=:phonenumber,Gender=:gender,DOB=:dob,FirstName=:firstname,MiddleName=:middlename,LastName=:lastname,Email=:emailid where id=:mid and InstitutionID=:iid";
$query = $dbh->prepare($sql);
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
$mid=$_GET['mid'];
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from  tblchildren where id=:mid and InstitutionID=:iid ";
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
				  <a href="editmember.php?mid=<?php echo htmlentities($result->MemberId);?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i></a>

				</div><?php }} ?>
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Child Details</h1>
				
              </div>
              <form class="user" method="post">
			 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
<?php
$mid=$_GET['mid'];
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from  tblchildren where id=:mid and InstitutionID=:iid ";
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
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->FirstName);?>" name="firstname" id="firstname" placeholder="first name" required>
                  </div>
                  <div class="col-sm-6">
				  <label for="middlename">Middle Name</label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->MiddleName);?>" name="middlename" id="middlename" placeholder="middle name">
                  </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="lastname">Surname</label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->LastName);?>" name="lastname" id="lastname" placeholder="last name" required>
                  </div>
				  <div class="col-sm-6">
				  <label for="emailid">Email</label>
                  <input type="email" class="form-control form-control" value="<?php echo htmlentities($result->Email);?>" name="emailid" id="emailid" placeholder="email id" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="memberid"> ID</label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->ID_No);?>" name="memberid" id="memberid" placeholder="ID" required>
                  </div>
				  <div class="col-sm-6">
				 <label for="phonenumber">Phone Number</label>
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->MobileNo);?>" name="phonenumber" id="phonenumber" placeholder="Contact" required>
                 </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				 <label for="gender">Gender</label>
                  <select type="text" class="form-control custom-select"  name="gender" id="gender" placeholder="gender" required>
                <option value="<?php echo htmlentities($result->Gender);?>"><?php echo htmlentities($result->Gender);?></value>
                <option value="Male">Male</value>
                <option value="Female">Female</value>
                <option value="Intersex">Intersex</value>
				</select> </div>
				  <div class="col-sm-6">
				 <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control form-control" value="<?php echo htmlentities($result->DOB);?>" name="dob" id="dob" placeholder="Date of Birth" required>
                 </div>
                </div>
              
              
                
               
             
               
              
               
               
					
				<div style=" padding-left:40%;">
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