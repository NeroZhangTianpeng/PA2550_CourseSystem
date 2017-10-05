
<?php include 'helper_php/loginFunction.php';
if(IsUserLoggedIn()){
  header ('Location: course.php');
} elseif(isset($_POST['login'])){
  $studentId = $_POST ['studentId'];
  $password = $_POST ['password'];
  if(ValidateCredentials($studentId,$password)){
      //if redirect path is set redirect since already signed in.
    if(isset($redirect)) {
        header ('Location: ' . $redirect);
    } else {
        // if no path is set, go to index since alreadysigned in.
        header ('Location: ./');
    }
  }else {
	  echo "<script>alert('Please check studentID and password!')</script>";
    //echo "check username and password";
  }
}
?>

<form class="form" action="" method="post">
<?php
      echo '<input type="hidden" name="location" value="';
      if(isset($_GET['location'])) {
        echo htmlspecialchars($_GET['location']);
      }
      echo '">';
      if(isset($_POST['location']) && $_POST['location'] != ''){
        $redirect = $_POST['location'];
      }
     ?>

<input type="text" name="studentId" placeholder="studentId">

    <input type="password" name="password" placeholder="password">

<div class="form-group text-right" >
      <input type="submit" name="login" value="Login">
    </div>

</form>
