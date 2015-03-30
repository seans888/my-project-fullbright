<?php
if(isset($_POST['add']) && $_POST['f_name'] != '' && $_POST['l_name'] != '' && $_POST['username'] != '' && $_POST['password'] != '') {
	$status = add_teacher($_POST['f_name'],$_POST['l_name'],$_POST['username'],$_POST['password']);
}

if(isset($_GET['edit'])) {
	$result = get_teacher_info($_GET['edit']);
	$result = $result[0];
}
?>

<input type='button' value='BACK' onclick='window.location = "?page=dashboard&view=teacher"'/>
<br><br><br>
<h1>Teacher Information</h1>

<form method='post'>
<input type='hidden' name='id'/>
First Name<br/>
<input type='text' name='f_name'/> <?php echo isset($_POST['f_name']) && $_POST['f_name']=='' ? '<font color="red">required!</font>' : '' ?><br>
Last Name<br/>
<input type='text' name='l_name'/> <?php echo isset($_POST['l_name']) && $_POST['l_name']=='' ? '<font color="red">required!</font>' : '' ?><br>
Username<br/>
<input type='text' name='username'/> <?php echo isset($_POST['username']) && $_POST['username']=='' ? '<font color="red">required!</font>' : '' ?><br>
New Password<br/>
<input type='text' name='password'/><br/><br><br>	
<?php
if(isset($_POST['add'])) {
	if(isset($status) && $status) {
		echo "<font color='green'>Save Successful</font><br>";
	}
}

?>
<input type='submit' name='add' value='ADD'/>

</form>