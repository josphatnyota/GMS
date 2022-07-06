<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['mlogin'])==0)
    {   
header('location:../index.php');
}
?><!DOCTYPE html>
<?php include"header.php" ?>
<body>
        
         <nav  style="background-color:#032c4b;"class="navbar navbar-collapse navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <span style="color:#fff; font-family:'Calibri';">	GMS</span>
	
  </a>
  <div align="center">
  	<h3 style="font-family:'Calibri'; color:#fff; " ><b>Spouse Details </b></h3> 
	</div>
</nav> 
            
        <div class="container">
		
	<div class="row" style="background:#FFFFFF; opacity:0.8;"> 
	<form action="spousedetails-submit.php" method="post" id="fileForm" role="form">
	
		        <div class="col-md-6">
         
            <div class="form-group "> 	 
     <label for="firstname"><span class="req" >* </span> First Name: </label>
    <input class="form-control" type="text" name="firstname" placeholder="input first name"id = "txt" onkeyup = "Validate(this)"  /> 
            
            </div>
            </div>

		   <div class="col-md-6">
            <div class="form-group ">
           <label for="middlename"><span class="req" >* </span> Middle Name: </label> 
    <input class="form-control" type="text" name="middlename" id = "txt" onkeyup = "Validate(this)" placeholder="input your middle name"  />  
                      
            </div>
            </div>
		   <div class="col-md-6">
<div class="form-group">
           <label for="lastname"><span class="req" >* </span>Surname: </label> 
    <input class="form-control" type="text" name="lastname" id = "txt" onkeyup = "Validate(this)" 	placeholder="input your surname"  />  
                      
            </div>
            </div>
           
		   <div class="col-md-6">
<div class="form-group">
  <label for="dob"><span class="req" >* </span> Date Of Birth: </label>
  <input  name="dob" type="date" class="form-control" /> 
  </div>
  </div>
		   <div class="col-md-6">
<div class="form-group "> 	 
     <label for="age"><span class="req" >* </span> Age: </label>
    <input class="form-control" type="text" name="age" id = "age" placeholder="age"onkeyup = "validatephone(this)" maxlength="3" /> 
   
            </div>
        </div><!-- ends col-6 -->
		   <div class="col-md-6">
			
			<div class="form-group  "><label for="gender"><span class="req" >* </span>Gender: </label>
              <select class="form-control" name="gender"  autocomplete="off">
              <option value="">Gender</option>                                          
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Intersex">Intersex</option>
              </select>
</div>
</div>
		   <div class="col-md-6">
<div class="form-group"> 	 
     <label for="idno"><span>* </span> Passport/Id No: </label>
    <input class="form-control" type="text" name="idno" id = "id" placeholder="passport or id number" onkeyup = "validatephone(this)"  /> 
          
            </div>
            </div>
		   <div class="col-md-6">
			 <div class="form-group ">
   <label for="email"><span class="req" >* </span>Email Address: </label> 
   <input class="form-control" type="email" name="email"id = "email" placeholder="example@gmail.com" onchange="email_validate(this.value);" />   
                      
            </div>
            </div>
		   <div class="col-md-6">
			<div class="form-group ">
            <label for="phonenumber"><span class="req" >* </span>Phone Number: </label>
    <input  type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onKeyUp="validatephone(this);" placeholder="not used for marketing"/> 
            </div>
</div>
	<div class="col-md-10">
			 <div class="form-group ">
           <h5 style="font-family:'Calibri';color:#032c4b" align="center"><b>Work Details </b></h5> 
		   </div>
		   </div>
	 <div class="col-md-6">
          <div class="form-group  ">
			<label for="now"><span class="req" >*  </span> Nature of Work: </label>
              <select class="form-control "  name="now" autocomplete="off">
              <option value="">Nature of Work</option>
          <option value="Self Employed">Self Employed</option>
          <option value="Employed">Employed</option>
          <option value="Unemployed">Unemployed</option>
          <option value="Retired">Retired</option>
		  </select>
</div> 
</div> 
		   <div class="col-md-6">
<div class="form-group "> 	 
     <label for="employer"><span class="req" >* </span> Employer Name: </label>
    <input class="form-control" type="text" name="employer" placeholder="employer name"id = "text" onkeyup = "validatmemberno(this)" /> 
           
            </div>
            </div>
		   <div class="col-md-6">
			<div class="form-group ">
           <label for="businessname"><span class="req" >* </span>Business Name: </label> 
    <input class="form-control" type="text" name="businessname" id = "txt" onkeyup = "validatmemberno(this)" placeholder="business name" />  
                        
            </div>
            </div>
		   <div class="col-md-6">
			<div class="form-group ">
           <label for="rank"><span class="req" >* </span>Position/Rank: </label> 
    <input class="form-control" type="text" name="rank" id="txt" onkeyup = "validatmemberno(this)" placeholder="eg. Manager" />  
                      
            </div>
            </div>
			<div class="col-md-10">
			 <div class="form-group ">
           <h5 style="font-family:'Calibri';color:#032c4b" align="center"><b>Work Location </b></h5> 
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
			 <div class="form-group col">
           <h5 style="font-family:'Calibri';color:#032c4b" align="center"><b>Work Address </b></h5> 
		   </div>
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
    <input class="form-control" type="text" placeholder="postal code" name="workpostalcode" id = "code" onkeyup = "validatephone(this)"  />    
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
			 <div class="form-group col">
           <h5 style="font-family:'Calibri';color:#032c4b" align="center"><b>Work Contact </b></h5> 
		   </div>
		   </div>
		   <div class="col-md-6">
		   <div class="form-group ">
   <label for="email"><span class="req">* </span>Email Address: </label> 
   <input class="form-control"  type="email" placeholder="example@work.co.ke" name="workemail"id = "email"  onchange="email_validate(this.value);" />   
                       
            </div>
            </div>
		   <div class="col-md-6">
<div class="form-group ">
            <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
    <input  type="text" name="workphonenumber" id="phone2" class="form-control phone" maxlength="28"onKeyUp="validatephone(this);" placeholder="not used for marketing"/> 
            </div>
            </div>
		   <div class="col-md-6">
			<div class="form-group ">
            <label for="phonenumber"><span class="req">* </span> Other Phone Number: </label>
    <input  type="text" name="workotherphonenumber" id="phone3" class="form-control phone" maxlength="28"onKeyUp="validatephone(this);" placeholder="optional"/> 
            </div>
		   </div>
		   <div class="col-md-10">
<div class="form-group " style="padding-left:50%;">

  <div style="float:left;  padding-right:5px;">
  <a href="workdetails.php"class="btn btn-danger"  >Back</a></div>
  <div style="float:left;  padding-left:5px;">
  <input class="btn btn-success" type="submit" name="submitfamilydetails" value="Submit"/></div>
  <div style="float:left;  padding-left:5px;">
  <a href="childrendetails.php"class="btn btn-primary"  >Skip</a></div>
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
  <script>
    var input = document.querySelector("#phone3");
    window.intlTelInput(input, {
     
      utilsScript: "build/js/utils.js",
    });
  </script>

       <?php include"footer.php" ?> 
	   