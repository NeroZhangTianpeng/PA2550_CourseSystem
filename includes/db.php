<?php

$db['db_host'] = "localhost";
$db['db_user'] = "scrum";
$db['db_pass'] = "scrum";
$db['db_name'] = "scrum";

// to make all the array members as constants
foreach ($db as $key => $value) {

define(strtoupper($key), $value);

}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connection){

//echo "we are connected";

}

//This function check if there is an error in the query it reports it.
function confirmQuery($result){
  global $connection;

  if(!$result){

    die("QUERY FAILED. " . mysqli_error($connection));
  }

}

 ?>
