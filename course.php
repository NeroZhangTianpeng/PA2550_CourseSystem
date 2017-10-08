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
  	$sql = "select * from student_course where courseId = '".$courseId."' and studentId = '".$studentId."'";
    $result1=$conn->query($sql);
    
  	if(mysqli_num_rows($result1)){
      echo "<script>alert('You have select this course')</script>";
    }
  	else {
      $sql2 = "select courseId from student_course where studentId = '".$studentId."'";
      $result2 = $conn->query($sql2);
      while($row1=$result2->fetch_array()){
            $arr[] = $row1["courseId"];
      }
      global $sunCredit;
      $sunCredit=0;
      foreach ($arr as $value) {
        //echo $value;
        $sql3 = "select courseCredit from course where courseId = '".$value."'";
        $result3 = $conn->query($sql3);
        $row2 = $result3->fetch_row();
        $sunCredit=$sunCredit+$row2[0];
      }
      echo "credit:".$sunCredit;
      $sql4 = "select courseCredit from course where courseId = '".$courseId."'";
      $result4 = $conn->query($sql4);
      $row3 =$result4->fetch_row();
      $addCredit = $row3[0];
      if($sunCredit+$addCredit>4){
        echo "<script>alert('Your credit out of limit')</script>";
      }
      else{
        $sql5 = "INSERT INTO  `student_course`
                (`studentId`, `courseId`)
                VALUES (".$studentId.",".$courseId.") ";
        if($conn->query($sql5)){
          echo "<script>alert('You select course successfully')</script>";
        }
        else{
          echo "<script>alert('system error!')</script>";
        }
      }
      //echo mysqli_field_count($result2);
    }
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

    <?php foreach ($result as $row) {
        echo "<tr><td>".$row['courseId']."</td><td>".$row['courseName']."</td><td>".$row['courseState']."</td><td>".$row['courseFee']."</td><td>".$row['courseTeacher']."</td><td>".$row['courseCredit']."</td><td>".$row['Pre-requisiteCourse']."</td></tr>";
    } ?>

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

