<?php
if(!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='class')) {
	if(isset($_GET['manage'])) {
		include('/db_teacher_manage_class.php');
	} elseif(isset($_GET['add'])) {
		include('/db_registrar_add_student.php');
	} else {
		include('/db_teacher_view_class.php');
	}
}
?>