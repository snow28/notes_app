<?php
session_start();
include('connection.php');

//get the id of the note sent through Ajax
$id = $_POST['id'];
//get the content of the note Это желаемый textarea? да, отот код работает Таврия тоже работает ) но её никто не берёт )
$note = $_POST['note'];
//get the time
$time = time();
//run a query to update the task
$sql = "UPDATE notes SET note='$note', time = '$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}
?>