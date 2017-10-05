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

mysqli_select_db($conn,"scrum");

//Users Table

$sql = "CREATE TABLE `courseSystem`.`student`
          ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL, `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;";
if ($conn->query($sql) === TRUE) {
    echo "TABLE users created successfully</br>";
} else {
    echo "Error creating TABLE student: " . $conn->error . "</br>";
}

//Test data for users table
$sql = "INSERT INTO `student`
       (`id`, `username`, `password`)
       VALUES (NULL, 'amy', '123456')";
if ($conn->query($sql) === TRUE) {
   echo "Inserted DATA student successfully</br>";
} else {
   echo "Error inserting data into student table: " . $conn->error . "</br>";
}

//table tor project
//
// $sql = "CREATE TABLE projects (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(30) NOT NULL,
//     user_id_fk INT NOT NULL,
//     FOREIGN KEY (user_id_fk) REFERENCES users(id) ) ENGINE = MyISAM;";
// if ($conn->query($sql) === TRUE) {
//     echo "TABLE projects created successfully</br>";
// } else {
//     echo "Error creating TABLE projects: " . $conn->error . "</br>";
// }
//
// // table for sprints
// $sql = "CREATE TABLE sprints (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     project_id_fk INT(6) UNSIGNED NOT NULL,
//     FOREIGN KEY (project_id_fk) REFERENCES projects(id),
//     title VARCHAR(30) NOT NULL,
//     sumpoints INT(11) DEFAULT 0,
//     finishedpoints INT(11) DEFAULT 0,
//     deadline DATETIME NOT NULL) ENGINE = MyISAM;";
// if ($conn->query($sql) === TRUE) {
//     echo "TABLE sprints created successfully</br>";
// } else {
//     echo "Error creating TABLE sprints: " . $conn->error . "</br>";
// }
//
// //table for cards
//
// $sql = "CREATE TABLE cards (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(30) NOT NULL,
//     requirement_id INT,
//     project_id_fk INT(6) UNSIGNED NOT NULL,
//     FOREIGN KEY (project_id_fk) REFERENCES projects(id),
//     table_number INT DEFAULT 1,
//     user_id INT(11),
//     story_points INT(11),
//     ordering INT NOT NULL) ENGINE = MyISAM;";
// if ($conn->query($sql) === TRUE) {
//     echo "TABLE cards created successfully</br>";
// } else {
//     echo "Error creating TABLE cards: " . $conn->error . "</br>";
// }
//
// //table for comments
// $sql = "CREATE TABLE comments (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(30) NOT NULL,
//     user_id_fk INT(6) UNSIGNED,
//     FOREIGN KEY (user_id_fk) REFERENCES users(id),
//     card_id_fk INT(6) UNSIGNED NOT NULL,
//     FOREIGN KEY (card_id_fk) REFERENCES cards(id),
//     date TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE = MyISAM;";
// if ($conn->query($sql) === TRUE) {
//     echo "TABLE comments created successfully</br>";
// } else {
//     echo "Error creating TABLE comments: " . $conn->error . "</br>";
// }


// -------------- Add new tables below here! -------------- //

// -------------- Add new test data below here! -------------- //
// create test project
// $sql = "INSERT INTO projects (title, user_id_fk) VALUES ('project 1', 1)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project successfully</br>";
// } else {
//     echo "Error Inserting project DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO projects (title, user_id_fk) VALUES ('project 2', 1)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project successfully</br>";
// } else {
//     echo "Error Inserting project DATA: " . $conn->error . "</br>";
// }
// // create test requirement
// $sql = "INSERT INTO cards SET title = 'requirement 1',
//     project_id_fk = 1,
//     requirement_id = -1,
//     ordering = 1";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA requirement successfully</br>";
// } else {
//     echo "Error Inserting requirement DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO cards SET title = 'requirement 2',
//     project_id_fk = 1,
//     requirement_id = -1,
//     ordering = 3";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA requirement successfully</br>";
// } else {
//     echo "Error Inserting requirement DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO cards SET title = 'requirement 3',
//     project_id_fk = 2,
//     requirement_id = -1,
//     ordering = 1";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA requirement successfully</br>";
// } else {
//     echo "Error Inserting requirement DATA: " . $conn->error . "</br>";
// }
//
// //create test task
// $sql = "INSERT INTO cards SET title = 'task 1',
//     project_id_fk = 1,
//     requirement_id = 1,
//     ordering = 2;";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA requirement successfully</br>";
// } else {
//     echo "Error Inserting requirement DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO cards SET title = 'task 2',
//     project_id_fk = 1,
//     requirement_id = 1,
//     user_id = 1,
//     table_number=2,
//     ordering = 1;";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA requirement successfully</br>";
// } else {
//     echo "Error Inserting requirement DATA: " . $conn->error . "</br>";
// }
//
// //create test comment
// $sql = "INSERT INTO comments SET title = 'comment 1',
//     user_id_fk = 1,
//     card_id_fk = 4;";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA comment successfully</br>";
// } else {
//     echo "Error Inserting comment DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO comments SET title = 'comment 2',
//     user_id_fk = 1, card_id_fk = 4;";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA comment successfully</br>";
// } else {
//     echo "Error Inserting comment DATA: " . $conn->error . "</br>";
// }
//
// $sql = "INSERT INTO `users`
//        (`id`, `username`, `encrypted_password`, `firstname`, `lastname`, `email`, `salt`, `status`, `created_at`)
//        VALUES (NULL, 'waleed', '$2y$10$211000865159cb75424abOBngCPjCx98vYdyCSRDxJHz5YLBp8VQG', 'waleed'
//          , '', 'waleed@team.com', '211000865159cb75424abd', 1, '2017-09-07 00:00:00')";
// if ($conn->query($sql) === TRUE) {
//    echo "Inserted DATA users successfully</br>";
// } else {
//    echo "Error inserting data into users table: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO `users`
//        (`id`, `username`, `encrypted_password`, `firstname`, `lastname`, `email`, `salt`, `status`, `created_at`)
//        VALUES (NULL, 'simon', '$2y$10$73366430659cb756bc4bceL0OC/18W3LW7GF9tqBF8RJvFEQ60Q82', 'simon'
//          , '', 'simon@team.com', '73366430659cb756bc4bcf', 1, '2017-09-07 00:00:00')";
// if ($conn->query($sql) === TRUE) {
//    echo "Inserted DATA users successfully</br>";
// } else {
//    echo "Error inserting data into users table: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO `users`
//        (`id`, `username`, `encrypted_password`, `firstname`, `lastname`, `email`, `salt`, `status`, `created_at`)
//        VALUES (NULL, 'mahya', '$2y$10$146998731659cb759b6c7uarmVNV1z6pkUBmqF9iO2n6.QGDIAqDu', 'mahya'
//          , '', 'mahya@team.com', '146998731659cb759b6c76', 1, '2017-09-07 00:00:00')";
// if ($conn->query($sql) === TRUE) {
//    echo "Inserted DATA users successfully</br>";
// } else {
//    echo "Error inserting data into users table: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO `users`
//        (`id`, `username`, `encrypted_password`, `firstname`, `lastname`, `email`, `salt`, `status`, `created_at`)
//        VALUES (NULL, 'carrin', '$2y$10$59030549359cb75cd23bbOPDAeCB5pylacsOeW2zlHgCelQfZqWXW', 'carrin'
//          , '', 'carrin@team.com', '59030549359cb75cd23bba', 1, '2017-09-07 00:00:00')";
// if ($conn->query($sql) === TRUE) {
//    echo "Inserted DATA users successfully</br>";
// } else {
//    echo "Error inserting data into users table: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO `users`
//        (`id`, `username`, `encrypted_password`, `firstname`, `lastname`, `email`, `salt`, `status`, `created_at`)
//        VALUES (NULL, 'chen', '$2y$10$16588062759cb75fa4833uKi2zVcKm/5EA//1uVbHh6dPqGShGdPm', 'chen'
//          , '', 'chen@team.com', '16588062759cb75fa48330', 1, '2017-09-07 00:00:00')";
// if ($conn->query($sql) === TRUE) {
//    echo "Inserted DATA users successfully</br>";
// } else {
//    echo "Error inserting data into users table: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO `users`
//        (`id`, `username`, `encrypted_password`, `firstname`, `lastname`, `email`, `salt`, `status`, `created_at`)
//        VALUES (NULL, 'wu', '$2y$10$4725332159cb763ab904auoJ9Zgrgjkjfm5ooBrZVXu5kjNKU/pCq', 'wu'
//          , '', 'wu@team.com', '4725332159cb763ab904a8', 1, '2017-09-07 00:00:00')";
// if ($conn->query($sql) === TRUE) {
//    echo "Inserted DATA users successfully</br>";
// } else {
//    echo "Error inserting data into users table: " . $conn->error . "</br>";
// }
//
// //Test data for task history table
// $sql = "INSERT INTO card_history (card_id,user_id,action,created_at) VALUES
// (4,1,'created','2017-09-11 12:00:00')";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA card_history successfully</br>";
// } else {
//     echo "Error Inserting card_history DATA: " . $conn->error . "</br>";
// }
//
// $sql = "INSERT INTO card_history (card_id,user_id,action,created_at) VALUES
// (4,1,'created','2017-09-11 12:01:00')";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA card_history successfully</br>";
// } else {
//     echo "Error Inserting card_history DATA: " . $conn->error . "</br>";
// }
//
// $sql = "INSERT INTO card_history (card_id,user_id,action,new_table_number,created_at) VALUES
// (4,1,'moved', 2,'2017-09-11 14:12:000')";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA card_history successfully</br>";
// } else {
//     echo "Error Inserting card_history DATA: " . $conn->error . "</br>";
// }
//
// //Test data for project users
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (1,2,1)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (1,3,1)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (1,4,1)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (1,5,1)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (1,6,1)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (1,7,1)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
//
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (2,2,0)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (2,3,0)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (2,4,0)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (2,5,0)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (2,6,0)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
// $sql = "INSERT INTO project_users (project_id,user_id,status) VALUES
// (2,7,0)";
// if ($conn->query($sql) === TRUE) {
//     echo "Inserted DATA project_users successfully</br>";
// } else {
//     echo "Error Inserting project_users DATA: " . $conn->error . "</br>";
// }
//
//
//
//close the connection
$conn->close();

?>
