<?php
if(isset($_POST['save']) && $_POST['name'] != '') {
	$status = save_subject($_POST['id'],$_POST['name'],-1,$_POST['section']);
}

if(isset($_GET['edit'])) {
	$result = get_subject_info($_GET['edit']);
	$result = $result[0];
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=subject"'/>
<br><br><br>
<h1>Subject Information</h1>

<form method='post'>
<input type='hidden' name='id' value='<?php echo $result['id']; ?>'/>
Subject Name<br/>
<input type='text' name='name' value='<?php echo $result['name']; ?>'/> <?php echo isset($_POST['name']) && $_POST['name']=='' ? '<font color="red">required!</font>' : '' ?><br/>

Section<br/>
<select name='section'>
	<?php
		$section_result = get_sections();
		foreach($section_result as $section_result_row) {
			?>
				<option value="<?php echo $section_result_row['id']; ?>" <?php echo $section_result_row['id'] == $result['section'] ? "selected" : '' ?>><?php echo $section_result_row['year_level'].' Year - '.$section_result_row['name']; ?></option>
			<?php
		}
	?>
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