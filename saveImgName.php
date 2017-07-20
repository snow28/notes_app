<?php

session_start();
include('connection.php');
//get the id of the note sent through Ajax
$id = $_POST['id'];
$name = $_POST['name'];

echo "Name ->" . $name . " . ID - > " . $id ;
//get the time
$time = time();
//run a query to update the task
$sql = "UPDATE notes SET img='$name', time = '$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);

?>