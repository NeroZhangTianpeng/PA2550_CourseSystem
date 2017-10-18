<?php session_start(); ?>
<html>
<?php
  include 'includes/db.php';

  $studentId=$_SESSION['userId'];

  $sql = "SELECT student.studentName,student.studentId
    				FROM student WHERE studentId = $studentId";
    		
   $sql2 = "SELECT student_course.courseId, 
    				course.courseName,
    				course.courseTeacher,course.startTimeOfExam,
            course.finishTimeOfExam,course.roomOfExam
			FROM student_course,course 
    		WHERE course.courseId=student_course.courseId AND course.courseId = any(SELECT student_course.courseId
    							FROM student_course
    							WHERE studentId = $studentId)";
?>
<head>
	<title>Student Information</title>
</head>
<body>
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
						<td>CourseTeacher</td>
						<td>Start Time Of Exam</td>
            <td>Finish Time Of Exam</td>
            <td>Room of exam</td>
					</tr>
				</thead>
				<tbody>";
				while ($row = $result2->fetch_assoc()) {
                    echo "<tr><td>" .$row['courseId']. 
                    "</td><td>" .$row['courseName']. 
                    "</td><td>" .$row['courseTeacher'].
                    "</td><td>" .$row['startTimeOfExam'].
                    "</td><td>" . $row['finishTimeOfExam'].
                    "</td><td>" .$row['roomOfExam'].
                    "</td></tr>";
                    	
                }
                echo "</tbody>";
				
			?>
	</table>
	<div>
       <a href="indexStu.php" class="aForBack">BACK</a> 
   </div>
</body>
</html>
