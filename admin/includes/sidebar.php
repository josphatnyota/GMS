
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <?php 
$aid=$_SESSION['alogin'];
$sql = "SELECT username,Image from admin where username=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                         
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">         
		<img src="../assets/img/<?php echo htmlentities($result->Image);?>" alt="avatar" style="vertical-align:middle;width:50px;height:auto;max-width:100%;border-radius:300px;">

        </div>
        <div class="sidebar-brand-text mx-3"><span><?php echo htmlentities($result->username)?></span> </div>
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
            <a class="nav-link" href="#"> <i class="fas fa-fw fa-building"></i>GMS</a>
        
      </li>

    

    
      <!-- Divider -->
      <hr class="sidebar-divider">


   
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
 <li class="nav-item">
            <a class="nav-link" href="addinstitution.php"> <i class="fas fa-fw fa-user-plus"></i>Add institition</a>
        
      </li>

    
      <!-- Divider -->
      <hr class="sidebar-divider">


   
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
 <li class="nav-item">
            <a class="nav-link" href="allinstitutions.php"> <i class="fas fa-fw fa-list"></i>Institutions</a>
        
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">


   
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
 <li class="nav-item">
            <a class="nav-link" href="changepassword.php"> <i class="fas fa-fw fa-key"></i>Change Password</a>
        
      </li>
    

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->