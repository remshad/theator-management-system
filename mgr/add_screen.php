<?php
session_start();
    include_once('dbs.php');
    $mgr_id=$_COOKIE["share_id"];
      $the_details=mysqli_query($link,"select * from `theatre` where `mgr_id`='$mgr_id'" ) ;
      $th_details=mysqli_fetch_array($the_details);
      $th_id=$th_details['id'];
      $i=0;
      $no_screen=$_SESSION['screens'];
      $today1=date("Y-m-d");
      $today=strtotime($today1);
      // echo $today;
      // $tomorrow=date("Y-m-d",$today);
      // echo $tomorrow;
    ?>
<html>
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
.grid h2 {
    font-family: "sans-serif";
    background-color: brown;
    font-size: 40px;
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
    width: 500px;
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
    background-color: brown;
    width: 120px;
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
<body>
    <div class="grid">
        <div id="quiz">
            <h1>Add Screen Details</h1>
            <hr style="margin-bottom: 20px">
 
            <p id="question"></p>
 
            <div class="buttons">
              <form name="form1" id="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<input type="hidden" name="th_id" value="<?php echo "$th_id"?>" >
<input type="hidden" name="date" value="<?php echo "$today"?>" >
<?php 
for($i=0;$i<$no_screen;$i++)
{
	?>
	<h2>Screen <?php echo $i+1;?></h2>
<table>
 <tr><td>Screen Name</td><td><input type="text" name="sc_name[]"></td></tr>
 <tr><td><a href="#" onclick="addRow('dataTable<?php echo $i;?>')">add</a></td>
 	<!-- <td><input type="button" value="Remove Passenger" onClick="deleteRow('dataTable')" /></td></tr> -->
 <table id="dataTable<?php echo $i;?>" class="form" border="1">
 <tbody>
  <tr>
	<p>
		<td >
		<input type="checkbox" name="chk[]" checked="checked" />
	</td>
	<td>
	<label>Class Name</label>
	<input type="text" name="cl_name<?php echo $i;?>[]">
	</td>
	<td>
	<label>Price</label>
	<input type="text" class="small"  name="cl_price<?php echo $i;?>[]">
	</td>
	<td>
	<label>Seats</label>
	<input type="text" class="small"  name="cl_seats<?php echo $i;?>[]">
	</td>
	</p>
  </tr>
 </tbody>
</table>
  </table>
  <?php
}
?>
  <input id="add" type="submit" name="submit" value="add">
</form>
                
            </div>
            <hr style="margin-top: 50px">
            
        </div>
    </div>
    <?php if(isset($_POST['submit']))
    { 
	$chkbox = $_POST['chk'];
	$sc_name=$_POST['sc_name'];
	//print_r($sc_name);
	for($j=0;$j<$no_screen;$j++)
	{
		$result= mysqli_query($link,"INSERT INTO `screen`(`theatre_id`,`name`,`added_date`) VALUES ('$th_id','$sc_name[$j]','$today')");

      if($result)
      {
      	$sc_id=mysqli_insert_id($link);
      	$cl_name=$_POST['cl_name'.$j];
      	$cl_price=$_POST['cl_price'.$j];
	$cl_seats=$_POST['cl_seats'.$j];
	for($k=0;$k<sizeof($cl_name);$k++)
	{
		$result1= mysqli_query($link,"INSERT INTO `screen_details`(`screen_id`,`class_name`,`price`,`seat_avail`) VALUES ('$sc_id','$cl_name[$k]','$cl_price[$k]','$cl_seats[$k]')");
		if(!$result1)
		{
			die("prepare statement error...");
		}

	}

      }
      else
      {
      	die("prepare statement error...");
      }
	}
	if($j==$no_screen)
	{
	header("Location:index.php");
	}      	  
}				
?>
<!-- <?php foreach($BX_NAME as $a => $b){ ?>
	<tr>
	<p>
		<td>
			<?php echo $a+1; ?>
		</td>
		<td>
			<label>Name</label>
			<input type="text" readonly="readonly" name="BX_NAME[$a]" value="<?php echo $BX_NAME[$a]; ?>">
		</td>
		<td>
			<label for="BX_age">Age</label>
			<input type="text" readonly="readonly" class="small"  name="BX_age[]" value="<?php echo $BX_age[$a]; ?>">
		</td>
		<td>
			<label for="BX_gender">Gender</label>
			<input type="text" readonly="readonly" name="BX_gender[]" value="<?php echo $BX_gender[$a]; ?>">
		</td>
		<td>
			<label for="BX_birth">Berth Pre</label>
			<input type="text" readonly="readonly" name="BX_birth[]" value="<?php echo $BX_birth[$a]; ?>">
		</td>
	</p>
	</tr>
<?php } ?> -->
    
<script type="text/javascript">
	function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount < 10){                            // limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i <colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}
	else
	{
		 alert("Maximum ten screen is allowed to include");
			   
	}
}
// function deleteRow(tableID) {
// 	var table = document.getElementById(tableID);
// 	var rowCount = table.rows.length;
// 	for(var i=0; i<rowCount; i++) {
// 		var row = table.rows[i];
// 		var chkbox = row.cells[0].childNodes[0];
// 		if(null != chkbox && true == chkbox.checked) {
// 			if(rowCount <= 1) {               // limit the user from removing all the fields
// 				alert("Cannot Remove all the Passenger.");
// 				break;
// 			}
// 			table.deleteRow(i);
// 			rowCount--;
// 			i--;
// 		}
// 	}
// }
</script> 
 
 
</body>
</html>

