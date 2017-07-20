<?php
$link = mysqli_connect("localhost", "root", "", "notes");
if(mysqli_connect_error()){
    die('ERROR: Unable to connect:' . mysqli_connect_error()); 
}
?>