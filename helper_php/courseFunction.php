<?php
  include 'includes/db.php';

  $sql = "select * from course";
  $result = $conn->query($sql);

  $courseName = array();
  $j = 0;
  while($rows=$result -> fetch_assoc())
  {
    $courseName[$j] = $rows['courseName'];
    $j++;
  }
 ?>
