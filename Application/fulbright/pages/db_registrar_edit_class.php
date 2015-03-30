<?php
if(isset($_POST['add'])) {
	$status = save_class($_POST['id'],$_POST['student']);
}

if(isset($_GET['edit'])) {
	$result = get_subject_info($_GET['edit']);
	$result = $result[0];
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=class"'/>
<br><br>
<h1><b><?php echo $result['name']; ?></b> Class Management</h1>
<h2>Year Level - <b><?php echo $result['year_level']; ?></b> </h2>

<form method='post'>
<input type='hidden' name='id' value='<?php echo $result['id']; ?>'/>
<?php
	$result_teacher = list_available_student($result['id']);
	
	if($result_teacher != null) {
	
?>
Available Students<br/>

<select name='student'>
	<?php 
		if($result_teacher != null) {
			foreach($result_teacher as $row) {
			?>
				<option value=<?php echo $row['id'];?>><?php echo $row['l_name'].', '.$row['f_name']; ?></option>
			<?php
			}
		}
	?>
</select>	
<?php

if(isset($_POST['add'])) {
	if($status) {
		echo "<font color='green'>Add Successful</font><br>";
	}
}

?>
<input type='submit' name='add' value='ADD'/>
<?php
} else {
?>
<font color='red'>No Available Students</font><br/>
<?php
}
?>
</form>