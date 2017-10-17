<?php
	include 'includes/db.php';

	function checkStudent($studentId){
		global $conn;
		$judgement = FALSE;
		$sql = "SELECT studentId FROM student WHERE studentId=$studentId";
		$result = $conn->query($sql);
		if($result->num_rows>0){
			$judgement = TRUE;
		} else{
			echo "No this student.";
		}
		return $judgement;
	}
?>