<?php
if(isset($_POST['add']) && $_POST['f_name'] != '' && $_POST['l_name'] != '' && $_POST['username'] != '' && $_POST['password'] != '') {
	$status = add_student($_POST['f_name'],$_POST['l_name'],$_POST['username'],$_POST['password'],$_POST['section']);
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=student"'/>
<br><br><br>
<h1>Student Information</h1>

<form method='post'>
First Name<br/>
<input type='text' name='f_name'/> <?php echo isset($_POST['f_name']) && $_POST['f_name']=='' ? '<font color="red">required!</font>' : '' ?><br>
Last Name<br/>
<input type='text' name='l_name'/> <?php echo isset($_POST['l_name']) && $_POST['l_name']=='' ? '<font color="red">required!</font>' : '' ?><br>
Username<br/>
<input type='text' name='username'/> <?php echo isset($_POST['username']) && $_POST['username']=='' ? '<font color="red">required!</font>' : '' ?><br>
New Password<br/>
<input type='text' name='password'/> <?php echo isset($_POST['password']) && $_POST['password']=='' ? '<font color="red">required!</font>' : '' ?><br>
Section<br/>
<select name='section'>
	<?php
		$section_result = get_sections();
		foreach($section_result as $section_result_row) {
			?>
				<option value="<?php echo $section_result_row['id']; ?>"><?php echo $section_result_row['year_level'].' Year - '.$section_result_row['name']; ?></option>
			<?php
		}
	?>
</select><br><br>	
<?php
if(isset($_POST['add'])) {
	if(isset($status) && $status) {
		echo "<font color='green'>Add Student Successful</font><br>";
	}
}

?>
<input type='submit' name='add' value='ADD'/>

</form>