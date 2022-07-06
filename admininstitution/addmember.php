<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$iid=$_SESSION['ilogin'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['surname'];
$memberid=$_POST['memberid'];
$memberno=$_POST['membernumber'];
$dob=$_POST['dob'];
$email=$_POST['emailid'];
$gender=$_POST['gender'];
$password=md5($_POST['memberid']);
$status=0;
$sql="INSERT INTO tblmembers(FirstName,MiddleName,LastName,EmailId,MemberId,MemberNo,Gender,DOB,Password,Status,InstitutionID)
 VALUES(:firstname,:middlename,:lastname,:email,:memberid,:memberno,:gender,:dob,:password,:status,:iid)";
$query = $dbh->prepare($sql);
$query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
$query->bindParam(':middlename',$middlename,PDO::PARAM_STR);
$query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':memberid',$memberid,PDO::PARAM_STR);
$query->bindParam(':memberno',$memberno,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Member Added Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
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
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add New Member</h1>
              </div>
              <form class="user wasivalidated" method="post" >
			  <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
				<div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" onBlur="checkAvailabilityMembernumber()" name="membernumber" id="membernumber" placeholder="Member Number (Must be unique)"  required>
                  <span id="membernumber-availability" style="font-size:12px;"></span> 
				  </div>
                  <div class="col-sm-6 ">
                    <input type="text" class="form-control form-control" onBlur="checkAvailabilityMemberid()" name="memberid" id="memberid" placeholder="Member Natonal ID" >
                  <span id="memberid-availability" style="font-size:12px;"></span> 
				  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" name="firstname" id="firstname" placeholder="First Name" >
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control" name="middlename" id="middlename" placeholder="Middle Name">
                  </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" name="surname" id="surname" placeholder="Surname" >
                  </div>
				  <div class="col-sm-6">
                  <input type="email" class="form-control form-control" name="emailid" id="emailid" placeholder="Email Address" >
                </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0 " >
				  <div class="input-group mb-3">
				  <div class="input-group-preend">
                        <span class="input-group-text">Date Of Birth</span>
                      </div>
                    <input type="date"  class="form-control form-control-date " name="dob" id="dob" placeholder="Date of Birth" >
					
                      </div>
                  </div>
                  <div class="col-sm-6">
				  <select class="form-control custom-select " type="text" placeholder="gender"name="gender" id="gender" required>
				  <option value="">Gender</option>
				  <option value="Male">Male</option>
				  <option value="Female">Female</option>
				  <option value="Intersex">Intersex</option>
				  </select>
                  </div>
                </div>
				<div style=" padding-left:45%;">
                <input  name="add" type="submit" id="add" value="Add" class="btn btn-primary ">
                 </div>
               
                
                
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