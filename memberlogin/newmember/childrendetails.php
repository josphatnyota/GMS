<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['mlogin'])==0)
    {   
header('location:../index.php');
}
?>
<!DOCTYPE html>
<?php include"header.php" ?>
<body>
        
        
           <nav  style="background-color:#032c4b;"class="navbar navbar-collapse navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <span style="color:#fff; font-family:'Calibri';">	GMS</span>
	
  </a>
  <div align="center">
  	<h3 style="font-family:'Calibri'; color:#fff; " ><b>Children Details </b></h3> 
	</div>
</nav>   
        <div class="container">
		
	<div class="row" style="background:#FFFFFF; opacity:0.8;"> 
	<form action="child-submit-exec.php" method="post" id="fileForm" role="form">
	
	<div class="col-md-6">
 
<div class="form-group ">
      <label for="firstname1"><span>* </span> First Name</label>
      <input  class="form-control" type="text" placeholder="first name" name="firstname1" id="firstname1" >
    </div>
    </div>
	<div class="col-md-6">
<div class="form-group ">
<label for="middlename1"><span>* </span>Middle Name</label>
<input id="middlename1" class="form-control" placeholder="middle name" name="middlename1" type="text" autocomplete="off" >
</div>
</div>
	<div class="col-md-6">
<div class="form-group ">
<label for="lastname1"><span>* </span>Surname</label>
<input id="lastname1"  class="form-control" name="lastname1" placeholder="surname" type="text" autocomplete="off" >
</div>
</div>
	<div class="col-md-6">
<div class=" form-group  ">
<label><span>* </span>Date of Birth</label>
<input  name="dob1" type="date" class="form-control" autocomplete="off" >
</div> 
</div> 
	<div class="col-md-6">
<div class="form-group ">
<label for="id1"><span>* </span>National/Passport Id</label>
<input  name="id1" id="id1" placeholder="passport or id number"type="text" class="form-control" autocomplete="off" >
</div> 
</div> 
	<div class="col-md-6">
<div class="form-group  ">
<label for="age1"><span>* </span>Age</label>
<input id="age1"class="form-control"  placeholder="age"name="age1" type="tel" maxlength="3" autocomplete="off" >
 </div>
 </div>
	<div class="col-md-6">
<div class="form-group ">
<label for="gender"><span>* </span>Gender</label>
<select class="form-control"  name="gender1" autocomplete="off" >
<option value="">Gender</option>                                          
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Intersex">Intersex</option>
</select>
</div>
</div>

	<div class="col-md-6">

 <div class="form-group ">
<label for="email1"><span>* </span>Email</label>
<input  name="email1" class="form-control" type="email" placeholder="example@gmail.com"id="email1"  autocomplete="off" >
</div>
</div>
     
	<div class="col-md-6">                                       
<div class="form-group  ">
<label for="mobileno1"><span>* </span>Mobile No.</label>
<input  id="phone"class="form-control" name="mobileno1" placeholder="eg.+25471234567" type="tel" maxlength="25" autocomplete="off">
 </div>



 </div>
	<div class="col-md-10">
<div class="form-group " style="padding-left:50%;">

  <div style="float:left;  padding-right:5px;">
  <a href="spousedetails.php"class="btn btn-danger"  >Back</a></div>
  <div style="float:left;  padding-left:5px;">
  <input class="btn btn-success" type="submit" name="submitchild" value="Submit"/></div>
  <div style="float:left;  padding-left:5px;">
  <input class="btn btn-primary" type="submit" name="submitandadd" value="Add Child"/></div>
            </div>
            </div>
			
             </fieldset>
			 
            </form><!-- ends register form -->
            
	
</div>
 <script src="build/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
     
      utilsScript: "build/js/utils.js",
    });
  </script>
       <?php include"footer.php" ?> 
	   