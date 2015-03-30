<input type='button' value='Add Section' onclick='window.location = "?page=dashboard&view=section&add";'/>
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
	<input type='submit' value='Search'>
</form>
<br><br>
<table width=100%>
	<tr>
		<th>Section ID</th>
		<th>Section Name</th>
		<th>Year Level</th>
		<th></th>
	<tr>
	<?php
		if(isset($_POST['search'])) {
			$result = searh_section($_POST['search'],$_POST['year_level']);
			
				if($result != null) {
					foreach($result as $row) {
					?>
					<tr>	
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['year_level']; ?></td>
						<td><a href='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&edit=$row[id]"; ?>'>[EDIT]</a></td>
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
					</tr>
					<?php
				}
				
		} else {
	?>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
	<?php
		}
	?>
</table>