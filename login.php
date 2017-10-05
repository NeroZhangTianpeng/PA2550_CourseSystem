
<?php
  include 'helper_php/loginFunction.php';


    if(ValidateCredentials($_POST['$studentId'],$_POST['password']) == TRUE){
      header('Location:course.php');
    }else {
  	  echo "<script>alert('Please check student ID and password!')</script>";
      //echo "check username and password";
    }


?>

<form class="form" action="course.php" method="post">
  Student ID<input type="text" id="studentId" name="studentId" placeholder="studentId">
  Passward<input type="password" id="password "name="password" placeholder="password">
<div class="form-group text-right" >
      <input type="submit" name="login" value="Login">
    </div>

</form>
