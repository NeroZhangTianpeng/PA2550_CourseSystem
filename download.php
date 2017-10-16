<?php
session_start();
    if(!($_GET['id'])) die("error: id none");
    $id=$_GET['id'];
    include 'helper_php/loginFunction.php';
    global $conn;
    $sql = "select * from courseFolder where id='".$id."'";
    $result = $conn->query($sql);
    if(!$result) die("error: mysql query");
    while($rows = $result->fetch_assoc()){
    $name = $rows['name'];
    $type = $rows['type'];
    $content = $rows['content'];
    header("Content-type:$type");
    header("Content-Disposition: attachment; filename=$name");
    echo $content;
    }
?>