<?php session_start(); ?>
<html>
<?php
  include 'helper_php/courseFunction.php';
  include 'includes/db.php';
    ?>
<link rel="stylesheet" type="text/css" href="css/index.css" />
   
<body>
   <h1>Course System</h1>   
   
   <div class="divForTable">
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
   </div>
   <div>
       <a href="indexAcademic.php" class="aForBack">BACK</a> 
   </div>
    
</body>
</html>