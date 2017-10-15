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

//Students Table

$sql = "CREATE TABLE `courseSystem`.`student`
          ( `studentId` INT NOT NULL AUTO_INCREMENT , `studentName` VARCHAR(255) NOT NULL, `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`studentId`)) ENGINE = MyISAM;";
if ($conn->query($sql) === TRUE) {
    echo "TABLE student created successfully</br>";
} else {
    echo "Error creating TABLE student: " . $conn->error . "</br>";
}

//Test data for students table
$sql = "INSERT INTO `student`
       (`studentId`, `studentName`, `password`)
       VALUES (001, 'amy', '123456')";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA student successfully</br>";
} else {
   echo "Error inserting data into student table: " . $conn->error . "</br>";
}

//Teachers Table

$sql = "CREATE TABLE `courseSystem`.`teacher`
          ( `teacherId` INT NOT NULL AUTO_INCREMENT , `teacherName` VARCHAR(255) NOT NULL, `password` VARCHAR(255) NOT NULL , `courseId` VARCHAR(255) NOT NULL , PRIMARY KEY (`teacherId`)) ENGINE = MyISAM;";
if ($conn->query($sql) === TRUE) {
    echo "TABLE teacher created successfully</br>";
} else {
    echo "Error creating TABLE teacher: " . $conn->error . "</br>";
}

//Test data for teachers table
$sql = "INSERT INTO `teacher`
       (`teacherId`, `teacherName`, `password`, `courseId`)
       VALUES (10001, 'Tony', '222222' , '001')";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA teacher successfully</br>";
} else {
   echo "Error inserting data into teacher table: " . $conn->error . "</br>";
}

//Academic officers Table

$sql = "CREATE TABLE `courseSystem`.`academicCoo`
          ( `academicCooId` INT NOT NULL AUTO_INCREMENT , `academicCooName` VARCHAR(255) NOT NULL, `password` VARCHAR(255) NOT NULL, PRIMARY KEY (`academicCooId`)) ENGINE = MyISAM;";
if ($conn->query($sql) === TRUE) {
    echo "TABLE academicCoo created successfully</br>";
} else {
    echo "Error creating TABLE academicCoo: " . $conn->error . "</br>";
}

//Test data for academic officers table
$sql = "INSERT INTO `academicCoo`
       (`academicCooId`, `academicCooName`, `password`)
       VALUES (20001, 'Tommy', '333333')";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA academicCoo successfully</br>";
} else {
   echo "Error inserting data into academicCoo table: " . $conn->error . "</br>";
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
       VALUES (001, 'math1', 'COMPULSORY' , '1000' , 'Tom' , '2' , NULL)";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA course successfully</br>";
} else {
   echo "Error inserting data into course table: " . $conn->error . "</br>";
}

$sql = "INSERT INTO `course`
       (`courseId`, `courseName`, `courseState`, `courseFee`, `courseTeacher`, `courseCredit` , `Pre-requisiteCourse`)
       VALUES (002, 'math2', 'COMPULSORY' , '1000' , 'Tom' , '2' , '001')";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA course successfully</br>";
} else {
   echo "Error inserting data into course table: " . $conn->error . "</br>";
}

$sql = "INSERT INTO `course`
       (`courseId`, `courseName`, `courseState`, `courseFee`, `courseTeacher`, `courseCredit` , `Pre-requisiteCourse`)
       VALUES (003, 'math3', 'COMPULSORY' , '1000' , 'Tom' , '2' , '002')";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA course successfully</br>";
} else {
   echo "Error inserting data into course table: " . $conn->error . "</br>";
}

$sql = "INSERT INTO `course`
       (`courseId`, `courseName`, `courseState`, `courseFee`, `courseTeacher`, `courseCredit` , `Pre-requisiteCourse`)
       VALUES (004, 'English1', 'COMPULSORY' , '1000' , 'Jerry' , '3' , NULL)";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA course successfully</br>";
} else {
   echo "Error inserting data into course table: " . $conn->error . "</br>";
}
//Course and student

$sql = "CREATE TABLE `courseSystem`.`student_course`
          ( `studentId` INT NOT NULL, `courseId` INT NOT NULL , `mark` INT , PRIMARY KEY (`studentId`,`courseId`)) ENGINE = MyISAM;";
if ($conn->query($sql) === TRUE) {
    echo "TABLE student_course created successfully</br>";
} else {
    echo "Error creating TABLE student_course: " . $conn->error . "</br>";
}

//Tese data for student_course
$sql = "INSERT INTO `student_course`
		(`studentId`, `courseId`, `mark`)
		VALUES (001, 001, 60)";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA student_course successfully</br>";
} else {
   echo "Error inserting data into student_course table: " . $conn->error . "</br>";
}

//close the connection
$conn->close();

?>
