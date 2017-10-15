<?php
  include 'includes/db.php';

  function ValidateCredentials($Id,$password){
   global $conn;
   $judgement = FALSE;
      // Student login 
    if($_POST['selectUser'] == 'student'){
        $sql = "SELECT password FROM student WHERE studentID=$Id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
        // output data
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
//            echo "No this user!";
            echo "<script>alert('No this user! Please contact academic office!')</script>";
        }
        return $judgement;
    }
      
      //Teacher login
      if($_POST['selectUser'] == 'teacher'){
        $sql = "SELECT password FROM teacher WHERE teacherID=$Id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
        // output data
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
//            echo "No this user!";
            echo "<script>alert('No this user! Please contact academic office!')</script>";
        }
        return $judgement;
    }
      
      //Academic Coordinator login
      if($_POST['selectUser'] == 'academicCoordinator'){
        $sql = "SELECT password FROM academicCoo WHERE academicCooID=$Id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
        // output data
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
//            echo "No this user!";
            echo "<script>alert('No this user! Please contact academic office!')</script>";
        }
        return $judgement;
    }
      
   
}

 ?>
