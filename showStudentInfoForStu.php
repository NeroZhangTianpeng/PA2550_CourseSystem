<?php session_start(); ?>
<html>
<?php
  include 'includes/db.php';

  $studentId=$_SESSION['userId'];

  $sql = "SELECT student.studentName,student.studentId
    				FROM student WHERE studentId = $studentId";
    		
   $sql2 = "SELECT student_course.courseId, student_course.mark,
    				course.courseName,course.courseState,course.courseFee,
    				course.courseTeacher,
    				course.courseCredit,course.`Pre-requisiteCourse`
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
					echo "<tr><td>StudentID: </td><td>" .$row['studentId']. "</td>
							<td>StudentName: </td><td>" .$row['studentName']. "</td></tr>";
				}

				$result2 = $conn->query($sql2);
				while ($row = $result2->fetch_assoc()) {
                    echo "<tr><td>CourseID: </td><td>" .$row['courseId']. 
                    "</td><td>CourseMark: </td><td>" .$row['mark']. 
                    "</td><td>CourseName: </td><td>" .$row['courseName'].
                    "</td><td>CourseState: </td><td>" .$row['courseState'].
                    "</td><td>CourseFee: </td><td>" .$row['courseFee'].
                    "</td><td>CourseTeacher: </td><td>" .$row['courseTeacher'].
                    "</td><td>CourseCredit: </td><td>" .$row['courseCredit'].
                    "</td><td>Pre-requisiteCourse: </td><td>" .$row['Pre-requisiteCourse'].
                    "</td></tr>";
                    	
                }
				
			?>
	</table>
</body>
</html>

