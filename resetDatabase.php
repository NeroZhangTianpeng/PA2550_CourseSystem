<?php

//display php errors:
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//prerequsites

//set root username to none
//CREATE DATABASE scrum
//CREATE USER 'scrum'@'localhost' IDENTIFIED BY 'scrum';
//GRANT ALL ON scrum.* TO 'scrum'@'localhost';


//create a connection

$serverName = "localhost";
$userName = "root";
$password = "";

// Create connection
$conn = mysqli_connect($serverName, $userName, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "</br>");
}
echo "Connected successfully</br>";

// first, drop the old database
$sql = "DROP DATABASE courseSystem";
if ($conn->query($sql) === TRUE) {
    echo "Database dropped successfully</br>";
} else {
    echo "Error dropping database: " . $conn->error . "</br>";
}

// then create a new one. Every change in the database should be applied
$sql = "CREATE DATABASE courseSystem";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully</br>";
} else {
    echo "Error creating database: " . $conn->error . "</br>";
}
//grant permissions to project user

mysqli_select_db($conn,"courseSystem");

//Users Table

$sql = "CREATE TABLE `courseSystem`.`student`
          ( `studentId` INT NOT NULL AUTO_INCREMENT , `studentName` VARCHAR(255) NOT NULL, `password` VARCHAR(255) NOT NULL , `course` VARCHAR(255) NOT NULL , PRIMARY KEY (`studentId`)) ENGINE = MyISAM;";
if ($conn->query($sql) === TRUE) {
    echo "TABLE student created successfully</br>";
} else {
    echo "Error creating TABLE student: " . $conn->error . "</br>";
}

//Test data for users table
$sql = "INSERT INTO `student`
       (`studentId`, `studentName`, `password`, `course`)
       VALUES (100, 'amy', '123456' , 'math1')";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA student successfully</br>";
} else {
   echo "Error inserting data into student table: " . $conn->error . "</br>";
}

//Courses Table
$sql = "CREATE TABLE `courseSystem`.`course`
          (`courseId` INT NOT NULL AUTO_INCREMENT, `courseName` VARCHAR(255) NOT NULL, `courseState` VARCHAR(255) NOT NULL, `courseFee` INT NOT NULL, `courseTeacher` VARCHAR(255) NOT NULL, `courseCredit` INT NOT NULL, `Pre-requisiteCourse` INT, PRIMARY KEY (`courseId`)) ENGINE = MyISAM;";
if($conn->query($sql) == TRUE){
  echo "TABLE course created successfully</br>";
} else{
  echo "Error creating TABLE course: " . $conn->error . "</br>";
}

//Test data for course table
$sql = "INSERT INTO `course`
       (`courseId`, `courseName`, `courseState`, `courseFee`, `courseTeacher`, `courseCredit` , `Pre-requisiteCourse`)
       VALUES (001, 'math1', 'COMPULSORY' , '1000' , 'TOM' , '4' , NULL)";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA course successfully</br>";
} else {
   echo "Error inserting data into course table: " . $conn->error . "</br>";
}

$sql = "INSERT INTO `course`
       (`courseId`, `courseName`, `courseState`, `courseFee`, `courseTeacher`, `courseCredit` , `Pre-requisiteCourse`)
       VALUES (002, 'math2', 'COMPULSORY' , '1000' , 'TOM' , '4' , '001')";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA course successfully</br>";
} else {
   echo "Error inserting data into course table: " . $conn->error . "</br>";
}

//close the connection
$conn->close();

?>
