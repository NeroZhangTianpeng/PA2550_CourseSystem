<?php include_once "./includes/db.php";

function IsUserLoggedIn(){
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
    return $_SESSION['studentId'];
  }
}

function ValidateCredentials($studentName,$password){
 global $connection;

   $studentName = mysqli_real_escape_string($connection,$studentName);
   $password = mysqli_real_escape_string($connection,$password);
   $sql = "SELECT * FROM users WHERE username = '{$studentName}'";
   $result  = mysqli_query($connection, $sql);
   confirmQuery($result);

   if($row = mysqli_fetch_array($result)){

    //  $hashFormat = "$2y$10$";
    //  $salt = $row['salt'];
    //  $hashFAndSalt = $hashFormat . $salt;
    //  $encryptedPassword = crypt($password,$hashFAndSalt);

     $sql = "SELECT * FROM student WHERE studentName = '{$studentName}' AND password = '{$password}' ";
     $result  = mysqli_query($connection, $sql);
     confirmQuery($result);

     if(mysqli_num_rows($result) == 1){
       $row = mysqli_fetch_array($result);
       $status = $row ['status'];
      //  if($status ===  1){
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
         }
         $_SESSION['loggedIn'] = true;
         $_SESSION['studentId'] = $row ['id'];
         $_SESSION['username'] = $row ['username'];
         return $_SESSION['loggedIn'] ;
      //  } else {
      //    return $message = "Email is not verified";
      //  }
     }
   }
}

function LogoutUser(){
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  $_SESSION['loggedIn'] = false;
  session_destroy();

  header ('Location : course.php');
}

function getUserInitById($userId){
  global $connection;
    $sql = "SELECT UPPER(LEFT(username,2)) init FROM users WHERE id = {$userId}";
    $result = mysqli_query($connection, $sql);
    confirmQuery($result);
    $row = mysqli_fetch_array($result);
    return $row['init'];

}


 ?>
