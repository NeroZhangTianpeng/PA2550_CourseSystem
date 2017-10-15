<?php
  ob_start();
  session_start();
  include 'helper_php/loginFunction.php';
  if(isset($_POST['login'])){
    if(ValidateCredentials($_POST['Id'],$_POST['password'])){
      $_SESSION['Id']=$_POST['Id'];
      //echo "<script>alert('Login successfully!')</script>";
      header('Location:course.php');
    }else {
     // echo "<script>alert('Please check student ID and password!')</script>";
      //echo "check username and password";
    }
  }

?>





<form class="form" action="" method="post">
   <div>
    <label> 
        <select name="selectUser"> 
            <option value="academicCoordinator">Academic Coordinator</option> 
            <option value="teacher">Teacher</option> 
            <option value="student">Student</option> 
        </select> 
    </label>
    </div>
    <div>
        ID: <input type="text" id="studentId" name="Id" placeholder="Id">
    </div>
    <div>
        Passward: <input type="password" id="password "name="password" placeholder="password">
    </div>
    
    <div class="form-group text-right" >
      <input type="submit" name="login" value="Login">
    </div>

</form>
