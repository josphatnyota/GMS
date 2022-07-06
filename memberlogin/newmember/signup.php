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
  	<h3 style="font-family:'Calibri'; color:#fff; " ><b>Personal Details </b></h3> 
	</div>
</nav>   
            
        <div class="container">
		
	<div class="row" style="background:#FFFFFF; opacity:0.8;">  
	<h3 style="font-family:'Calibri'; color:#032c4b" 
	align="center"><b>Fill all the fields </b></h3> 
	<form action="personaldetails-submit.php" method="post" id="fileForm" role="form">
        <div class="col-md-6">
         <div class="form-group ">
            <label for="phonenumber"><span class="req" style="color:red;">* </span>Phone Number: </label>
    <input required type="text" name="mobile" id="phone" class="form-control phone" maxlength="28" onKeyUp="validatephone(this);" /> 
            

		 </div>
		 </div>
		 <div class="col-md-6">
      <div class="form-group"> 	 
     <label for="maritalstatus"><span class="req" style="color:red;">* </span>Marital Status: </label>
    <select class="form-control" type="text" name="marriagestatus" placeholder="marital status"  id = "maritalstatus"  required /> 
     <option value="">Marital Status</option>
	 <option value="Single">Single</option>
     <option value="Married">Married</option>
     <option value="Remarried">Remarried</option>
     <option value="Divorced">Divorced</option>
     <option value="Widow">Widow</option>
     <option value="Widower">Widower</option>
	 </select>
            </div>
            </div>
<div class="col-md-6">
            <div class="form-group">
   <label for="weddingtype"><span class="req" style="color:red;">* </span>Wedding Type: </label> 
   <select class="form-control"  type="text" name="marriagetype"id = "weddingtype" placeholder="wedding type" />   
        <option value="">Wedding Type</option>
        <option value="Church Wedding">Church Wedding</option>
        <option value="Traditional Wedding">Traditional Wedding</option>
        <option value="Registered Wedding">Registered Wedding</option>
        <option value="N/A">N/A</option>
		</select>        
            </div>
            </div>
			<div class="col-md-6">
			 <div class="form-group">
   <label for="eventdate"><span class="req" style="color:black;">* </span>Event Date: </label> 
   <input class="form-control"  type="date" name="eventdate"id = "eventdate" placeholder="eventdate" />   
                 
            </div>
			
            </div>
			<div class="col-md-6">
            <div class="form-group "> 	 
     <label for="district"><span class="req" style="color:red;">* </span>District: </label>
    <input class="form-control" type="text" name="district" placeholder="District"  id = "district"  required /> 
     
            </div>
            </div>
<div class="col-md-6">
            <div class="form-group ">
   <label for="jumuia"><span class="req" style="color:red;">* </span>Jumuia: </label> 
   <input class="form-control" required type="text" name="jumuia"id = "jumuia" placeholder="jumuia" />   
                 
            </div>
            </div>
			<div class="col-md-6">
 <div class="form-group ">
   <label for="cell"><span class="req" style="color:red;">* </span>Cell: </label> 
   <input class="form-control" required type="text" name="cell"id = "cell" placeholder="cell" />   
                 
            </div>
        
        </div><!-- ends col-6 -->
		<div class="col-md-10">
			<span style="color:#032c4b">Postal Details</span>
			</div>
			<div class="col-md-6">
			<div class="form-group"> 	 
     <label for="address"><span class="req" style="color:red;">* </span> Postal Address: </label>
    <input class="form-control" type="text" name="address" placeholder="postal address" id = "text" onkeyup = "validatmemberno(this)" required /> 
            
            </div>
            </div>
			<div class="col-md-6">
			 <div class="form-group "> 	 
     <label for="postalcode"><span class="req" style="color:red;">* </span>Postal Code: </label>
    <input class="form-control" type="text" placeholder="postal code" name="postalcode" id = "pc" onkeyup = "validatephone(this)" required />    
            </div>
            </div>
			<div class="col-md-6">
			   <div class="form-group"> 	 
     <label for="town"><span class="req" style="color:red;">* </span> Town: </label>
    <input class="form-control" type="text" name="town" placeholder="town" id = "txt" onkeyup = "Validate(this)" required /> 
          </div>
          </div>
			<div class="col-md-6">
			   <div class="form-group "> 	 
     <label for="country"><span class="req" style="color:red;">* </span>Country: </label>
    <input class="form-control" type="text" name="country" placeholder="country" id = "txt" onkeyup = "Validate(this)" required />
            </div>
			</div>
		
		    <div class="col-md-10">
			<span style="color:#032c4b">Resdence Details</span>
			</div>
			<div class="col-md-6">
            
			<div class="form-group"> 	 
     <label for="residenceaddress"><span class="req" style="color:red;">* </span> Residence Address: </label>
    <input class="form-control" type="text" name="residenceaddress" placeholder="Eg. 20 Sunny Street"id = "text" onkeyup = "validatmemberno(this)" required /> 
           
            </div>
            </div>
			<div class="col-md-6">
			<div class="form-group">
           <label for="houseno"><span class="req" style="float:left;color:red;">* </span>House No: </label> 
    <input class="form-control" type="text" name="houseno" id = "txt" onkeyup = "validatmemberno(this)" placeholder="Eg.W788" required />  
                        
            </div>
            </div>
			<div class="col-md-6">
			<div class="form-group">
           <label for="estate"><span class="req" style="float:left;color:red;">* </span>Estate: </label> 
    <input class="form-control" type="text" name="estate" id="txt" onkeyup = "validatmemberno(this)" placeholder="Estate" required />  
                      
            </div>
            </div>
			<div class="col-md-6">
			<div class="form-group">
           <label for="road"><span class="req" style="float:left;color:red;">* </span>Road: </label> 
    <input class="form-control" type="text" name="road" id = "txt" onkeyup = "validatmemberno(this)" placeholder="Road" required />  
                        
            </div>
            </div>
			<div class="col-md-6">
			<div class="form-group ">
           <label for="town"><span class="req" style="float:left;color:red;">* </span>Town: </label> 
    <input class="form-control" type="text" name="hometown" id = "txt" onkeyup = "validatmemberno(this)" placeholder="Town" required />  
                       
            </div>
            </div>
			<div class="col-md-6">
			<div class="form-group ">
           <label for="county"><span class="req" style="float:left;color:red;">* </span>County: </label> 
    <input class="form-control" type="text" name="homecounty" id = "txt" onkeyup = "validatmemberno(this)" placeholder="county" required />  
                        <div id="errLast"></div>
            </div>
            </div>
			<div class="col-md-6">
			<div class="form-group">
           <label for="country"><span class="req" style="float:left;color:red;">* </span>Country: </label> 
    <input class="form-control" type="text" name="homecountry" id = "txt" onkeyup = "validatmemberno(this)" placeholder="country" required />  
                        <div id="errLast"></div>
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
 
       <?php include"footer.php" ?>