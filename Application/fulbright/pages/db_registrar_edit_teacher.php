<?php
if(isset($_POST['save']) && $_POST['f_name'] != '' && $_POST['l_name'] != '' && $_POST['username'] != '') {
	$status = save_teacher($_POST['id'],$_POST['f_name'],$_POST['l_name'],$_POST['username'],$_POST['password'],$_POST['unsubjects'],$_POST['subjects']);
}

if(isset($_GET['edit'])) {
	$result = get_teacher_info($_GET['edit']);
	$result = $result[0];
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=teacher"'/>
<br><br><br>
<h1><b>Teacher Information</b></h1>

<form method='post'>
<input type='hidden' name='id' value='<?php echo $result['id']; ?>'/>
<b>First Name</b><br/>
<input type='text' name='f_name' value='<?php echo $result['f_name']; ?>'/><?php echo isset($_POST['f_name']) && $_POST['f_name']=='' ? '<font color="red">required!</font>' : '' ?><br>
<b>Last Name</b><br/>
<input type='text' name='l_name' value='<?php echo $result['l_name']; ?>'/> <?php echo isset($_POST['l_name']) && $_POST['l_name']=='' ? '<font color="red">required!</font>' : '' ?><br>
<b>Username</b><br/>
<input type='text' name='username' value='<?php echo $result['username']; ?>'/> <?php echo isset($_POST['username']) && $_POST['username']=='' ? '<font color="red">required!</font>' : '' ?><br>
<b>New Password</b><br/>
<input type='text' name='password'/><br/><br><br>

<b>Handled Subjects</b>
<table width=100%>
	<tr>
		<th>Section ID</th>
		<th>Subject Name</th>
		<th>Section</th>
		<th>Year Level</th>
		<th></th>
	<tr>
	<?php
		$result = search_not_available_subject_for_teacher($_GET['edit']);
				if($result != null) {
					foreach($result as $row) {
					?>
					<tr>	
						<td><?php echo $row['subject_id']; ?></td>
						<td><?php echo $row['subject_name']; ?></td>
						<td><?php echo $row['section_name']; ?></td>
						<td><?php echo $row['subject_year_level']; ?></td>
						<td>
							<input type="checkbox" name="unsubjects[]" value='<?php echo $row['subject_id']; ?>'> unassign
						</td>
					</tr>
					<?php
					}
				} else {
					?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php
				}
				
		
	?>
	
	<input type="hidden" name="unsubjects[]" value=''>
	<input type="hidden" name="subjects[]" value=''>
</table>

<b>Available Subjects</b>
<table width=100%>
	<tr>
		<th>Section ID</th>
		<th>Subject Name</th>
		<th>Section</th>
		<th>Year Level</th>
		<th></th>
	<tr>
	<?php
		$result = search_available_subject_for_teacher($_GET['edit']);
			
				if($result != null) {
					foreach($result as $row) {
					?>
					<tr>	
						<td><?php echo $row['subject_id']; ?></td>
						<td><?php echo $row['subject_name']; ?></td>
						<td><?php echo $row['section_name']; ?></td>
						<td><?php echo $row['subject_year_level']; ?></td>
						<td>
							<input type="checkbox" name="subjects[]" value='<?php echo $row['subject_id']; ?>'> assign
						</td>
					</tr>
					<?php
					}
				} else {
					?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php
				}
				
		
	?>
</table>

<?php
if(isset($_POST['save'])) {
	if(isset($status) && $status) {
		echo "<font color='green'>Save Successful</font><br>";
	}
}

?>

<input type='submit' name='save' value='SAVE'/>

</form>