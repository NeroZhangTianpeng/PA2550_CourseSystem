<?php
session_start();
    include 'helper_php/loginFunction.php';
    global $conn;
    $courseId=$_SESSION['courseId'];
    if(!($_SESSION['courseId'])) die("error:  please choose a course! ");
    $sql =  "select * from courseFolder where courseId='".$courseId."'";
    $sql1 =  "select courseName from course where courseId='".$courseId."'";
    //$sql =  "select * from courseFolder";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $courseName = $row1['courseName'];
    if(!$result) die(" error: mysql query");
    $name = array();
    $type = array();
    $size = array();
    $id = array();
    $courseId = array();
    $i = 0;
    while($rows = $result->fetch_assoc()){
    $id[$i] = $rows['id'];
    $name[$i] = $rows['name'];
    $type[$i] = $rows['type'];
    $size[$i] = $rows['size'];
    $ID=$id[$i];
    $courseId[$i] = $rows['courseId'];
    echo "<hr>file information: ";
    echo "<br>The file's name - $name[$i]";
    echo "<br>The file's type - $type[$i]";
    echo "<br>The file's size - $size[$i]";
    echo "<br>The file's id - $ID";
    echo "<br>The file belongs to - $courseName";
    echo "<br><a href=download.php?id=$ID>Download Link</a>";
    if($_SESSION['identity']=="teacher"){
        echo "<br><a href=delete.php?id=$ID>Delete</a>";
    }
    $i++;
    }
    if($_SESSION['identity']=="teacher"){
        echo "<br><a href=upload_file.php>upload file</a>";
    }
    echo "<br><a href=indexTea.php>back to index</a>";
?>