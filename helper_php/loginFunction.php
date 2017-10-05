<?php
  include 'includes/db.php';

  function IsUserLoggedIn(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
      return $_SESSION['studentId'];
    }
  }

  function ValidateCredentials($studentId,$password){
   global $conn;

   $sql = "select password from student WHERE studentId=$studentId";
   $result = $conn->query($sql);

   if($result != NULL){
     if($result == $password){
       echo "Login successfully!";
     }else{
       echo "Wrong password!";
     }
   }else{
     echo "Please check your ID!";
   }
}


 ?>
