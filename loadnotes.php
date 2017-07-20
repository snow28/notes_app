<?php
session_start();
include('connection.php');


//run a query to delete empty notes
$sql = "DELETE FROM notes WHERE note=''";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
}
//run a query to look for notes corresponding to user_id
$sql = "SELECT * FROM notes ORDER BY time DESC";
$num = "144";
$currentRow = 0;
//shows notes or alert message
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
            $note_id = $row['id'];
            $note = $row['note'];
            $time = $row['time'];
            $time = date("F d, Y h:i:s A", $time);
            $email = $row['email'];
            $done = $row['done'];
            $username = $row['username'];
            $img = $row['img'];
            $dir = 'i/'; //directory where we will store images


            

            echo "
            <div class='note noteClick'>
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
            ";

                                                                                //displaying image
            echo "<div>";
            
            if (file_exists($dir) == false) {
                echo 'Directory \'', $dir, '\' not found!';
            } else {

                echo "<img width='50px' src='i/".$img."'>";

            }
            echo "</div>";


            echo "
                <div style='margin-top : 5px;'><strong>Username</strong> : $username</div>
                <div><strong>Email</strong> : $email</div>
                <div ><strong>Note ID :</strong> $note_id</div>
                <div class='timetext'>$time</div> " . $image ."   
                </div>
                
        </div>";
        }
    }else{
        echo '<div class="alert alert-warning">You have not created any notes yet!</div>'; exit;
    }
    
}else{
    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
//    echo "ERROR: Unable to excecute: $sql." . mysqli_error($link);
}









 

?>