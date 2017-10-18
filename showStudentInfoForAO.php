<?php 
	
	include 'helper_php/checkStudentInAO.php';
	include 'includes/db.php';
    
?>
<html>
<head>
<!--    <link rel="stylesheet" type="text/css" href="css/index.css" />-->
    <link rel="stylesheet" type="text/css" href="css/showInfo.css" />
    <title>Course System - BTH - PA2550 - Group2</title> 
</head>
	<body>
		<h1>Check Student Information</h1>
		<div>
		<div class="divForInput">
		    <strong>Input student ID to check information:</strong>
		    <form role="form" action="" method="post" >
			    <label for="StudentID">Student ID:</label>
			    <input type="number" name="StudentID">
			    <input type="submit" name="check" value="Check">
		    </form>
		    <a href="indexAcademic.php" class="aForBack">BACK</a> 
		</div>
		
		<div class="divForOutput">
		    <table border=1>
            <?php 
            if(isset($_POST['check'])){
    	if (checkStudent($_POST['StudentID'])) {
    		$studentId = $_POST['StudentID'];
    		$sql = "SELECT student.studentName,student.studentId
    				FROM student WHERE studentId = $studentId";
    		
    		$sql2 = "SELECT student_course.courseId, student_course.mark,
    						course.courseName,course.courseState,course.courseFee,
    						course.courseTeacher,course.startTimeOfExam,course.finishTimeOfExam,
    						course.courseCredit,course.`Pre-requisiteCourse`
							
    				FROM student_course,course 
    				WHERE course.courseId=student_course.courseId AND course.courseId = any(SELECT student_course.courseId
    							FROM student_course
    							WHERE studentId = $studentId)";
            
                $result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo "<p>StudentID: " .$row['studentId']."	StudentName: " .$row['studentName']. "</p>";
				}

				$result2 = $conn->query($sql2);
				echo "<thead>
					<tr>
						<td>CourseID</td>
						<td>CourseName</td>
						<td>CourseState</td>
						<td>CourseFee</td>
						<td>CourseTeacher</td>
						<td>CourseCredit</td>
						<td>Pre-requisiteCourse</td>
						<td>Start Time Of Exam</td>
                        <td>Finish Time Of Exam</td>
						<td>Course Mark</td>
					</tr>
				</thead>
				<tbody>";
				while ($row2 = $result2->fetch_assoc()) {
                    echo "<tr><td>" .$row2['courseId']. 
                    "</td><td>" .$row2['courseName']. 
                    "</td><td>" .$row2['courseState'].
                    "</td><td>" .$row2['courseFee'].
                    "</td><td>" .$row2['courseTeacher'].
                    "</td><td>" .$row2['courseCredit'].
					"</td><td>".$row2['Pre-requisiteCourse'].
                    "</td><td>" .$row2['startTimeOfExam'].
                    "</td><td>" . $row2['finishTimeOfExam'].
                    "</td><td>" .$row2['mark'].
                    "</td></tr>";
                }
				echo "</tbody>";
      
    	}

    }
            ?>
		</table>
		</div>
		</div>

    
	</body>
</html>
