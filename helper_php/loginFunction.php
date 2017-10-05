<?php
  include 'includes/db.php';


  function ValidateCredentials($studentId,$password){
   global $conn;
   $judgement = FALSE;

   $sql = "SELECT password FROM student";
   $result = $conn->query($sql);

   $passwordRes = array();
   $j = 0;
   while($rows=$result -> fetch_assoc())
   {
     $passwordRes[$j] = $rows['password'];
     $j++;
   }

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


//    if(empty($result) == FALSE){
//      if($result == $password){
//        $judgement = TRUE;
//        echo "Login successfully!";
//      }else{
//        echo "Wrong password!";
//      }
//    }else{
//      echo "Please check your ID!";
//    }
//
//    return $judgement;
// }
}

 ?>
