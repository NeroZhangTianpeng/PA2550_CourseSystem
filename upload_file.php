
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
        $fileStored = 0;
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
                    $fileStored = 1;
                    $_SESSION ['fileStored'] = $fileStored;
				    echo("File stored.\n");
				    header('Location:courseFolder.php');
                }else{
//                    $fileStored = 2;
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
    <link rel="stylesheet" type="text/css" href="css/folder.css" />
    <title>Course System - BTH - PA2550 - Group2</title> 
</head>
<body>
<h1>Folder Management</h1>

<div class="divForInput">
    <form action="courseFolder.php" method="post" enctype="multipart/form-data">
        <label for="file">File Name: </label></br>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="submit">
	<input type="reset" name="reset" value="reset">
</form>
</div>



</body>
</html>