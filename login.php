<?php
  session_start();
  include 'helper_php/loginFunction.php';

    if(ValidateCredentials($_POST['studentId'],$_POST['password'])){
      $_SESSION['studentId']=$_POST['studentId'];
      header('Location:course.php');
    }else {
  	  echo "<script>alert('Please check student ID and password!')</script>";
      //echo "check username and password";
    }

?>

<form class="form" action="" method="post">
  Student ID<input type="text" id="studentId" name="studentId" placeholder="studentId">
  Passward<input type="password" id="password "name="password" placeholder="password">
<div class="form-group text-right" >
      <input type="submit" name="login" value="Login">
    </div>

</form>
</html>