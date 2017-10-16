<?php
session_start();
    if(!($_GET['id'])) die("error: No file is deleted");
    $id=$_GET['id'];
    include 'helper_php/loginFunction.php';
    global $conn;
    $sql = "delete from courseFolder where id='".$id."'";
    $conn->query($sql);
    echo "Delete successfully!";
    echo "<br><a href=coursefolder.php>courseFolder</a>";
?>