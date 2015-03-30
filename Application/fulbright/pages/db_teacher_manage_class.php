<?php
if(isset($_POST['save'])) {
	$status = save_grades($_GET['manage'],$_POST['student'],$_POST['q1'],$_POST['q2'],$_POST['q3'],$_POST['q4']);
}
?>

<br>
<table width=100%>
	<tr>
		<th>Last Name</th>
		<th>First Name</th>
		<th>Q1</th>
		<th>Q2</th>
		<th>Q3</th>
		<th>Q4</th>
		<th></th>
	<tr>
	<?php
	if(isset($_GET["manage"])) {
		$result = list_students_in_subject($_GET["manage"]);
			if($result != null) {
				foreach($result as $row) {
					$grade_result = get_grades($_GET["manage"],$row['id']);
					$row_grade = $grade_result[0];
				?>
					<tr>	
						<td><?php echo $row['l_name']; ?></td>
						<td><?php echo $row['f_name']; ?></td>
						
						
						<form method='post'>
						<td><select name='q1'><?php for($x=50;$x<=100;$x++) { ?> <option value='<?php echo $x; ?>' <?php if($row_grade['grade_1']==$x) { echo "selected";} ?>><?php echo $x; ?></option> <?php } ?></select></td>
						<td><select name='q2'><?php for($x=50;$x<=100;$x++) { ?> <option value='<?php echo $x; ?>' <?php if($row_grade['grade_2']==$x) { echo "selected";} ?>><?php echo $x; ?></option> <?php } ?></select></td>
						<td><select name='q3'><?php for($x=50;$x<=100;$x++) { ?> <option value='<?php echo $x; ?>' <?php if($row_grade['grade_3']==$x) { echo "selected";} ?>><?php echo $x; ?></option> <?php } ?></select></td>
						<td><select name='q4'><?php for($x=50;$x<=100;$x++) { ?> <option value='<?php echo $x; ?>' <?php if($row_grade['grade_4']==$x) { echo "selected";} ?>><?php echo $x; ?></option> <?php } ?></select></td>
						<td>
						<input type='hidden' name='student' value='<?php echo $row['id']; ?>'/>
						<input type='submit' value='SAVE' name='save'/>
						</td>
						</form>
						
					</tr>
				<?php
				}
			} else {
				?>
				<tr>	
					<td colspan=7>No students</td>
				</tr>
				<?php
			}
		}
	?>
</table>