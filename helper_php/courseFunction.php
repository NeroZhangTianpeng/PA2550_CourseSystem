<?php
  include 'includes/db.php';
  function courseShow($choice = NULL, $searchId = NULL, $conn){
	  $sql = "SELECT * from course";
	  $sqlCom = "SELECT * FROM course WHERE `courseState` = 'COMPULSORY'";
	  $sqlEle = "SELECT * FROM course WHERE `courseState` = 'ELECTIVE'";
	  $sqlId ="SELECT * FROM course WHERE `courseId` = '".$searchId."'";
	  
	  if($searchId != NULL){
	  	$sql = $sqlId;
	  }
	  else if($choice == "COMPULSORY"){
		  $sql = $sqlCom;
	  }
	  else if($choice == "ELECTIVE"){
		  $sql = $sqlEle; 	
	  }
	  $result = $conn->query($sql);

	  $courseName = array();
	  $j = 0;
	  while($rows=$result -> fetch_assoc())
	  {
	    $courseName[$j] = $rows['courseName'];
	    $j++;
	  }
	  return $result;
  }
  
  
 ?>