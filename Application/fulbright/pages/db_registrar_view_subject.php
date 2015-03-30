<input type='button' value='Add Subject' onclick='window.location = "?page=dashboard&view=subject&add";'/>
<br><br><br>

<form method='post'>
	<input type='text' name='search' size='50'>
	<select name='year_level'>
		<option value=0 <?php echo isset($_POST['year_level']) && $_POST['year_level'] == 0 ? "selected" : '' ?>>Any</option>
		<option value=1 <?php echo isset($_POST['year_level']) && $_POST['year_level'] == 1 ? "selected" : '' ?>>1st Year</option>
		<option value=2 <?php echo isset($_POST['year_level']) && $_POST['year_level'] == 2 ? "selected" : '' ?>>2nd Year</option>
		<option value=3 <?php echo isset($_POST['year_level']) && $_POST['year_level'] == 3 ? "selected" : '' ?>>3rd Year</option>
		<option value=4 <?php echo isset($_POST['year_level']) && $_POST['year_level'] == 4 ? "selected" : '' ?>>4th Year</option>
	</select>
	<select name='teacher'>
		<option value=-1 <?php echo isset($_POST['teacher']) && $_POST['teacher'] == -1 ? "selected" : '' ?>>Any</option>
		<?php 
		$result_teacher = searh_teacher('');
			if($result_teacher != null) {
				foreach($result_teacher as $row) {
				?>
					<option value=<?php echo $row['id'];?> <?php echo isset($_POST['teacher']) && $_POST['teacher'] == $row['id'] ? "selected" : '' ?>><?php echo $row['l_name'].', '.$row['f_name']; ?></option>
				<?php
				}
			}
		?>
	</select>
	<input type='submit' value='Search'>
	
</form>
<br><br>
<table width=100%>
	<tr>
		<th>Section ID</th>
		<th>Subject Name</th>
		<th>Section</th>
		<th>Year Level</th>
		<th>Teacher</th>
		<th></th>
	<tr>
	<?php
		if(isset($_POST['search'])) {
			$result = searh_subject($_POST['search'],$_POST['year_level'],$_POST['teacher']);
			
				if($result != null) {
					foreach($result as $row) {
					?>
					<tr>	
						<td><?php echo $row['subject_id']; ?></td>
						<td><?php echo $row['subject_name']; ?></td>
						<td><?php echo $row['section_name']; ?></td>
						<td><?php echo $row['subject_year_level']; ?></td>
						<td><?php if($row['teacher_name'] != ', ') { echo $row['teacher_name']; } else { echo 'No Teacher';}; ?></td>
						<td>
							<a href='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&edit=$row[subject_id]"; ?>'>[EDIT]</a>
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
						<td></td>
					</tr>
					<?php
				}
				
		} else {
	?>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
	<?php
		}
	?>
</table>