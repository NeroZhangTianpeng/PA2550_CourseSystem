<?php
session_start();
include 'includes/db.php';
global $conn;
if(isset($_POST['submit'])){
	if($_SESSION['identity']=="teacher"){
		$error = $_FILES['file']['error'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$size = $_FILES['file']['size'];
		$name = $_FILES['file']['name'];
		$type = $_FILES['file']['type'];
		$courseId = $_SESSION['courseId'];
		if($size < 16384000 && $size > 0)//small than 16mb
		{
            if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png" || $type == "image/gif")
            {
                echo"<script>alert('Uploading pictures is not supported!')</script>";
            }
             else{
                if($error == UPLOAD_ERR_OK)
                {
				    $fp = fopen($tmp_name, 'r');
				    $content = fread($fp, $size);
				    fclose($fp);
				    $content = addslashes($content);
				    $sql = "INSERT INTO courseFolder (name, type, size, content,courseId)" . " VALUES ('$name', '$type', $size, '$content','$courseId')";
				    $conn->query($sql);
				    echo("File stored.\n");
				    header('Location:courseFolder.php');
                }else{
                    echo"<script>alert('Database Save for upload failed!')</script>";
                }
            }
		}
		else{
			echo "<script>alert('The limit of files' size is between 0 to 16MB!')</script>";
		}
	}
	else{
	echo "<script>alert('You have no permission!')</script>";
	}
}

?>
<html>
<head>
<meta charset="utf-8">
<title>uploadFile</title>
</head>
<body>

<form action="upload_file.php" method="post" enctype="multipart/form-data">
	<label for="file">file name: </label>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="submit">
	<input type="reset" name="reset" value="reset">
</form>
<br><a href=courseFolder.php>courseFolder</a>

</body>
</html>