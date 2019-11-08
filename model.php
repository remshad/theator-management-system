<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Select Your Location</h4>
        </div>
        <div class="modal-body">

<table>
          <form name="model_frm" id="model_frm" action='#' method='post'>
<tr><td>Select State: </td><td><select name="state" onChange="stateSelect(this);" id="state" >
<option>Select State</option>
<?php
$sql="SELECT * FROM `state`";
$result=mysqli_query($link,$sql);

if(mysqli_error($link))
{
  die(mysqli_error($link));
}

while($row=mysqli_fetch_assoc($result))
{
echo "<option value='{$row['id']}' >{$row['s_name']}</option>";
}


?>
</select>
</td></tr>
<tr><td>Select District</td><td><select name="district" ></select></td></tr>
<tr><td colspan="2" style="text-align:center; margin:10px;"><input type="button" value="submit" onClick="setLocation()"></td></tr>

          </form>
         </table>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <script type="text/javascript"> $('#myModal').modal('show'); 
  
  function setLocation(location)
  {


  }
  
  
  function stateSelect() {
    // Creating the XMLHttpRequest object
    var request = new XMLHttpRequest();

var frm=document.getElementById('model_frm');
var state=frm.state.value;




    // Instantiating the request object
    request.open("GET", "ajax/state.php?state_id="+state);

    // Defining event listener for readystatechange event
    request.onreadystatechange = function() {
        // Check if the request is compete and was successful
        if(this.readyState === 4 && this.status === 200) {
//          console.log(this.response);
            // Inserting the response from server into an HTML element
            frm.district.innerHTML = this.responseText;
        }
    };

    // Sending the request to the server
    request.send();
}





</script>