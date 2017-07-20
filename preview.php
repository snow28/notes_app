<?php
session_start();
include('connection.php');

//get the id of the note sent through Ajax
$id = $_POST['ID'];

$sql = "select * from notes where id='".$id."'";

$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-warning">An error occured while execution query!(file->preview.php)</div>'; exit;
}

            $row = mysqli_fetch_array($result, MYSQL_ASSOC);
            $note_id = $row['id'];
            $note = $row['note'];
            $time = $row['time'];
            $time = date("F d, Y h:i:s A", $time);
            $email = $row['email'];
            $done = $row['done'];
            $username = $row['username'];
            

            echo "
            <div style='width : 40%; margin-left : 30%; margin-top : 200px;' class='note noteClick'>
            <div class='col-xs-5 col-sm-3 delete'>
                <button class='btn-lg btn-danger' style='width:100%'>delete</button>
            
            </div>
            <div class='noteheader' id='$note_id'>
                <div><strong style='font-size : 18px; position : relative ; top : 2px;'>Done</strong>:
                    ";
            if($done == 0 ){
                echo "<img width='20px' src='images/no.png'>";
            }else if( $done == 1){
                echo "<img width='20px' src='images/checked.png'>";
            }else{
                echo "<div style='max-width : 150px;' class='alert alert-warning'>ERROR while extracting DONE column from DB</div>";
            }

            
            $currentRow++;
            echo "
            </div>
                
                <div class='text'>$note</div>
                <div style='margin-top : 5px;'><strong>Username</strong> : $username</div>
                <div><strong>Email</strong> : $email</div>
                <div ><strong>Note ID :</strong> $note_id</div>
                <div class='timetext'>$time</div> " . $image ."   
                </div>
                
                
        </div>";


?>