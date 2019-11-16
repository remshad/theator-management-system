<?php
require('login1.php');   
include_once('head.php');
$mgr_id=$_COOKIE["share_id"];
$the_details=mysqli_query($link,"select * from `theatre` where `mgr_id`='$mgr_id'" ) ;
      $th_details=mysqli_fetch_array($the_details);
      $th_id=$th_details['id'];
 $movie_details=mysqli_query($link,"select * from `movie` order by `id` desc" ) ; 
 $movies=array();
		while ($myrow =mysqli_fetch_array($movie_details))
		{
			$movies[]=$myrow;
		}   
$screen_details=mysqli_query($link,"select * from `screen` where `theatre_id`='$th_id'" ) ; 
 $sc_details=array();
		while ($myrow =mysqli_fetch_array($screen_details))
		{
			$sc_details[]=$myrow;
		}       
?>  
<style type="text/css">
	.background {
  position: fixed;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  object-fit: cover;
  height: 100%;
  width: 100%;
}
td {
    margin: 20px;
    padding: 10px;
    border: 0px solid #808080;
    text-align: left;

  }


.form-card {
  border-radius: 2px;
  background: #fff;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.56s cubic-bezier(0.25, 0.8, 0.25, 1);
  max-width: 500px;
  padding: 0;
  margin: 50px auto;
}


.form-card:focus-within {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.form-actions {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  margin-top: 2.25rem;
}

.form-actions .form-btn-cancel {
  -ms-flex-order: -1;
  order: -1;
}
.form-card h2 {
    text-align: center;
    padding: 2px 0px;
    
}
.form-card h1 {
    text-align: center;
    padding: 2px 0px;
    
}



.form-actions > * {
  -ms-flex: 1;
  flex: 1;
  margin-top: 0;
}
body {
  margin: 40px auto;
  background-image: linear-gradient(to top, #a3bded 0%, #6991c7 100%);
}
</style>
<form class="form-card" id="form1" method="post" action="add_timeslot_action.php">
    <h1>Add Movie</h1>
	<h2><?php echo $th_details['theatrename'];?> theatres</h2>
	<table>
<tr><td>Select Movie</td><td>
	<select name="movie">
		<option>select movie</option>
<?php
foreach($movies as $mv)
{
?>
  <option value="<?php echo $mv['id'];?>"><?php echo $mv['name'];?></option>
  <?php
  }
  ?>
</select>
</td></tr>
<tr><td>Starting Time</td><td><input type="date" name="s_date"></td></tr>
<tr><td>Ending Time</td><td><input type="date" name="e_date"></td></tr>
<tr><td>Select Screen</td><td>
	<select name="screen" onChange="screenSelect(this);" id="screen">
		<option>select screen</option>
<?php
foreach($sc_details as $sc)
{
?>
  <option value="<?php echo $sc['id'];?>"><?php echo $sc['name'];?></option>
  <?php
  }
  ?>
</select>
</td></tr>
<tr><td>Select Timeslots</td><select name="slots" id="slots"></select>
<!--  <?php
foreach($time_slot as $ts)
{
?>
<td><input type="checkbox" id="slots" name="slots[]" value="<?php echo date($ts['id']);?>">
  <label for="slots"><?php echo date('h.i',$ts['showtime']);?></label></td><tr><td></td>
  <?php
  }
  ?>  -->
</td></tr>
</table>
    <div class="form-actions">
        <input value="ADD" class="form-btn" name="submit" type="submit">
    </div>
</form>
<script type="text/javascript">
  
  function screenSelect() {
alert("hello");
    // Creating the XMLHttpRequest object
    var request = new XMLHttpRequest();


var frm=document.getElementById('form1');
var screen=frm.screen.value;
//alert(screen);



document.location="get_times.php?screen_id="+screen;
    // Instantiating the request object
//     request.open("GET", "get_times.php?screen_id="+screen);
// //alert(this.responseText);
//     // Defining event listener for readystatechange event
// //     request.onreadystatechange = function() {
// //         // Check if the request is compete and was successful
//         if(this.readyState === 4 && this.status === 200) {
// //         console.log(this.response);
//             // Inserting the response from server into an HTML element
//           alert(this.responseText);
//            //alert(screen);
//             frm.slots.innerHTML = this.responseText;
//         }
//     };

// //     // Sending the request to the server
//    request.send();
// }
</script>
<?php
    include_once('foot.php');
?>  