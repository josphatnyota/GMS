
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT UserID,Image from  tblinstitution where UserID=:iid";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                         
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon ">         
		<img src="../assets/img/institutionlogo/<?php echo htmlentities($result->Image);?>" alt="avatar" style="vertical-align:middle;width:50px;height:auto;max-width:100%;border-radius:300px;">

        </div>
        <div class="sidebar-brand-text mx-3"><span><?php echo htmlentities($result->UserID)?></span> </div>
      </a>
<?php }} ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
            <a class="nav-link" href="institutionprofile.php"> <i class="fas fa-fw fa-building"></i>Institution</a>
        
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMembers" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-users"></i>
          <span>Members</span>
        </a>
        <div id="collapseMembers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="addmember.php">   <i class="fas fa-fw fa-user-plus"></i>Add</a>
            <a class="collapse-item" href="allmembers.php">   <i class="fas fa-fw fa-users"></i> All</a>
            <a class="collapse-item" href="approved.php">   <i class="fas fa-fw fa-thumbs-up"></i> Approved</a>
            <a class="collapse-item" href="newmembers.php">   <i class="fas fa-fw fa-pen"></i> New</a>
            <a class="collapse-item" href="inactive.php">   <i class="fas fa-fw fa-thumbs-down"></i> Inactive</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComittees" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-users"></i>
          <span>Committees</span>
        </a>
        <div id="collapseComittees" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="addcommittee.php">   <i class="fas fa-fw fa-plus"></i> Add</a>
            <a class="collapse-item" href="allcommittees.php">   <i class="fas fa-fw fa-pen-square"></i> All</a>
          </div>
        </div>
      </li>

     

      <!-- Divider -->
      <hr class="sidebar-divider">

     <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMembership" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-clone"></i>
          <span>Membership</span>
        </a>
        <div id="collapseMembership" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="service.php">   <i class="fas fa-fw fa-clone"></i> Service</a>
            <a class="collapse-item" href="subscription.php">   <i class="fas fa-fw fa-list-alt"></i> Subscription</a>
            <a class="collapse-item" href="status.php">   <i class="fas fa-fw fa-info"></i>Status</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContacts" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-address-book"></i>
          <span>Contacts</span>
        </a>
        <div id="collapseContacts" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="contactlist.php">   <i class="fas fa-fw fa-mobile"></i> Member Mobile</a>
            <a class="collapse-item" href="emaillist.php">   <i class="fas fa-fw fa-envelope"></i> Member Email</a>
            <a class="collapse-item" href="spousecontactlist.php">   <i class="fas fa-fw fa-mobile"></i> Spouse Mobile</a>
            <a class="collapse-item" href="spouseemaillist.php">   <i class="fas fa-fw fa-envelope"></i> Spouse Email</a>
            <a class="collapse-item" href="childcontactlist.php">   <i class="fas fa-fw fa-mobile"></i> Children Mobile</a>
            <a class="collapse-item" href="childemaillist.php">   <i class="fas fa-fw fa-envelope"></i> Children Email</a>
          </div>
        </div>
      </li>
	   <!-- Divider -->
      
      <hr class="sidebar-divider">

     <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereciept" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Reciepts</span>
        </a>
        <div id="collapsereciept" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="reciept.php">   <i class="fas fa-fw fa-plus"></i> Add</a>
            <a class="collapse-item" href="allreciepts.php">   <i class="fas fa-fw fa-pen-square"></i> All</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

     <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUploads" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-arrow-up"></i>
          <span>Uploads</span>
        </a>
        <div id="collapseUploads" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="upload.php">   <i class="fas fa-fw fa-plus"></i> Add</a>
            <a class="collapse-item" href="alluploads.php">   <i class="fas fa-fw fa-list"></i> All</a>
          </div>
        </div>
      </li>
    

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->