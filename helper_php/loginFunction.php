<?php
  include 'includes/db.php';


  function ValidateCredentials($userId,$password,$identity){
   global $conn;
   $judgement = FALSE;
   $condition1 = "student";
   $condition2 = "teacher";
   $sql1= "SELECT password FROM student WHERE studentId=$userId";
   $sql2= "SELECT password FROM teacher WHERE teacherId=$userId";
   $sql3= "SELECT password FROM academicCoordinator WHERE academicCoordinatorId=$userId";
   if($identity=="student"){
    $result = $conn->query($sql1);
   }
   else if($identity=="teacher"){
    $result = $conn->query($sql2);
   }
   else if($identity=="academicCoordinator"){
    $result = $conn->query($sql3);
   }
   if ($result->num_rows > 0){
    // 输出数据
      while($row = $result->fetch_assoc()) {
          if($row['password'] == $password){
//              echo "Login successfully!";
              echo "<script>alert('Login successfully')</script>";
              $judgement = TRUE;
            }else{
//              echo "Wrong information!";
              echo "<script>alert('Id or password is wrong!')</script>";
            }
    }
    } else {
      echo "No this user!";
    }
   return $judgement;
}

 ?>
