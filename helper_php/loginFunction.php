<?php
  include 'includes/db.php';


  function ValidateCredentials($studentId,$password){
   global $conn;
   $judgement = FALSE;

   $sql = "SELECT password FROM student WHERE studentID=$studentId";
   $result = $conn->query($sql);

   if ($result->num_rows > 0){
    // 输出数据
      while($row = $result->fetch_assoc()) {
          if($row['password'] == $password){
              echo "Login successfully!";
              $judgement = TRUE;
            }else{
              echo "Wrong information!";
            }
    }
    } else {
      echo "No this user!";
    }


   echo '</br>';
   echo $password;
   echo '</br>';
   echo $studentId;
   echo '</br>';
   //
  //  $passwordRes = array();
  //  $j = 0;
  //  while($rows=$result -> fetch_assoc())
  //  {
  //    $passwordRes[$j] = $rows['password'];
  //    $j++;
  //  }

  //  $sql = "SELECT password FROM student";
  // //  $result = $conn->query($sql);
  //  $result = mysqli_query($conn, $sql);
  //  if (mysqli_num_rows($result) > 0) {
  //   // output data of each row
  //     while($row = mysqli_fetch_assoc($result)) {
  //         echo "id: " . $row["studentId"]. " - Name: " . $row["studentName"]. " " ;
  //       }
  //   } else {
  //     echo "0 results";
  //   }





   return $judgement;
}

 ?>
