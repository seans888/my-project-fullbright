<?php
if($_SESSION["account_type"]==1) {

} elseif($_SESSION["account_type"]==2) {
	include("/pages/db_student.php");
} elseif($_SESSION["account_type"]==3) {
	include("/pages/db_teacher.php");
} elseif($_SESSION["account_type"]==4) { //Registrar
	include("/pages/db_registrar.php");
}
?>