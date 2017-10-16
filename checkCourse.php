<?php session_start(); ?>
<html>
<?php
  include 'helper_php/courseFunction.php';
  include 'includes/db.php';
    ?>
<link rel="stylesheet" type="text/css" href="css/index.css" />
   
<body>
   <h1>Course System</h1>   
<!--   add course-->
   <div class="divForOperateCourse">
      <div class="divForAddCourse">
      <p>Add Course</p>
       <form action="addCourse.php" method="post" name="AddCourse">
           <input type="text" name="courseName" id="courseName" placeholder="course name" autofocus/></br>
           <input type="text" name="courseState" id="courseState" placeholder="course state"/></br>
           <input type="text" name="courseTeacher" id="courseTeacher" placeholder="course teacher"/></br>
           <input type="text" name="preCourse" id="preCourse" placeholder="pre-requisite course"/></br>
           <input type="number" min="100" name="courseFee" id="courseFee" placeholder="course fee"/></br>
           <input type="number" min="1" max="8" name="courseCredit" id="courseCredit" placeholder="course credits"/></br>
           <input type="submit" name="Add course" value="Submit" class="inputButton"/> 
       </form>
   </div>
       <div class="divForDeleteCourse">
          <p>Delete Course</p>
           <form action="deleteCourse.php" method="post" name="DeleteCourse">
           <input type="text" name="courseId" id="courseId" placeholder="course Id" autofocus/></br>
           <input type="submit" name="Delete course" value="Submit"  class="inputButton"/> 
       </form>
       </div>
   </div>
    
   
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

   <?php
    foreach (courseShow(NULL,$conn) as $row) {
        echo "<tr><td>".$row['courseId']."</td><td>".$row['courseName']."</td><td>".$row['courseState']."</td><td>".$row['courseFee']."</td><td>".$row['courseTeacher']."</td><td>".$row['courseCredit']."</td><td>".$row['Pre-requisiteCourse']."</td></tr>";
    }
    ?>

    </tbody>
    </table>
   </div>
   <div>
       <a href="indexAcademic.php" class="aForBack">BACK</a> 
   </div>
    
</body>
</html>