<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserID,PassCode,Status FROM tblinstitution WHERE UserID=:uname and PassCode=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->Status;
    $_SESSION['iid']=$result->UserID;
  } 
if($status ==0)
{
 echo "<script>alert('Your Account is Inactive Contact Admin');</script>";
} else{
$_SESSION['ilogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
} }

else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/header2.php');?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                  </div>
                  <form class="user" method="post" name="signin">
				  <div class="text-center">
                </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="exampleInputText" aria-describedby="emailHelp" placeholder="User ID">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password"id="exampleInputPassword" placeholder="Security Code">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                 <input name="signin" type="submit" value="Submit"class="btn btn-primary btn-user btn-block">
                      <a href="requestpass.php" style="float:right">Request Password</a>
                    </input>
                    
                  </form>
                </div>
              </div>
            </div><div class="copyright text-center my-auto">
		                    <small>  <p class="copyright"> &copy<script>document.write(new Date().getFullYear());</script> <a href="http://M. JAYsolution.com/">M.J NYOTA </a></p>
</small>
          </div>
          </div>
        </div>
      </div>

    </div>

  </div>
<div id="preloader"></div>
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/gms.min.js"></script>

</body>

</html>
