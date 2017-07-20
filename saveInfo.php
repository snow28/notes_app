<?php
session_start();
// как ты видел данные успешно расфосовались по именам переменных, терь можно их ловить тут
include('connection.php');

//get variables
$id = $_POST['id'];	
$username = $_POST['username']; 
$email = $_POST['email']; 
$note = $_POST['note']; 
$image = $_POST['image'];

echo var_dump($image);

//get the time
$time = time();
//run a query to update the note
$sql = "UPDATE notes SET email='$email', note='".$note."', time = '$time' , username='$username' WHERE id='$id'";

$result = mysqli_query($link, $sql);
mysqli_close($link);


if (!$result) {
	echo 'error';
}

?>