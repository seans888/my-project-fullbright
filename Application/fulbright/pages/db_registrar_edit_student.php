<?php
if(isset($_POST['save']) && $_POST['f_name'] != '' && $_POST['l_name'] != '' && $_POST['username'] != '') {
	$status = save_student($_POST['id'],$_POST['f_name'],$_POST['l_name'],$_POST['username'],$_POST['password'],$_POST['section']);
}

if(isset($_GET['edit'])) {
	$result = get_user($_GET['edit']);
	$result = $result[0];
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=student"'/>
<br><br><br>
<h1>Student Information</h1>

<form method='post'>
<input type='hidden' name='id' value='<?php echo $result['stud_id']; ?>'/> 
First Name<br/>
<input type='text' name='f_name' value='<?php echo $result['f_name']; ?>'/> <?php echo isset($_POST['f_name']) && $_POST['f_name']=='' ? '<font color="red">required!</font>' : '' ?><br>
Last Name<br/>
<input type='text' name='l_name' value='<?php echo $result['l_name']; ?>'/> <?php echo isset($_POST['l_name']) && $_POST['l_name']=='' ? '<font color="red">required!</font>' : '' ?><br>
Username<br/>
<input type='text' name='username' value='<?php echo $result['username']; ?>'/> <?php echo isset($_POST['username']) && $_POST['username']=='' ? '<font color="red">required!</font>' : '' ?><br>
New Password<br/>
<input type='text' name='password'/><br/>
Section<br/>
<select name='section'>
	<?php
		$section_result = get_sections();
		foreach($section_result as $section_result_row) {
			?>
				<option value="<?php echo $section_result_row['id']; ?>"<?php if($result['section']==$section_result_row['id']) { echo "selected";} ?>><?php echo $section_result_row['name']; ?></option>
			<?php
		}
	?>
</select><br><br>	
<?php
if(isset($_POST['save'])) {
	if(isset($status) && $status) {
		echo "<font color='green'>Save Successful</font><br>";
	}
}

?>
<input type='submit' name='save' value='SAVE'/>

</form>