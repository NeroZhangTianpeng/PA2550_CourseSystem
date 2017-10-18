<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/exam.css" />
    <title>Course System - BTH - PA2550 - Group2</title> 
</head>
<body>
<center>
<?php
  include 'helper_php/courseFunction.php';
  include 'includes/db.php';
  
    if(isset($_POST['submit'])){
        $countTrue = 0;
//        $countCourse = 0;
        $countCourse = getRowNum($conn);
        
        foreach (courseShow(NULL,$conn) as $row) {
            $startTimeOfExam = "startTime" . $row['courseId'];
            $finishTimeOfExam = "finishTime" . $row['courseId'];
            $roomOfExam = "room" . $row['courseId'];
//            echo $timeOfExam . " " . $roomOfExam;
//            echo $_POST[$timeOfExam];
            $courseId = $row['courseId'];
            
//            echo $_SESSION['countCourse'];
            
             if(addExamInfo($_POST[$startTimeOfExam],$_POST[$finishTimeOfExam],$_POST[$roomOfExam],$courseId)){
                 $countTrue ++;
             }
            
            if($countTrue == $countCourse){
                echo "<script>alert('Successfully!')</script>";
                echo "<meta http-equiv=refresh content='0; url=checkExam.php'>"; 
            }else{
                echo "<script>alert('Someting Wrong! Please contact technical staff!')</script>";
            }
        }
        
    }
    
  ?>

<h1>Arrange Exam</h1>

<form method="post" action="" id="addExam">
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
        <td>Exam Start Time</td>
        <td>Exam Finish Time</td>
        <td>Exam Classroom</td>
    </tr>
    </thead>
    <tbody>

    <?php 
	$countCourse = 0;
        
	//$resultCourse = courseShow("",$conn);
	foreach (courseShow(NULL,$conn) as $row) {
        echo "<tr><td>".$row['courseId']."</td><td>".$row['courseName']."</td><td>".$row['courseState']."</td><td>".$row['courseFee']."</td><td>".$row['courseTeacher']."</td><td>".$row['courseCredit']."</td><td>".$row['Pre-requisiteCourse']."</td>";
        
        $startTimeOfExam = "startTime" . $row['courseId'];
        $finishTimeOfExam = "finishTime" . $row['courseId'];
        $roomOfExam = "room" . $row['courseId'];
        
//        echo $timeOfExam;
        ?>
        
       <td><input type="datetime-local" name="<?php echo $startTimeOfExam;?>" ></td>
       <td><input type="datetime-local" name="<?php echo $finishTimeOfExam;?>" ></td>
       <td><input type="text" name="<?php echo $roomOfExam;?>" ></td></tr>
       
     <?php   
    } 
    ?>
    

    </tbody>
</table>
   <input type="submit" name="submit" id="submit" value="Submit" class="submitButton">
    </form>

<a href="indexAcademic.php" >BACK</a>
</center>
</body>
</html>

