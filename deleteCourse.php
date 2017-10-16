<?php session_start(); ?>
<html>
    <link href="css/index.css" type="text/css" rel="stylesheet">
<body> 
<?php
  include 'helper_php/courseFunction.php';
  include 'includes/db.php';
        
   
    
    $sql = "DELETE FROM `course` WHERE courseId = '$_POST[courseId]'";

if ($conn->query($sql) === TRUE) {
//   echo "Inserted DATA course successfully</br>";
    echo "<script>alert('Delete course successfully!');</script>";
    echo '<script language="javascript">history.go(-1);</script>';
} else {
    echo "<script>alert('Some problems happened! Please contact the technical person!');</script>";
    echo '<script language="javascript">history.go(-1);</script>';
//   echo "Error inserting data into course table: " . $conn->error . "</br>";
}    

    ?>

    </body>
</html>