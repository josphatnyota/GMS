
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <?php 
$iid=$_SESSION['mlogin'];
$sql = "SELECT * from  tblmembers where MemberId=:iid ";
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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">         
		<img src="../assets/img/members/<?php echo htmlentities($result->Image);?>" alt="avatar" style="vertical-align:middle;width:50px;height:auto;max-width:100%;border-radius:300px;">

        </div>
        <div class="sidebar-brand-text mx-3"><span><?php echo htmlentities($result->MemberId)?></span> </div>
      </a>
<?php }} ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
     
      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
            <a class="nav-link" href="memberdetails.php"> <i class="fas fa-fw fa-user"></i>My Profile</a>
        
      </li>
    

   

   
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
 <li class="nav-item">
            <a class="nav-link" href="changepassword.php"> <i class="fas fa-fw fa-key"></i>Change Password</a>
        
      </li>
   
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
 <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
      </li>
    

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->