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
$committee=$_POST['committee'];
$committeerole=$_POST['committeerole'];
$sql="INSERT INTO tblcommittees(Name,CommiteeRole,InstitutionID) VALUES(:committee,:committeerole,:iid)";
$query = $dbh->prepare($sql);
$query->bindParam(':committee',$committee,PDO::PARAM_STR);
$query->bindParam(':committeerole',$committeerole,PDO::PARAM_STR);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Committee Added Successfully";
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
              <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Add New Committee</h1>
              </div>
              <form class="user wasivalidated" method="post" >
			  <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
				<div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label for="committee">Committee Name</label>
                    <input type="text" class="form-control form-control" name="committee" id="committee" placeholder="Committee Name" required>
              
				  </div>
				  </div>
				  <div class="form-group row">
                  <div class="col-sm-6 ">
				  <label for="committeerole">Role</label>
                    <textarea type="text" class="form-control form-control"  name="committeerole" id="committeerole" Value="Role" required>
                  </textarea>
				  </div>
                </div>
              
               
                
				<div style=" padding-left:25%;">
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