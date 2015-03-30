<input type='button' value='Add Teacher' onclick='window.location = "?page=dashboard&view=teacher&add";'/>
<br><br><br>

<form method='post'>
	<input type='text' name='search' size='50'><input type='submit' value='Search'>
</form>
<br><br>
<table width=100%>
	<tr>
		<th>Teacher ID</th>
		<th>Last Name</th>
		<th>First Name</th>
		<th>Username</th>
		<th></th>
	<tr>
	<?php
		if(isset($_POST['search'])) {
			$result = searh_teacher($_POST['search']);
			
				if($result != null) {
					foreach($result as $row) {
					?>
					<tr>	
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['f_name']; ?></td>
						<td><?php echo $row['l_name']; ?></td>
						<td><?php echo $row['username']; ?></td>
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
		<td></td>
	<?php
		}
	?>
</table>