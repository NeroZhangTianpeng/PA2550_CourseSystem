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
    		
   $sql2 = "SELECT student_course.courseId, 
    				course.courseName,
    				course.courseTeacher,course.startTimeOfExam,course.finishTimeOfExam,course.roomOfExam
			FROM student_course,course 
    		WHERE course.courseId=student_course.courseId AND course.courseId = any(SELECT student_course.courseId
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
						<td>CourseTeacher</td>
						<td>Start Time Of Exam</td>
                        <td>Finish Time Of Exam</td>
                        <td>Room Of Exam</td>
					</tr>
				</thead>
				<tbody>";
				while ($row2 = $result2->fetch_assoc()) {
                    echo "<tr><td>" .$row2['courseId']. 
                    "</td><td>" .$row2['courseName']. 
                    "</td><td>" .$row2['courseTeacher'].
                    "</td><td>" .$row2['startTimeOfExam'].
                    "</td><td>" .$row2['finishTimeOfExam'].
                    "</td><td>" .$row2['roomOfExam'].
                    "</td></tr>";
                    	
                }
				
			?>
	</table>
</div>
	
	<div>
       <a href="indexStu.php" class="aForBack">BACK</a> 
   </div>
</body>
</html>
