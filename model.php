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
echo "<option value='{$row['state_id']}' >{$row['state_name']}</option>";
}


?>
</select>
</td></tr>
<tr><td>Select District</td><td><select name="district" onchange="setLocation(this)"></select></td></tr>
          </form>
         </table>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <script type="text/javascript"> 
  
  function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}


  var x = getCookie('location');
if (parseInt(x)>0) {
  $('#myModal').modal('hide'); 

  }else{
    $('#myModal').modal('show'); 

  }


  function setLocation(district)
  {
//alert(district.value);
setCookie('location',district.value,360000);
$('#myModal').modal('hide'); 
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