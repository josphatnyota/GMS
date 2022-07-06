<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content=" Group Management System">
  <meta name="author" content="Nyota Josphat Muthama">

  <title>GMS</title>
  
  <link rel="icon" href="../assets/img/icon.png" type="image/x-icon">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="../assets/css/styles.min.css" rel="stylesheet">
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script>
function checkAvailabilityMemberid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'memberid='+$("#memberid").val(),
type: "POST",
success:function(data){
$("#memberid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function checkAvailabilityMembernumber() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'membernumber='+$("#membernumber").val(),
type: "POST",
success:function(data){
$("#membernumber-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</head>