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
$institutionname=$_POST['institutionname'];
$vision=$_POST['vision'];
$mission=$_POST['mission'];
$values=$_POST['values'];
$objectives=$_POST['objectives'];
$annualtheme=$_POST['annualtheme'];
$diocese=$_POST['diocese'];
$address=$_POST['address'];
$parish=$_POST['parish'];
$website=$_POST['website'];
$congregation=$_POST['congregation'];
$umbrella=$_POST['umbrella'];
$code=$_POST['code'];
$town=$_POST['town'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$initials=$_POST['groupinitials'];
$groupchaplain=$_POST['groupchaplain'];
$chaplaincontact=$_POST['chaplaincontact'];
$chaplainemail=$_POST['chaplainemail'];
$groupname=$_POST['groupname'];
$chaplainemail=$_POST['chaplainemail'];

$sql=" Update tblinstitution set InstitutionName=:institutionname,ChaplainContact=:chaplainemail,ChaplainContact=:chaplaincontact,Initials=:initials,ChaplainFullName=:groupchaplain,GroupName=:groupname,Email=:email,Phone=:phone,Town=:town,PostalCode=:code,Address=:address,Website=:website,Umbrella=:umbrella,Congregation=:congregation,Parish=:parish,Diocese=:diocese,AnnualTheme=:annualtheme,GroupObjectives=:objectives,GroupValues=:values,Mission=:mission,Vision=:vision,ChaplainEmail=:chaplainemail where UserID=:iid";
$query = $dbh->prepare($sql);
$query->bindParam(':chaplaincontact',$chaplaincontact,PDO::PARAM_STR);
$query->bindParam(':chaplainemail',$chaplainemail,PDO::PARAM_STR);
$query->bindParam(':initials',$initials,PDO::PARAM_STR);
$query->bindParam(':groupname',$groupname,PDO::PARAM_STR);
$query->bindParam(':groupchaplain',$groupchaplain,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->bindParam(':town',$town,PDO::PARAM_STR);
$query->bindParam(':code',$code,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':umbrella',$umbrella,PDO::PARAM_STR);
$query->bindParam(':website',$website,PDO::PARAM_STR);
$query->bindParam(':congregation',$congregation,PDO::PARAM_STR);
$query->bindParam(':parish',$parish,PDO::PARAM_STR);
$query->bindParam(':diocese',$diocese,PDO::PARAM_STR);
$query->bindParam(':annualtheme',$annualtheme,PDO::PARAM_STR);
$query->bindParam(':objectives',$objectives,PDO::PARAM_STR);
$query->bindParam(':mission',$mission,PDO::PARAM_STR);
$query->bindParam(':values',$values,PDO::PARAM_STR);
$query->bindParam(':institutionname',$institutionname,PDO::PARAM_STR);
$query->bindParam(':vision',$vision,PDO::PARAM_STR);
$query->bindParam(':chaplainemail',$chaplainemail,PDO::PARAM_STR);
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
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Update Institution</h1>
              </div>
              <form class="user" method="post">
			 <div class="text-center">
			   <?php if($error){?><div class=" alert alert-danger "><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class=" alert alert-success"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                </div>
<?php
$iid=$_GET['id'];
$sql = "SELECT * from  tblinstitution where UserID=:iid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':iid',$iid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{               ?> 
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->InstitutionName);?>" name="institutionname" id="institutionname" placeholder="Institution Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Mission);?>" name="mission" id="mission" placeholder="Mission">
                  </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Vision);?>" name="vision" id="vision" placeholder="Vision" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->GroupValues);?>" name="values" id="values" placeholder="Values" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->GroupObjectives);?>" name="objectives" id="objectives" placeholder="Objectives" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->AnnualTheme);?>" name="annualtheme" id="annualtheme" placeholder="Annual Theme" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Diocese);?>" name="diocese" id="diocese" placeholder="Diocese" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Parish);?>" name="parish" id="parish" placeholder="Parish" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Congregation);?>" name="congregation" id="congregation" placeholder="Congregation" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Umbrella);?>" name="umbrella" id="umbrella" placeholder="Umbrella" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Website);?>" name="website" id="website" placeholder="Website" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Address);?>" name="address" id="address" placeholder="Address" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->PostalCode);?>" name="code" id="code" placeholder="Code" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Town);?>" name="town" id="town" placeholder="Town" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Phone);?>" name="phone" id="phone" placeholder="Phone" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="email" class="form-control form-control" value="<?php echo htmlentities($result->Email);?>" name="email" id="email" placeholder="Email" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->GroupName);?>" name="groupname" id="groupname" placeholder="Group Name" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->Initials);?>" name="groupinitials" id="groupinitials" placeholder="Group Initials" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->ChaplainFullName);?>" name="groupchaplain" id="groupchaplain" placeholder="Group Chaplain" required>
                  </div>
				  <div class="col-sm-6">
                  <input type="text" class="form-control form-control" value="<?php echo htmlentities($result->ChaplainContact);?>" name="chaplaincontact" id="chaplaincontact" placeholder="Chaplain Contact" required>
                </div>
                </div>
                <div class="form-group row">
				
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control" value="<?php echo htmlentities($result->ChaplainEmail);?>" name="chaplainemail" id="chaplainemail" placeholder="Chaplain Email" required>
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