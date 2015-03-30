<?php
function login($username, $password) {
	require("db/DBCONNECT.php");

	$sql = "SELECT * FROM User WHERE username='".mysqli_real_escape_string($conn, $username)."' && password='".mysqli_real_escape_string($conn, $password)."'";
	$result = mysqli_query($conn, $sql) or die("Connection failed: " . $conn->error);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			global $account_id,$account_type;
			
			$account_id = $row['id'];
			$account_type = $row['type'];
			$_SESSION["account_id"] = $account_id;
			$_SESSION["account_type"] = $account_type;
		}
		mysqli_close($conn);
		return true;
	} else {
		mysqli_close($conn);
		return false;
	}
}
?>