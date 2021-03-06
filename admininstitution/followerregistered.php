<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">


<?php include('includes/header2.php');?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<?php include('includes/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php include('includes/header.php');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Follower</h1>
        <button onclick="Export()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export to CSV File</button>
          </div>
		  <div class="btn-group">
		              <a href="notregistered.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-filter fa-sm text-white-50"></i> Not Registered</a>
		              <a href="cardregistered.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-filter fa-sm text-white-50"></i> Card</a>
		              <a href="badgeregistered.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-filter fa-sm text-white-50"></i> Badge</a>
		              <a href="tieregistered.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-filter fa-sm text-white-50"></i> Tie & Jacket</a>
		              <a href="followerregistered.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-filter fa-sm text-white-50"></i> Follower</a>
		              <a href="scarfregistered.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-filter fa-sm text-white-50"></i> Scarf</a>
		              <a href="fullregistered.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-filter fa-sm text-white-50"></i> Full Uniform</a>
                    </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Service</h6>
			  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Member Number</th>
                      <th>Service</th>
                      <th>RegDate</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Member Number</th>
                      <th>Service</th>
                      <th>RegDate</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
 <?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from tblmembers where InstitutionID=:iid and RegService=4";
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
                      <td><?php echo htmlentities($result->FirstName. " ". $result->MiddleName . " ". $result-> LastName);?></td>
                      <td><?php echo htmlentities($result->MemberNo);?></td>
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
                      <td><?php echo htmlentities($result->RegDate);?></td>
					   <td><a href="editmember.php?mid=<?php echo htmlentities($result->MemberId);?>" class="btn btn-info" >Details</a>
                                         </td>
                    </tr>
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
            <span aria-hidden="true">??</span>
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

<script>
        function Export()
        {
            var conf = confirm("Export Follower Registered Members to CSV?");
            if(conf == true)
            {
                window.open("exportfollower.php", '_blank');
            }
        }
    </script>
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/gms.js"></script>
  <script src="../assets/js/gms.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>

</body>

</html>
