<?php session_start(); ?>
<html>
<body background="images/bg.jpg">
<center>
<?php
  include 'helper_php/courseFunction.php';
  include 'includes/db.php';
  
  if(isset($_POST['submit'])){
  	$courseId=$_POST['courseId'];
  	
  	$studentId=$_SESSION['userId'];
  	//echo $courseId;
  	//echo $studentId;
  	$sql1 = "select * from student_course where courseId = '".$courseId."' and studentId = '".$studentId."'";
	  $sql1_1 = "select * from course where courseId = '".$courseId."'";
    $result1=$conn->query($sql1);
	  $result1_1 = $conn->query($sql1_1);
    
  	if(mysqli_num_rows($result1)){
      echo "<script>alert('You have selected this course')</script>";
    }
	else if(!mysqli_num_rows($result1_1)){echo "<script>alert('There is no this course')</script>";}
  	else {
	  
      $sql2 = "select courseId from student_course where studentId = '".$studentId."'";
      $result2 = $conn->query($sql2);
      while($row2=$result2->fetch_array()){
            $arr[] = $row2["courseId"];
      }
      global $sunCredit;
      $sunCredit=0;
      foreach ($arr as $value) {
        //echo $value;
        $sql3 = "select courseCredit from course where courseId = '".$value."'";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_row();
        $sunCredit=$sunCredit+$row3[0];
      }
      //echo "credit:".$sunCredit;
      $sql4 = "select courseCredit from course where courseId = '".$courseId."'";
      $result4 = $conn->query($sql4);
      $row4 =$result4->fetch_row();
      $addCredit = $row4[0];
      if($sunCredit+$addCredit>8){
        echo "<script>alert('Your credit out of limit')</script>";
      }
      else{
        $sql5 = "SELECT `Pre-requisiteCourse` from course WHERE courseId = '".$courseId."'";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_row();
        $pre_courseId = $row5[0];
        $sql6 = "SELECT mark from student_course WHERE courseId = '".$pre_courseId."' and studentId = '".$studentId."'";
        $result6 = $conn->query($sql6);
        $row6 = $result6->fetch_row();
        $mark = $row6[0];
        if($mark >= 60 || $pre_courseId == NULL){
			$sql7 = "SELECT `courseState` from course WHERE courseId = '".$courseId."'";
			$result7 = $conn->query($sql7);
			$row7 = $result7->fetch_row();
			$courseState = $row7[0];
			if($courseState == "COMPULSORY"){
	            $sql8 = "INSERT INTO  `student_course`
	                  (`studentId`, `courseId`)
	                  VALUES (".$studentId.",".$courseId.") ";
	            if($conn->query($sql8)){
	              echo "<script>alert('You select course: ".$courseId." successfully')</script>";
	            }
	            else{
	              echo "<script>alert('system error!')</script>";
	            }
			}
			else{
				$sql9 = "SELECT `AmountElectiveCourse` FROM student WHERE studentId = '".$studentId."'";
				$result9 = $conn->query($sql9);
				$row9 = $result9->fetch_row();
				$NumEleCourse = $row9[0];
				if($NumEleCourse < 2){
		            $sql10 = "INSERT INTO  `student_course`
		                  (`studentId`, `courseId`)
		                  VALUES (".$studentId.",".$courseId.") ";
		            if($conn->query($sql10)){
					  $NowNumEleCourse = $NumEleCourse + 1;
					  $sql11 = "UPDATE student SET `AmountElectiveCourse` = '".$NowNumEleCourse."' WHERE studentId = '".$studentId."'";
					  if($conn->query($sql11)){
					  	echo "<script>alert('You select course: ".$courseId." successfully')</script>";
					  }
					  else{
					  	echo "<script>alert('You select course: ".$courseId." successfully, but update amount of elective failure')</script>";
					  }
		              
		            }
		            else{
		              echo "<script>alert('system error!')</script>";
		            }
				}
				else{
				  echo "<script>alert('Selected failure! You have selected 2(MAX) elective courses!')</script>";
				}
			}
			
        }
        else{
          echo "<script>alert('You should pass the Pre-requisite Course ID:".$pre_courseId."')</script>";
        }
      }
      //echo mysqli_field_count($result2);
    }
  }
  
?>

<p>Course System</p>
<p> Register courses</p>
<table>
	<?php 
	$choice = "AllCourse";
  $searchId = NULL;
	if(isset($_POST['choose'])){
		$choice = $_POST['choice'];
		$_SESSION['choice'] = $_POST['choice'];
	}
  if(isset($_POST['search'])){
    $searchId = $_POST['searchId'];
  }
	?>
	<form method="post">
		<tr>
			<td>
				<select name="choice">

				  <option value ="AllCourse" <?php if($choice == "AllCourse"){ ?>selected="selected"<?php } ?>>All Courses</option>
				  <option value ="COMPULSORY" <?php if($choice == "COMPULSORY"){ ?>selected="selected"<?php } ?>>Compulsory Courses</option>
				  <option value ="ELECTIVE" <?php if($choice == "ELECTIVE"){ ?>selected="selected"<?php } ?>>Elective Courses</option>
				</select>
			</td>
			<td><input type="submit" name="choose" id="choose" value="choose"></td>
		</tr>
	</form>	
</table>
<form method="post">
  <table>
    <tr>
      <td>CourseId:</td>
      <td><input type="text" name="searchId"></td>
      <td><input type="submit" name="search" value="search"></td>
    </tr>
  </table>
</form>
<table border=1>
    <thead>
    <tr>
        <td>Course ID</td>
        <td>Course Name</td>
        <td>Course State</td>
        <td>Course Fee</td>
        <td>Course Teacher</td>
        <td>Choose Credit</td>
        <td>Pre-requisite Course</td>
    </tr>
    </thead>
    <tbody>

    <?php 
	

	//$resultCourse = courseShow("",$conn);
  $r = courseShow($choice, $searchId, $conn);
  if(mysqli_num_rows($r) != 0){
    foreach ($r as $row) {
        echo "<tr><td>".$row['courseId']."</td><td>".$row['courseName']."</td><td>".$row['courseState']."</td><td>".$row['courseFee']."</td><td>".$row['courseTeacher']."</td><td>".$row['courseCredit']."</td><td>".$row['Pre-requisiteCourse']."</td></tr>";
    }
  }
  else{
    echo "<script>alert('No this course!')</script>";
    $r = courseShow($choice, NULL, $conn);
    foreach ($r as $row) {
        echo "<tr><td>".$row['courseId']."</td><td>".$row['courseName']."</td><td>".$row['courseState']."</td><td>".$row['courseFee']."</td><td>".$row['courseTeacher']."</td><td>".$row['courseCredit']."</td><td>".$row['Pre-requisiteCourse']."</td></tr>";
    }
  }
	 ?>

    </tbody>
</table>
<form method="post">
<table>
	<tr>
		<td>The course ID you want to select</td>
		<td><input type="text" name="courseId" id="courseId"></td>
		<td><input type="submit" name="submit" id="submit" value="choose"><td>
	</tr>
</table>
</form>
<a href="indexStu.php">BACK</a>
</center>
</body>
</html>

