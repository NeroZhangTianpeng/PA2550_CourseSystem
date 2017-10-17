<?php session_start(); ?>
<html>
<?php
  include 'includes/db.php';

  $studentId=$_SESSION['userId'];

  $sql = "SELECT student.studentName,student.studentId
    				FROM student WHERE studentId = $studentId";
    		
   $sql2 = "SELECT student_course.courseId, 
    				course.courseName,course.courseFee,
    				course.courseTeacher
						FROM student_course,course 
    					WHERE course.courseId=student_course.courseId AND course.courseId = any(SELECT student_course.courseId
    							FROM student_course
    							WHERE studentId = $studentId)";
	$sql3 = "SELECT SUM(courseFee) as TotalFee 
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
						<td>CourseFee</td>
						<td>CourseTeacher</td>
					</tr>
				</thead>
				<tbody>";
				while ($row = $result2->fetch_assoc()) {
                    echo "<tr><td>" .$row['courseId']. 
                    "</td><td>" .$row['courseName']. 
                    "</td><td>" .$row['courseFee'].
                    "</td><td>" .$row['courseTeacher'].
                    "</td></tr>";
                }
				$result = $conn->query($sql3);
				
				while ($row = $result->fetch_assoc()) {
					
					echo "<tr><td>Total Fee: </td><td>" .$row['TotalFee']. "</td></tr>";
				}
				
			?>
	</table>
	<div>
       <a href="indexStu.php" class="aForBack">BACK</a> 
   </div>
</body>
</html>

