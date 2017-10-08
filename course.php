<?php session_start(); ?>
<html>
<?php
  include 'helper_php/courseFunction.php';
  include 'includes/db.php';
  
  if(isset($_POST['submit'])){
  	$courseId=$_POST['courseId'];
  	
  	$studentId=$_SESSION['studentId'];
  	echo $courseId;
  	echo $studentId;
  	$sql = "select * from course_student when `courseId` = ".$courseId." and `studentId` = ".$studentId."";
  	if($conn->query($sql)){echo "<script>alert('1')</script>";}
  	else {echo "<script>alert('2')</script>";}
  }
  
?>

<p>Course System</p>
<p> Register compulsory courses</p>
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
    <tr>
        <?php foreach ($courseName as $key => $value){
          // for($i=0; $i<count($courseName); $i++){
              echo "<td>" . $value . "</td>";
          // }
        }

           ?>

        <!-- <td>Math2</td>
        <td>Math1</td> -->
        <td>2017</td>
        <td>Zhang</td>
        <td><a href="chooseCourseJudge.php">choose</a></td>
    </tr>
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

</body>
</html>

