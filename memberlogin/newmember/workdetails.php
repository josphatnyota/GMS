<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['mlogin'])==0)
    {   
header('location:../index.php');
}
?>
<html lang="en" > 
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>GMS</title>
		
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Group Membership System by M.J NYOTA" />
        <meta name="keywords" content="CHURCH,Group Membership,M. JAY  NYOTA,josphat nyota,nyota,nyota josphat,muthama" />
        <meta name="author" content="M.J NYOTA" />
        
        <!-- Styles -->
        <link rel="icon" href="../assets/images/icom.jpg" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="build/css/intlTelInput.css">
		<script src="js/validate.js"></script>
		<link rel="stylesheet" href="css/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/css/style.css">
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
                       
                       
     		   
  <script>
		   $(document).ready(function(){
	// check change event of the text field 
	$("#emailid").keyup(function(){
		// get text emailid text field value 
		var emailid = $("#emailid").val();

		// check emailid name only if length is greater than or equal to 3
		if(emailid.length >= 1)
		{
			$("#status2").html('<img src="loader.gif" /> Checking availability...');
			// check emailid 
			$.post("check_availability.php", {emailid: emailid}, function(data, status2){
					$("#status2").html(data);
			});
		}
		
	});
});
</script>           
      <script>
		   $(document).ready(function(){
	// check change event of the text field 
	$("#memberid").keyup(function(){
		// get text memberid text field value 
		var memberid = $("#memberid").val();

		// check memberid name only if length is greater than or equal to 3
		if(memberid.length >= 1)
		{
			$("#status3").html('<img src="loader.gif" /> Checking availability...');
			// check memberid 
			$.post("check_availability.php", {memberid: memberid}, function(data, status3){
					$("#status3").html(data);
			});
		}
		
	});
});
</script>              
    </head>
<body>     
    <nav  style="background-color:#032c4b;"class="navbar navbar-collapse navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <span style="color:#fff; font-family:'Calibri';">	GMS</span>
	
  </a>
  <div align="center">
  	<h3 style="font-family:'Calibri'; color:#fff; " ><b>Work Details </b></h3> 
	</div>
</nav>    
            
        <div class="container">
		
	<div class="row" style="background:#FFFFFF; opacity:0.8;"> 
	<form action="workdetails-submit.php" method="post" id="fileForm" role="form">
       
<div class="col-md-6">
          <div class="form-group ">
			<label for="now"><span class="req" style="float:left;color:red;">*  </span> Nature of Work: </label>
              <select class="form-control "required  name="now" autocomplete="off">
              <option value="">Nature of Work</option>
          <option value="Self Employed">Self Employed</option>
          <option value="Employed">Employed</option>
          <option value="Unemployed">Unemployed</option>
          <option value="Retired">Retired</option>
		  </select>
</div> 
</div> 
			 <div class="col-md-6">
