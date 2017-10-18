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
    				course.courseTeacher
			FROM student_course,course 
    		WHERE course.courseId=student_course.courseId AND course.courseId 
    		= any( SELECT student_course.courseId
    				FROM student_course
    				WHERE studentId = $studentId)";
    $sql3 = "SELECT courseFolder.id,courseFolder.name,courseFolder.type,courseFolder.courseId
    		 FROM courseFolder
    		 WHERE courseFolder.courseId
    		 = (SELECT student_course.courseId
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
				while ($row = $result2->fetch_assoc()) {
                    echo "<p>CourseID: " .$row['courseId']."	CourseName: " .$row['courseName']. "    Course Teacher: " .$row['courseTeacher']."</p>";
                    	
                }

                $result3 = $conn->query($sql3);
                echo "<thead>
					<tr>
						<td>FoldID</td>
						<td>FoldName</td>
						<td>FoldType</td>
						<td>CourseID</td>
						<td>DownloadLink</td>
						
					</tr>
				</thead>
				<tbody>";
                while ($row = $result3->fetch_assoc()){
                	 echo "<tr><td>" .$row['id']. 
                    "</td><td>" .$row['name']. 
                    "</td><td>" .$row['type'].
                    "</td><td>" .$row['courseId'].
                    "</td><td><a href=download.php?id=".$row['id'].
                    ">Click Here</a></td></tr>";
                }
				
			?>
	</table>
</div>
	
	<div>
       <a href="indexStu.php" class="aForBack">BACK</a> 
   </div>
</body>
</html>