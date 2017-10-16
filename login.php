<?php
  ob_start();
  session_start();
  include 'helper_php/loginFunction.php';
  if(isset($_POST['login'])){
      if(ValidateCredentials($_POST['userId'],$_POST['password'],$_POST['identity'])){
        $_SESSION['userId']=$_POST['userId'];
        //echo "<script>alert('Login successfully!')</script>";
        header('Location:index.php');
      }else {
      //echo "<script>alert('Please check student ID and password!')</script>";
      //echo "check username and password";
      }
    }
?>

<form class="form" action="" method="post">
<select name="identity">
  <option value ="student">student</option>
  <option value ="teacher">teacher</option>
  <option value ="academicCoordinator">academicCoordinator</option>
</select><br>
  User ID<input type="text" id="userId" name="userId" placeholder="userId">
  Passward<input type="password" id="password" name="password" placeholder="password">
<div class="form-group text-right" >
      <input type="submit" name="login" value="Login">
    </div>

</form>
</html>