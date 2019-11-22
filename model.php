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



  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-theme">
          
          <h4 class="modal-title">Book Your Ticket</h4>
        </div>
        <div class="modal-body">


          <form name="modal2_frm" class="form-horizontal" id="modal2_frm" action='bookticket.php' method='post'  >
          <div class="form-group">
            
          <label class="control-label" for="date">Select Date </label>
      <div class="col-sm-10"> 
        
       <input type='date' name="date" onChange="datePicked();">
</div>
</div>

<div class="form-group">
<label class="control-label" for="times">Select Timing </label>
      <div class="col-sm-10"> 
        <select name="times" id="times" onChange="timeSelect();"  onblur="timeSelect();" ></select>
      
</div>
</div>
          <div class="form-group">
          <label class="control-label" for="class">Select class </label>
      <div class="col-sm-10"> 
<select name="class"  id="class" onchange="{seat.focus();}" ></select></div></div>
<div class="form-group">
<label class="control-label" for="seat">How many seats  </label>
      <div class="col-sm-10">  <input type="number" name="seat" onBlur="seatEntered(this);" id="seat" ></div></div>
<div class="form-group"><span id="seat_msg"></span></div>
<input type="hidden" name="movid" >
<input type="hidden" name="location" >
<input type="hidden" name="theatre" >
<input type="hidden" name="screen" >
<input type="hidden" name="conv_fee">
<input type="hidden" name="ticket_fare">
<div class="form-group">
          <label class="control-label col-sm-2" for="submit"></label>
      <div class="col-sm-10"> <div class="form-group"><input type='submit' name="submit" value="submit" onClick="return validateForm();" ></div></div>

          </form>
         
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


function ajax(url,id)
{
var request=new XMLHttpRequest();
request.open("GET",url);
request.onreadystatechange=function(){
  if(this.readyState===4 && this.status===200)
  {
//alert(this.responseText);
var assign=document.getElementById(id);
assign.innerHTML=this.responseText;
  }
}
request.send();
}





</script>