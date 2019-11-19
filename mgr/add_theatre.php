<?php
    include_once('dbs.php');
    ?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <style type="text/css">
    body {
    background-color: #413D3D;
}
 
.grid {
    width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 10px 50px 50px 50px;
    border: 2px solid #cbcbcb;
    
}
 
.grid h1 {
    font-family: "sans-serif";
    background-color: brown;
    font-size: 60px;
    text-align: center;
    color: #ffffff;
    padding: 2px 0px;
    
}
 
#score {
    color: #01BBFF;
    text-align: center;
    font-size: 30px;
}
 
.grid #question {
    font-family: "monospace";
    font-size: 30px;
    color: #01BBFF;
}
 
.buttons {
    margin-top: 30px;
}
#form1
{
    width: 300px;
    margin: 0 auto;
    background-color: #fff;
    padding: 10px 50px 50px 50px;
    border: 2px solid #cbcbcb;
    font-family: "monospace";
    font-size: 30px;
    color: #01BBFF;

}
#add{
    background-color: brown;
    width: 100px;
    font-size: 20px;
    color: #fff;
    border: 1px solid #1D3C6A;
    margin: 10px 40px 10px 0px;
    padding: 10px 10px;
}
 
button{
    background-color: #01BBFF;
    width: 250px;
    font-size: 20px;
    color: #fff;
    border: 1px solid #1D3C6A;
    margin: 10px 40px 10px 0px;
    padding: 10px 10px;
}
 
#btn0:hover, #btn1:hover, #btn2:hover, #btn3:hover {
    cursor: pointer;
    background-color: #01BBFF;
}
 
#btn0:focus, #btn1:focus, #btn2:focus, #btn3:focus {
    outline: 0;
}
 
#progress {
    color: #2b2b2b;
    font-size: 18px;
}
</style>

</head>
<body>
    <div class="grid">
        <div id="quiz">
            <h1>Add Theatre Details</h1>
            <hr style="margin-bottom: 20px">
 
            <p id="question"></p>
 
            <div class="buttons">
              <form name="form1" id="form1" method="post" action="add_theatre_action.php">
 <table>
 <tr><td>Theatre Name</td><td><input type="text" name="theatre" ></td></tr>
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
<tr><td>Select District</td><td><select name="district" onchange="setLocation(this)"></select></td></tr>
<!-- <tr><td>Select District: </td><td><select name="district" id="district" onchange="setLocation(this)"> >
<option>Select District</option>
<?php
$sql="SELECT * FROM `district`";
$result=mysqli_query($link,$sql);

if(mysqli_error($link))
{
  die(mysqli_error($link));
}

while($row=mysqli_fetch_assoc($result))
{
echo "<option value='{$row['id']}' >{$row['d_name']}</option>";
}


?>
</select>
</td></tr> -->
 <!-- <tr><td>Location</td><td><input type="text" name="location"></td></tr> -->
 <!-- <tr><td>Morning Show Time</td><td><input type="Time" name="morning"></td></tr>
 <tr><td>Noon Show Time</td><td><input type="Time" name="noon"></td></tr>
 <tr><td>First Show Time</td><td><input type="Time" name="first"></td></tr>
 <tr><td>Second Show Time</td><td><input type="Time" name="second"></td></tr> -->
 <tr><td>No of screens</td><td><input type="number" name="screens"></td></tr>
 <tr><td><input id="add" type="submit" name="submit" value="add"></td></tr>
  </table>
</form>
                
            </div>
            <hr style="margin-top: 50px">
            
        </div>
    </div>
    <script type="text/javascript"> 
  
  
  function setLocation(district)
  {
//alert(district.value);
setCookie('location',district.value,360000);
$('#myModal').modal('hide'); 
  }
  
  
  function stateSelect() {
    // Creating the XMLHttpRequest object
    var request = new XMLHttpRequest();


var frm=document.getElementById('form1');
var state=frm.state.value;



    // Instantiating the request object
    request.open("GET", "get_district.php?state_id="+state);

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
    
 
 
 
</body>
</html>

