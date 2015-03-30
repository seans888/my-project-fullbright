<?php
if(isset($_POST['add']) && $_POST['name'] != '') {
	$status = add_section($_POST['name'],$_POST['year_level']);
}

if(isset($_GET['edit'])) {
	$result = get_teacher_info($_GET['edit']);
	$result = $result[0];
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=section"'/>
<br><br><br>
<h1>Section Information</h1>

<form method='post'>
<input type='hidden' name='id'/>
Section Name<br/>
<input type='text' name='name'/> <?php echo isset($_POST['name']) && $_POST['name']=='' ? '<font color="red">required!</font>' : '' ?><br/>
Year Level<br/>
<select name='year_level'>
	<option value=1>1st Year</option>
	<option value=2>2nd Year</option>
	<option value=3>3rd Year</option>
	<option value=4>4th Year</option>
</select>
<br/><br><br>	
<?php
if(isset($_POST['add'])) {
	if(isset($status) && $status) {
		echo "<font color='green'>Add Successful</font><br>";
	}
}

?>
<input type='submit' name='add' value='ADD'/>

</form>