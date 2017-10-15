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

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Course System - BTH - PA2550 - Group2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            </header>
            <section>				
                <div id="container_demo" >

                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
<!--                            <form  action="mysuperscript.php" autocomplete="on"> -->
                               
                               <form class="form" action="" method="post">
                                <h1>Log in</h1> 
                                <p>
                                    <label> Your identity </label></br>
                                    <label> 
                                        <select name="selectUser" class="selectIdentity"> 
                                            <option value="academicCoordinator">Academic Coordinator</option> 
                                            <option value="teacher">Teacher</option> 
                                            <option value="student">Student</option> 
                                        </select> 
                                    </label>
                                </p>   
                                    
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your ID </label>
                                    <input id="Id" name="Id" required="required" type="text" placeholder="Your ID"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="Password" /> 
                                </p>
                                
                                <p class="login button"> 
                                    <input type="submit" name="login" value="Login" /> 
								</p>
                            </form>
                        </div>	
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
