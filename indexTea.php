<?php
  session_start();
  include 'helper_php/loginFunction.php';
  global $conn;
  $teacherId = $_SESSION['userId'];
  $sql =  "select courseId from teacher where teacherId='".$teacherId."'";
     
  $result = $conn->query($sql);
  if(!$result) die(" error: mysql query");
    while($rows = $result->fetch_assoc()){
    $courseId = $rows['courseId'];
    $_SESSION['courseId'] = $courseId;
  }

    $sql2 = "SELECT * FROM course WHERE `courseId` = '$courseId'"; 
    $result2 = $conn -> query($sql2);
    if(!$result2) die(" error: mysql query");
    while($rows2 = $result2->fetch_assoc()){
        $courseName = $rows2['courseName'];
//        echo $courseName;
        $_SESSION['courseName'] = $courseName;
//        echo $_SESSION['courseName'];
  }
//echo $courseName . $courseId;
//echo $_SESSION['courseName'];

?>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/index.css" />
    <title>Course System - BTH - PA2550 - Group2</title>
</head>


<body>
   <h1>Course System</h1>
   <div>
       <a href="login.php" class="aForLogout">Logout</a>
   </div>

   <div class="divForLeft">
       <p class="divTitle">Course Management</p>
       <li><a href=upload_file.php><?php echo $_SESSION['courseName'];?></a></li>

   </div>
   <div class="divForRight">
       <p class="divTitle">Personal Information</p>
       <li><a href="#"></a></li>
   </div>

<!--    <a href="course.php">Choose Course</a>    -->
</body>
</html>
