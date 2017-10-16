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
		$courseId = $_POST['courseId'];
		if($size < 2048000 && $size > 0)//small than 2mb
		{
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
				echo("Database Save for upload failed.\n");
			}
		}
		else{
			echo "Unvalid file format";
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
	courseId<input type="text" id="courseId" name="courseId" placeholder="courseId">
	<input type="submit" name="submit" value="submit">
	<input type="reset" name="reset" value="reset">
</form>
<br><a href=coursefolder.php>courseFolder</a>

</body>
</html>