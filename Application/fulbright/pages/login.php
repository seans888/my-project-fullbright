<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
	$is_login = login($_POST['username'], $_POST['password']);
	
}

if(isset($_SESSION["account_id"]) || isset($is_login) && $is_login) {
?>
Login successful, redirecting...
<script>
setTimeout(function(){
	window.location = "?page=dashboard";
}, 2000);
</script>
<?php
} else {
?>
<form method="post" action='?page=login'>
Username:<br>
<input type="text" name="username"><br>
Password:<br>
<input type="password" name="password"><br>
<?php if(isset($is_login) && !$is_login){?> <font color='red'>Incorrect Username or Password</font><br> <?php } ?>
<input type="submit" name="submit" value="Login"><br>

</form>
<?php
}
?>