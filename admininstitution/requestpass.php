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
                    <h1 class="h4 text-gray-900 mb-4">Request PassCode</h1>
                  </div>
              <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    
                        
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Institution Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" name="phone"type="tel" placeholder="Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" name="message" placeholder="Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        
                   
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-info btn-xl text-uppercase" name="sendMessageButton" id="sendMessageButton" type="submit">Send Request</button>
                    </div>
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

        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../assets/js/gms.min.js"></script>

</body>

</html>
