<?php
error_reporting(E_ALL);
// ini_set('display_errors', 1);
include "../config.php";

//create db connection
$connection = new mysqli($DBHOST, $DBUSER, $DBPASS);

if ($connection->$connect_error){
  die("connection failed: " . $connection->connect_error);
}

$sql = "SHOW DATABASE LIKE '$DBNAME'";
$result = $connection->query($sql);

if ($result->num_rows == 0) {
  $sql_querry = "CREATE DATABASE $DBNAME";
  if ($connection->query($sql_querry) === TRUE) {
    echo "Database $DBNAME has been created";
  }
}

?>