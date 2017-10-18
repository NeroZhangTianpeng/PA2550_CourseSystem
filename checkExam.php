<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/exam.css" />
    <title>Course System - BTH - PA2550 - Group2</title> 
</head>
<body>
<?php
  include 'includes/db.php';

  $sql = "SELECT * FROM course";
    		
?>
<h1>Check Exam</h1>
<div class="divForCheck">
	<table border=1>
	<?php
				$result = $conn->query($sql);
				echo "<thead>
					<tr>
						<td>Course ID</td>
						<td>Course Name</td>
						<td>Course State</td>
						<td>Course Fee</td>
						<td>Course Teacher</td>
						<td>Course Credit</td>
						<td>Pre-requisiteCourse</td>
						<td>Start Time Of Exam</td>
                        <td>Finish Time Of Exam</td>
						<td>Room Of Exam</td>
					</tr>
				</thead>
				<tbody>";
				while ($row = $result->fetch_assoc()) {
                     echo "<tr><td>" .$row['courseId']. 
                    "</td><td>" .$row['courseName']. 
                    "</td><td>" .$row['courseState'].
                    "</td><td>" .$row['courseFee'].
                    "</td><td>" .$row['courseTeacher'].
                    "</td><td>" .$row['courseCredit'].
					"</td><td>".$row['Pre-requisiteCourse'].
                    "</td><td>" .$row['startTimeOfExam'].
                    "</td><td>" . $row['finishTimeOfExam'].
                    "</td><td>" .$row['roomOfExam'].
                    "</td></tr>";
                }
                echo "</tbody>";
				
			?>
	</table>
	    
</div>
	<div>
       <a href="indexAcademic.php" class="aForBack">BACK</a> 
   </div>
</body>
</html>

