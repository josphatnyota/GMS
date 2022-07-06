   <!-- Message Modal-->
  <div class="modal fade" id="modalmessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Message</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
		<?php
$mid=$_GET['id'];
$sql = "SELECT * from tblmessages where InstitutionID=:232323 and  id=:mid";
$query->bindParam(':mid',$mid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
<li>
        <div class="modal-body">
                    <div class="text-truncate"><?php echo htmlentities($result->Message);?></div></div>
<?php }} ?>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
		 <p class="copyright"> &copy<script>document.write(new Date().getFullYear());</script> <a target="_blank" href="http://www.jappstech.com/">JIBU APP SOLTECH </a></p>

          </div>
        </div>
      </footer>
      <!-- End of Footer -->