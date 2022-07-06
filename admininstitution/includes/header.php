<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search" action="search.php" method="post">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <input class="btn btn-primary" name="searchbtn" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                      
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <ul class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
				<?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from tblmembers where InstitutionID=:iid and Status=1 ";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount=$query->rowCount();?>


                <span class="badge badge-danger badge-counter"><?php echo htmlentities($unreadcount);?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                 New Members
                </h6>
				<?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from  tblmembers where InstitutionID=:iid and Status=1";
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
				<li>
                <a class="dropdown-item d-flex align-items-center" href="editmember.php?mid=<?php echo htmlentities($result->MemberId);?>">
                  <div class="mr-3">
                    <div class="icon-circle ">
                      <i class="fas fa-user"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo htmlentities($result->RegDate);?></div>
                    <span class="font-weight-bold"><?php echo htmlentities($result->FirstName." ".$result->LastName);?></span>
                  </div>
                </a>
</li>
<?php }} ?>
                
               
                <a class="dropdown-item text-center small text-gray-500" href="newmembers.php">Show All</a>
              </div>
            </ul>

            <!-- Nav Item - Messages -->
            <ul class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
				<?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from tblmessages where InstitutionID=:iid and  IsRead=0";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount=$query->rowCount();?>


                <span class="badge badge-danger badge-counter"><?php echo htmlentities($unreadcount);?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
				<?Php
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from tblmessages where InstitutionID=:iid and  IsRead=0";
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
<li>
                <a class="dropdown-item d-flex align-items-center" href="#modalmessage?id=<?php echo htmlentities($result->id);?>">
                 <i class="fas fa-envelope fa-fw"> </i>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?php echo htmlentities($result->MemberName);?></div>
                    <div class="small text-gray-500"><?php echo htmlentities($result->SubmitDate);?></div>
                  </div>
                </a>
               </li>
<?php }} ?>
               
                <a class="dropdown-item text-center small text-gray-500" href="messages.php">More Messages</a>
              </div>
            </ul>

            <div class="topbar-divider d-none d-sm-block"></div>
         <?php 
$iid=$_SESSION['ilogin'];
$sql = "SELECT * from  tblinstitution where UserID=:iid";
$query = $dbh -> prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo htmlentities($result->InstitutionName);?></span>
			<img src="../assets/img/institutionlogo/<?php echo htmlentities($result->Image);?>" alt="avatar" style="vertical-align:middle;width:50px;height:auto;max-width:100%;border-radius:300px;">

              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="institutionprofile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
               
                <a class="dropdown-item" href="changepassword.php">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
<?php }}?>
          </ul>

        </nav>
        <!-- End of Topbar -->