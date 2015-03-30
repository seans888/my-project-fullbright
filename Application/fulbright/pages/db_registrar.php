<?php
if(!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='class')) {
	if(isset($_GET['edit'])) {
		include('/db_registrar_edit_class.php');
	} elseif(isset($_GET['add'])) {
		include('/db_registrar_add_student.php');
	} else {
		include('/db_registrar_view_class.php');
	}
} elseif(!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='student')) {
	if(isset($_GET['edit'])) {
		include('/db_registrar_edit_student.php');
	} elseif(isset($_GET['add'])) {
		include('/db_registrar_add_student.php');
	} else {
		include('/db_registrar_view_student.php');
	}
} elseif(!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='teacher')) {
	if(isset($_GET['edit'])) {
		include('/db_registrar_edit_teacher.php');
	} elseif(isset($_GET['add'])) {
		include('/db_registrar_add_teacher.php');
	} else {
		include('/db_registrar_view_teacher.php');
	}
} elseif(!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='section')) {
	if(isset($_GET['edit'])) {
		include('/db_registrar_edit_section.php');
	} elseif(isset($_GET['add'])) {
		include('/db_registrar_add_section.php');
	} else {
		include('/db_registrar_view_section.php');
	}

} elseif(!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='subject')) {
	if(isset($_GET['edit'])) {
		include('/db_registrar_edit_subject.php');
	} elseif(isset($_GET['add'])) {
		include('/db_registrar_add_subject.php');
	} else {
		include('/db_registrar_view_subject.php');
	}

}
?>