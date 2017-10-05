<?php
  include 'helper_php/courseFunction.php';
 ?>

<p>Course System</p>
<p> Register compulsory courses</p>
<table>
    <thead>
    <tr>
        <td>Course Name</td>
        <td>Pre-requisite Course</td>
        <td>Course Time</td>
        <td>Course Teacher</td>
        <td>Choose Or Not</td>
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
        <td><a href="#">choose</a></td>
    </tr>
    </tbody>
</table>
