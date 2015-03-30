<?php
if(!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='class')) {
	include('/db_student_view_grades.php');
}
?>