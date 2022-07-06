<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}
else{
// Code for change password 
if(isset($_POST['change']))
    {
$password=md5($_POST['password']);
$username=$_SESSION['ilogin'];
$status=2;
    $sql ="update tblinstitution set PassCode=:password,Status=:status WHERE UserID=:username";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':status', $status, PDO::PARAM_STR);
$query-> execute();

header('location:dashboard.php?success');

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
                    <h1 class="h4 text-gray-900 mb-4">Set Password Recovery Code</h1>
                  </div>
                  <form class="user" method="post" name="change">
				  <div class="text-center">
                </div>
                    
                    <div class="form-group">
                      <input type="password" class="form-control form-control" name="password"id="exampleInputPassword" placeholder="Security Code" required>
                    </div>
                      <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name="accept" id="customCheck" required>
                        <label class="custom-control-label" for="customCheck">I accept the <a  href="#" data-toggle="modal" data-target="#logoutModal">Terms & Conditions </a> of GMS</label>
                      </div>
                    </div>
                      
                 <input name="change" type="submit" value="Submit"class="btn btn-primary btn-user btn-block">
                      
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
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Privacy Policy



This Privacy Policy details the kind of information we collect from you, how we use it and how we take steps to secure it. The confidentiality and security of the data we collect from you is of priority to us and it is important you read this Privacy Policy carefully to fully understand the terms under which you access and use the GMS system as well as other GMS features and services.

Information We Collect
In the process of registering for an account on the GMS system, we may collect some personal identifiable information including but not limited to your name, age, gender, phone number, email address and address. Some of this information may be retained on our website for future reference and use by us while others may only be used and visible to us during each transaction.

How We Use Information We Collect
GMS collects and uses your personal information to enable us provide services as shown on our website. This personal information may serve a variety of uses, including notifying you about the status of your account, investigating and resolving complaints/problems, assessing users’ interest in different products and services, minimizing fraud and other criminal activity, and for any other reason we deem relevant to your use of GMS, its services and its website.

At any point in time, you may request to stop receiving any of the information we send you. 

To allow us to continually improve our level of service to you, we collect and analyze data about our users' activity on our system. We may also periodically request you to participate in surveys that will give us an indication of your assessment of our level of service, allow us to customize your experience using GMS, and inform us of ways in which we can improve on service delivery.

Security of Information We Collect
GMS makes every attempt to secure your personal information from unauthorized access, use or disclosure. Confidential information we receive from you such as debit/credit card details are handled securely and protected

</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
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
<?php } ?>