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
$sql = "update tblmembers  set GroupPosition='Member',GroupStatus=0  WHERE id=:id";
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
<?php include('includes/sidebar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
       
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php include('includes/header.php');?>
       <!-- Begin Page Content -->
        <div class="container-fluid">

         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">institution Profile</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                  <?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from tblinstitution where UserID=:iid";
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
					<td>Logo</td>
                      <td> <form id="example-form" method="post" action="photo.php" enctype="multipart/form-data"  name="updatemp">
        <div ><a href="../assets/img/institutionlogo/<?php echo htmlentities($result->Image);?>" download>
		<img src="../assets/img/institutionlogo/<?php echo htmlentities($result->Image);?>" alt="avatar"  style="vertical-align:middle;width:100px;height:100px;max-width:100%;border-radius:300px;"></a>
  	  <input type="file" name="image" accept="image/*" required ></div>
	  	
<button type="submit" name="uploadlogo"  id="uploadlogo" class="btn btn-primary">UPLOAD</button>
</form></td>
                      
                      <td>Attire</td>
                      <td> <form id="example-form" method="post" action="photo.php" enctype="multipart/form-data"  name="updatemp">
        <div ><a href="../assets/img/attire/<?php echo htmlentities($result->GroupAttire);?>" download>
		<img src="../assets/img/attire/<?php echo htmlentities($result->GroupAttire);?>" alt="avatar"  style="vertical-align:middle;width:150px;height:100px;max-width:100%;border-radius:0px;"></a>
  	  <input type="file" name="image" accept="image/*"required ></div>
	  	
<button type="submit" name="uploadattire"  id="uploadattire" class="btn btn-primary">UPLOAD</button>
</form></td>
                    </tr>
                    <tr>
                      <td >Name</td>
                      <td><?php echo htmlentities($result->InstitutionName);?></td>
                    </tr>
                    <tr>
                      <td>Mission</td>
                      <td><?php echo htmlentities($result->Mission);?></td>
                      <td>Vision</td>
                      <td><?php echo htmlentities($result->Vision);?></td>
                    </tr>
                    <tr>
                      <td>Values</td>
                      <td><?php echo htmlentities($result->GroupValues);?></td>
                      <td>Objective</td>
                      <td><?php echo htmlentities($result->GroupObjectives);?></td>
                    </tr>
                    <tr>
                      <td>Annual Theme</td>
                      <td><?php echo htmlentities($result->AnnualTheme);?></td>
                      <td>Diocese</td>
                      <td><?php echo htmlentities($result->Diocese);?></td>
                    </tr>
                    <tr>
                      <td>Parish</td>
                      <td><?php echo htmlentities($result->Parish);?></td>
                      <td>Congregation</td>
                      <td><?php echo htmlentities($result->Congregation);?></td>
                    </tr>
                    <tr>
                      <td>Umbrella</td>
                      <td><?php echo htmlentities($result->Umbrella);?></td>
                      <td>Website</td>
                      <td><a href="<?php echo htmlentities($result->Website);?>" target="_blank"><?php echo htmlentities($result->Website);?></a></td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td><?php echo htmlentities($result->Address);?></td>
                      <td>Code</td>
                      <td><?php echo htmlentities($result->PostalCode);?></td>
                    </tr>
                    <tr>
                      <td>Town</td>
                      <td><?php echo htmlentities($result->Town);?></td>
                      <td>Phone</td>
                      <td><?php echo htmlentities($result->Phone);?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?php echo htmlentities($result->Email);?></td>
                    </tr>
                    <tr>
                      <td>Group Name</td>
                      <td><?php echo htmlentities($result->GroupName);?></td>
                      <td>Group Initials</td>
                      <td><?php echo htmlentities($result->Initials);?></td>
                    </tr>
                    <tr>
                      <td>Group Chaplain</td>
                      <td><?php echo htmlentities($result->ChaplainFullName);?></td>
                      <td>Chaplain Contact</td>
                      <td><?php echo htmlentities($result->ChaplainContact);?></td>
                    </tr>
                    <tr>
                      <td>Chaplain Email</td>
                      <td><?php echo htmlentities($result->ChaplainEmail);?></td>
                    </tr>
                   
					<tr>
					<td>  <a href="updateinstitution.php?id=<?php echo htmlentities($result->UserID);?>"  class="btn btn-primary" >Update</a>
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
         <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Group Officials</h1>
         </div>
          <!-- DataTales Example -->
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
                      <th>Member National ID</th>
                      <th>Member Id</th>
                      <th>Position</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Member National ID</th>
                      <th>Member Id</th>
                      <th>Position</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
 <?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from tblmembers where InstitutionID=:iid and GroupStatus=1 ";
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
                      <td><?php echo htmlentities($result->FirstName." ".$result->LastName);?></td>
                      <td><?php echo htmlentities($result->MemberId);?></td>
                      <td><?php echo htmlentities($result->MemberNo);?></td>
                      <td><?php echo htmlentities($result->GroupPosition);?></td>
					   <td><a href="institutionprofile.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you want to remove form member officials?');" class="btn btn-danger" >Remove</a>
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
        <!-- /.container-fluid -->
   
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Group Officials</h1>
         </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Former</h6>
			  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Member National ID</th>
                      <th>Member Id</th>
                      <th>Position</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>id</th>
                      <th>Name</th>
                      <th>Member National ID</th>
                      <th>Member Id</th>
                      <th>Position</th>
                    </tr>
                  </tfoot>
                  <tbody>
 <?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from tblmembers where InstitutionID=:iid and GroupStatus=0 ";
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
                      <td><?php echo htmlentities($result->FirstName."".$result->LastName);?></td>
                      <td><?php echo htmlentities($result->MemberId);?></td>
                      <td><?php echo htmlentities($result->MemberNo);?></td>
                      <td><?php echo htmlentities($result->GroupFormer);?></td>
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

    
       <?php include('includes/footer.php');?>

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