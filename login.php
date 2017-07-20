<?php 
session_start();

//connect to the database
include("connection.php");

$email = $_POST["loginemail"];
$password = $_POST["loginpassword"];

echo 'success';


?>