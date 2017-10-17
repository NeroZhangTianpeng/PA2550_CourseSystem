<?php 
	
	include 'helper_php/checkStudentInAO.php';
	include 'includes/db.php';
    
?>
<html>


	<head>
		<title>Check Student Information For Academic Coordinator</title>
	</head>
	<body>
		<p>Check Student Information For Academic Coordinator</p>
		<p>Please input the to check the information of student:</p>
		<form role="form" action="" method="post" >
			<label for="StudentID">StudentID:</label>
			<input type="number" name="StudentID">
			<input type="submit" name="check" value="Check">
		</form>
		<table border=1>
            <title>Information For Student</title>
            <?php 
            if(isset($_POST['check'])){
    	if (checkStudent($_POST['StudentID'])) {
    		$studentId = $_POST['StudentID'];
    		$sql = "SELECT student.studentName,student.studentId
    				FROM student WHERE studentId = $studentId";
    		
    		$sql2 = "SELECT student_course.courseId, student_course.mark,
    						course.courseName,course.courseState,course.courseFee,
    						course.courseTeacher,course.timeOfExam,
    						course.courseCredit,course.`Pre-requisiteCourse`
							
    				FROM student_course,course 
    				WHERE course.courseId=student_course.courseId AND course.courseId = any(SELECT student_course.courseId
    							FROM student_course
    							WHERE studentId = $studentId)";
            
                $result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo "<tr><td>StudentID: </td><td>" .$row['studentId']. "</td>
							<td>StudentName: </td><td>" .$row['studentName']. "</td></tr>";
				}

				$result2 = $conn->query($sql2);
				while ($row2 = $result2->fetch_assoc()) {
                    echo "<tr><td>CourseID: </td><td>" .$row['courseId']. 
                    "</td><td>CourseMark: </td><td>" .$row['mark']. 
                    "</td><td>CourseName: </td><td>" .$row['courseName'].
                    "</td><td>CourseState: </td><td>" .$row['courseState'].
                    "</td><td>CourseFee: </td><td>" .$row['courseFee'].
                    "</td><td>CourseTeacher: </td><td>" .$row['courseTeacher'].
					"</td><td>TimeOfExam: </td><td>".$row['timeOfExam'].
                    "</td><td>CourseCredit: </td><td>" .$row['courseCredit'].
                    "</td><td>Pre-requisiteCourse: </td><td>" .$row['Pre-requisiteCourse'].
                    "</td></tr>";
                    	
                }
      
    	}

    }
            ?>
		</table>
		<div>
       		<a href="indexAcademic.php" class="aForBack">BACK</a> 
   		</div>
	</body>
</html>
