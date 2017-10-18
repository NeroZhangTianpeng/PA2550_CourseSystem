<?php session_start(); ?>
<html>
<head>
<!--    <link rel="stylesheet" type="text/css" href="css/index.css" />-->
    <link rel="stylesheet" type="text/css" href="css/showInfo.css" />
    <title>Course System - BTH - PA2550 - Group2</title> 
</head>
	<body>
		<h1>Course System</h1>
<?php
  include 'includes/db.php';

  $studentId=$_SESSION['userId'];

  $sql = "SELECT student.studentName,student.studentId
    				FROM student WHERE studentId = $studentId";
    		
   $sql2 = "SELECT student_course.courseId, student_course.mark,
    		course.courseName,course.courseState,course.courseFee,
    		course.courseTeacher,course.startTimeOfExam,course.finishTimeOfExam,
    		course.roomOfExam,
    		course.courseCredit,course.`Pre-requisiteCourse`			
    	FROM student_course,course 
    	WHERE course.courseId=student_course.courseId AND course.courseId = 
	any(SELECT student_course.courseId
    		FROM student_course
    		WHERE studentId = $studentId)";
	
?>
<div class="divForShow">
    <table border=1>
	<?php
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
						<td>Start Time of Exam</td>
						<td>Finish Time of Exam</td>
						<td>Room of exam</td>
						<td>CourseMark</td>
					</tr>
				</thead>
				<tbody>";
				while ($row = $result2->fetch_assoc()) {
                     			echo "<tr><td>" .$row['courseId']. 
                    			"</td><td>" .$row['courseName']. 
                    			"</td><td>" .$row['courseState'].
                    			"</td><td>" .$row['courseFee'].
                    			"</td><td>" .$row['courseTeacher'].
                   				"</td><td>" .$row['courseCredit'].
								"</td><td>".$row['Pre-requisiteCourse'].
                    			"</td><td>" .$row['startTimeOfExam'].
                    			"</td><td>" .$row['finishTimeOfExam'].
                    			"</td><td>" .$row['roomOfExam'].
                    			"</td><td>" .$row['mark'].
                    			"</td></tr>";
                		}
                		echo "</tbody>";	
			?>
	</table>
</div>
	
	<div>
       <a href="indexStu.php" class="aForBack">BACK</a> 
   </div>
</body>
</html>

