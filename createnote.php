<?php
session_start();
include('connection.php');


//get the current time
$time = time();
//run a query to create new note
$sql = "INSERT INTO notes ( `note`, `time`) VALUES ( '', '$time')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
}else{
    //  id used in the last query
    echo mysqli_insert_id($link);
}
?>