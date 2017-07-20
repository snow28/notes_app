<?php
session_start();
include('connection.php');

//get the id of the note sent through Ajax
$id = $_POST['id'];
//get the time
$time = time();

//run a query to update the note
$sql = "UPDATE notes SET done='1' , time = '$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}else{
	echo 'success';
}
header("refresh: 3;");
?>