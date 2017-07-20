<?php
// Путь загрузки
$path = 'i/';

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  // Загрузка файла и вывод сообщения
  if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
    echo '<script>console.log("error while downloading image")</script>';
  else
    echo '<script>console.log("Success!")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Tasks</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling.css" rel="stylesheet">
      <link href="style3.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <style>

        /* I add styling here because it didnt work in any another way, maybe because of dynamic uploading AJAXa technology*/
        
      </style>
  </head>
  
  <body id="body">
  <a href="mainpageloggedin.php" style='margin-top : 50px; margin-left : 43%;' class='btn green btn-lg back'>Back</a>
  
  <div class="main-content">
                                              <!--SCRITPS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="mynotes.js"></script> 

 <!--Navigation Bar-->  
<nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      
  <div class="container-fluid">
            
    <div class="navbar-header">
              
      <a href="index.php" class="navbar-brand">Online Task Manager</a>
         <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
                  
          </button>
    </div>
    <div class="navbar-collapse collapse" id="navbarCollapse">
      <ul class="nav navbar-nav">
       <li ><a href="index.php">Home</a></li>
       <li class="active"><a href="mainpageloggedin.php">All tasks</a></li>
        <li><a href="sorting.php">Sorting </a></li>
     </ul>
                  
              
     </div>
  </div>
</nav>
     
    
  <!--Container-->
        <div class="container" id="container">
            <!--Alert Message-->
            <div id="alert" class="alert alert-danger collapse">
                <a class="close" data-dismiss="alert">
                  &times;
                </a>
                <p id="alertContent"></p>
            
            </div>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="buttons">
                        <button id="addNote" type="button" class="btn btn-info btn-lg">Add Task</button>
                        <button id="done" type="button" class="btn green btn-lg pull-right">Done</button>
                        <button id="allNotes" type="button" class="btn btn-info btn-lg">All Tasks</button>
                    </div>
                                                                  
                                                                  <!--Input fields-->
                    <div id="notePad">
                                          
                      <form method="POST" id="add-new-note-form" enctype="multipart/form-data">
                        <div class="input-group">
                          <input type="file"  id="avatar" name="picture">
                        </div>                                                                    
                        <textarea rows="10" placeholder="Enter your task here....." name="note"></textarea>
                        <input type='email' placeholder="Enter your email....." id='email' name="email">
                        <input type='text' id="username" placeholder="Enter your name" name="username">
                        <label id="noteLabel" for="id">Your note ID :</label>
                        <input type="text" name="id" class="currentID inputStyle" placeholder="ID where save data" value="">
                        <div  class="currentID"></div>
                                                                <!--Buttons-->
                        <button class="btn green btn-lg save imageSubmit">Save Info</button>
                        <button class="btn btn-lg pull-right preview" >Preview</button>
                      </form>

                      
                    </div>


                    
                    <div id="notes" class="notes">
  <!--                  Ajax call to a php file-->
                    </div>
                
                </div>
            </div>
        </div>


    <!-- Footer-->
      <div class="footer">
          <div class="container">
              <p><strong>Kachailo Dmytro</strong> Copyright &copy; 2016-<?php $today = date("Y"); echo $today?>.</p>
          </div>
      </div>
  </div>
  </body>
</html>