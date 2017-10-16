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
       <li><a href="upload_file.php">Upload File</a></li>
       <li><a href="courseFolder.php">CourseFolder</a></li>
   </div>
   <div class="divForRight">
       <p class="divTitle">Personal Information</p>
       <li><a href="#"></a></li>
   </div>

<!--    <a href="course.php">Choose Course</a>    -->
</body>
</html>
