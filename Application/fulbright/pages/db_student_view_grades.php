<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>


<?php
$result = list_student_subjects($_SESSION["account_id"]);
$user_result = get_user($_SESSION["account_id"]);
$user_result = $user_result[0];
?>
<br>
<h1>Welcome <?php echo $user_result['f_name']." ".$user_result['l_name']; ?>!</h1>
<br>
<div id='grades'> <!-- Printable -->

<table width=100%>
	<tr>
		<th>Subject</th>
		<th>Q1</th>
		<th>Q2</th>
		<th>Q3</th>
		<th>Q4</th>
	<tr>
	<?php
			if($result != null) {
				foreach($result as $row) {
				?>
					<tr>	
						<td><?php echo $row['subject_name']; ?></td>
						<td><?php echo $row['grade_1']; ?></td>
						<td><?php echo $row['grade_2']; ?></td>
						<td><?php echo $row['grade_3']; ?></td>
						<td><?php echo $row['grade_4']; ?></td>
						
					</tr>
				<?php
				}
			} else {
				?>
				<tr>	
					<td colspan=7>No grades</td>
				</tr>
				<?php
			}
	?>
</table>  <!-- Printable -->
</div>
<input type='button' value='PRINT' onclick="printContent('grades')"/>