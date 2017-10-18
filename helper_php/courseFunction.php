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

	  /*$courseName = array();
	  $j = 0;
	  while($rows=$result -> fetch_assoc())
	  {
	    $courseName[$j] = $rows['courseName'];
	    $j++;
	  }*/
	  return $result;
  }

function addExamInfo($startTimeOfExam,$finishTimeOfExam,$roomOfExam,$courseId){
    global $conn;
    
    $sql = "UPDATE course SET startTimeOfExam = '$startTimeOfExam', finishTimeOfExam = '$finishTimeOfExam' , roomOfExam = '$roomOfExam' WHERE courseId = '$courseId'";
    
    $result = $conn -> query($sql);
    
    if(isset($result)){
        return true;
    }else return false;
    
}
  
function getRowNum($conn){
     $sql = "SELECT * from course";
	  
    $rowNum = mysqli_num_rows($conn->query($sql));
    
    return $rowNum;

}
  
 ?> 