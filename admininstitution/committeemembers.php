<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}else{
	if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "update tblmembers  set CommitteeName='Nill',ConStatus=0  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Member Removed";

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
		  
            <h1 class="h3 mb-0 text-gray-800">Committee Officials and Members</h1>

<a href="exportcommittee.php?cname=<?php echo htmlentities($_GET['cname']);?>" onclick="return confirm('Export Committee to CSV');" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export to CSV </a>          <!-- DataTales Example -->
          </div>
		  <div class="card shadow mb-4">
            <div class="card-header py-3">
			
              <h6 class="m-0 font-weight-bold text-primary">Current</h6>
			  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Committee</th>
                      <th>Position</th>
                      <th>Start Serving</th>
                      <th>End Serving</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Committee</th>
                      <th>Position</th>
                      <th>Start Serving</th>
                      <th>End Serving</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
 <?php 
$iid=$_SESSION['ilogin'];
$cname=$_GET['cname'];
$sql = "SELECT * from tblmembers where InstitutionID=:iid and CommitteeName=:cname and ComStatus=1 ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
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
                      <td><a href="editmember.php?mid=<?php echo htmlentities($result->MemberId);?>"><?php echo htmlentities($result->FirstName." ".$result->LastName);?></a></td>
                      <td><?php echo htmlentities($result->CommitteeName);?></td>
                      <td><?php echo htmlentities($result->Position);?></td>
                      <td><?php echo htmlentities($result->StartServing);?></td>
                      <td><?php echo htmlentities($result->EndServing);?></td>
                                        
								<td><a href="committeemembers.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you want to remove form member officials?');" class="btn btn-danger" >Remove</a>
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
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        
		  <div class="card shadow mb-4">
            <div class="card-header py-3">
			
              <h6 class="m-0 font-weight-bold text-primary">Former Officials & Members</h6>
			  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Committee</th>
                      <th>Start Serving</th>
                      <th>End Serving</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Committee</th>
                      <th>Start Serving</th>
                      <th>End Serving</th>
                    </tr>
                  </tfoot>
                  <tbody>
 <?php 
$iid=$_SESSION['ilogin'];
$cname=$_GET['cname'];
$sql = "SELECT * from tblmembers where InstitutionID=:iid and CommitteeName=:cname and ComStatus=0 ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
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
                      <td><a href="editmember.php?mid=<?php echo htmlentities($result->MemberId);?>"><?php echo htmlentities($result->FirstName." ".$result->LastName);?></a></td>
                      <td><?php echo htmlentities($result->CommitteeName);?></td>
                      <td><?php echo htmlentities($result->StartServing);?></td>
                      <td><?php echo htmlentities($result->EndServing);?></td>
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
<?php } ?>