<div class="form-group"> 	 
     <label for="employer"><span class="req" >* </span> Employer Name: </label>
    <input class="form-control" type="text" name="employer" placeholder="employer name"id = "text" onkeyup = "validatmemberno(this)" /> 
           
            </div>
            </div>
			 <div class="col-md-6">
			<div class="form-group">
           <label for="businessname"><span class="req" >* </span>Business Name: </label> 
    <input class="form-control" type="text" name="businessname" id = "txt" onkeyup = "validatmemberno(this)" placeholder="business name" />  
                        
            </div>
            </div>
			 <div class="col-md-6">
			<div class="form-group  ">
           <label for="rank"><span class="req" >* </span>Position/Rank: </label> 
    <input class="form-control" type="text" name="rank" id="txt" onkeyup = "validatmemberno(this)" placeholder="eg. Manager" />  
                      
            </div>
            </div>
			<div class="col-md-6">
			<div class="form-group ">
           <label for="building"><span class="req" >* </span>Building: </label> 
    <input class="form-control" type="text" name="building" id = "txt" onkeyup = "validatmemberno(this)" placeholder="e.g Imenti House 1st Floor " />  
                        
            </div>
            </div>
			 <div class="col-md-6">
			<div class="form-group ">
           <label for="road"><span class="req" >* </span>Road: </label> 
    <input class="form-control" type="text" name="workroad" id = "txt" onkeyup = "validatmemberno(this)" placeholder="Town"  />  
                       
            </div>
            </div>
			 <div class="col-md-6">
			<div class="form-group ">
           <label for="town"><span class="req" >* </span>Town: </label> 
    <input class="form-control" type="text" name="worktown" id = "txt" onkeyup = "validatmemberno(this)" placeholder="Town"  />  
                       
            </div>
            </div>
			 <div class="col-md-6">
			<div class="form-group ">
           <label for="county"><span class="req" >* </span>County: </label> 
    <input class="form-control" type="text" name="workcounty" id = "txt" onkeyup = "validatmemberno(this)" placeholder="county" />  
                        <div id="errLast"></div>
            </div>
            </div>
			 <div class="col-md-6">
			<div class="form-group ">
           <label for="country"><span class="req" >* </span>Country: </label> 
    <input class="form-control" type="text" name="workcountry" id = "txt" onkeyup = "validatmemberno(this)" placeholder="country" />  
                        <div id="errLast"></div>
            </div>
			</div>
			<div class="col-md-10">
			<span style="color:#032c4b"> Work Postal Details</span>
			</div>
			<div class="col-md-6">
			<div class="form-group "> 	 
     <label for="address"><span class="req">* </span> Postal Address: </label>
    <input class="form-control" type="text" name="workaddress" placeholder="postal address" id = "text" onkeyup = "validatmemberno(this)"  /> 
            
            </div>
            </div>
			 <div class="col-md-6">
			 <div class="form-group "> 	 
     <label for="postalcode"><span class="req" >* </span>Postal Code: </label>
    <input class="form-control" type="text" placeholder="postal code" name="workpostalcode" id = "pc" onkeyup = "validatephone(this)"  />    
            </div>
            </div>
			 <div class="col-md-6">
			   <div class="form-group "> 	 
     <label for="town"><span class="req" >* </span> Town: </label>
    <input class="form-control" type="text" name="worktown2" placeholder="town" id = "txt" onkeyup = "Validate(this)"  /> 
          </div>
          </div>
			 <div class="col-md-6">
			   <div class="form-group "> 	 
     <label for="country"><span class="req" >* </span>County: </label>
    <input class="form-control" type="text" name="workcounty2" placeholder="country" id = "txt" onkeyup = "Validate(this)"  /> 
           
            </div>
            </div>
			 <div class="col-md-6">
			<div class="form-group "> 	 
     <label for="country"><span class="req" >* </span>Country: </label>
    <input class="form-control" type="text" name="workcountry2" placeholder="country" id = "txt" onkeyup = "Validate(this)"  /> 
           
            </div>
			</div>
			<div class="col-md-10">
			<span style="color:#032c4b">Work Contact Details</span>
			</div>
			 <div class="col-md-6">
		   <div class="form-group ">
   <label for="email"><span class="req">* </span>Email Address: </label> 
   <input class="form-control"  type="email" placeholder="example@work.co.ke" name="workemail"id = "email"  onchange="email_validate(this.value);" />   
                       
            </div>
            </div>
			 <div class="col-md-6">

			<div class="form-group ">
            <label for="phonenumber"><span class="req" style="color:black;">* </span>Mobile Number: </label>
    <input  type="text" name="workphonenumber" id="phone2" class="form-control phone" maxlength="28" onKeyUp="validatephone(this); "/> 
            </div>
            </div>
			 <div class="col-md-6">
			<div class="form-group ">
            <label for="phonenumber"><span class="req" style="color:black;">* </span>Other Mobile Number: </label>
    <input  type="text" name="workotherphonenumber" id="phone" class="form-control phone" maxlength="28" onKeyUp="validatephone(this); "/> 
            

        
        <!-- ends col-6 -->
</div>
</div>
			<div class="col-md-10">
<div style="padding-left:50%"class="form-group">
  <input class="btn btn-success" type="submit" name="add" 
  value="Submit">
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
  <script>
    var input = document.querySelector("#phone2");
    window.intlTelInput(input, {
     
      utilsScript: "build/js/utils.js",
    });
  </script>
 
       <?php include"footer.php" ?>