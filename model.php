<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Select Your Location</h4>
        </div>
        <div class="modal-body">

          <form name="model_frm" id="model_frm">
<select name="state" onChange="selectState(this);" id="state" >
<option>Select State</option>
<?php
$sql="SELECT * FROM `state`";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result)
{

echo "<option value='{$row['id']}' >{$row['name']}</option>";  
}


?>
</select>



          </form>
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <script type="text/javascript"> $('#myModal').modal('show'); </script>