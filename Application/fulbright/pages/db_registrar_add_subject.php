<?php
if(isset($_POST['add']) && $_POST['name'] != '') {
	$status = add_subject($_POST['name'],$_POST['teacher'],$_POST['section']);
}

if(isset($_GET['edit'])) {
	$result = get_teacher_info($_GET['edit']);
	$result = $result[0];
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=subject"'/>
<br><br><br>
<h1>Subject Information</h1>

<form method='post'>
<input type='hidden' name='id'/>
Subject Name*<br/>
<input type='text' name='name'/> <?php echo isset($_POST['name']) && $_POST['name']=='' ? '<font color="red">required!</font>' : '' ?><br/>
Teacher<br/>
<select name='teacher'>
	<?php 
	$result_teacher = searh_teacher('');
		if($result_teacher != null) {
			foreach($result_teacher as $row) {
			?>
				<option value=<?php echo $row['id'];?>><?php echo $row['l_name'].', '.$row['f_name']; ?></option>
			<?php
			}
		}
	?>
</select><br/>
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