<?php
if(isset($_POST['save']) && $_POST['name'] != '') {
	$status = save_section($_POST['id'],$_POST['name'],$_POST['year_level']);
}

if(isset($_GET['edit'])) {
	$result = get_section_info($_GET['edit']);
	$result = $result[0];
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=section"'/>
<br><br><br>
<h1>Section Information</h1>

<form method='post'>
<input type='hidden' name='id' value='<?php echo $result['id']; ?>'/>
Section Name<br/>
<input type='text' name='name' value='<?php echo $result['name']; ?>'/><?php echo isset($_POST['name']) && $_POST['name']=='' ? '<font color="red">required!</font>' : '' ?><br/>
Year Level<br/>
<select name='year_level'>
	<option value=1 <?php echo $result['year_level'] == 1 ? "selected" : '' ?>>1st Year</option>
	<option value=2 <?php echo $result['year_level'] == 2 ? "selected" : '' ?>>2nd Year</option>
	<option value=3 <?php echo $result['year_level'] == 3 ? "selected" : '' ?>>3rd Year</option>
	<option value=4 <?php echo $result['year_level'] == 4 ? "selected" : '' ?>>4th Year</option>
</select>
<br><br>	
<?php
if(isset($_POST['save'])) {
	if(isset($status) && $status) {
		echo "<font color='green'>Save Successful</font><br>";
	}
}

?>
<input type='submit' name='save' value='SAVE'/>

</form>