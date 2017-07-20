<!--I add scripts at the beggining of the <body> section-->
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
      <link href="style2.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <style>

        /* I add styling here because it didnt work in any another way, maybe because of dynamic uploading AJAXa technology*/
        #container{
            margin-top:120px;   
        }

        #noteLabel{
          color : red;
        }

        #notePad, #allNotes, #done, .delete{
            display: none;   
        }

        .buttons{
            margin-bottom: 20px;   
        }

        textarea , #email , #username{
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: #CA3DD9;
            color: #CA3DD9;
            background-color: #FBEFFF;
            padding: 10px;
              
        }

        .preview{
          background-color : gray;
        }
        
        .noteheader{
            border: 1px solid grey;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            padding: 0 10px;
            background: linear-gradient(#FFFFFF,#ECEAE7);
        }
          
        .text{
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
          
        .timetext{
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .notes{
            margin-bottom: 100px;
        }

      </style>
      
  </head>
  <body>
                                  <!--SCRIPTS and additional libraries-->
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
                    <li><a href="index.php">Home</a></li>
                    <li ><a href="mainpageloggedin.php">All Tasks</a>
                    </li>
                    <li><a href="sorting.php">Sorting</a></li>
                  </ul>
              </div>
          </div>
      
      </nav>


    
                                                                <!--Container-->
      <div class="container" id="container">
          <div id="statusChanger">
            <div id="explanation"><strong style="color : darkred;">Refresh page to see result of your changes</strong></div>
            <input class="btn" type="text" id='id_to_change' placeholder="Write ID to change">
            <div><button class="btn btn-lg" id="change_status">Change status</button></div>
          </div>




                                            <!--JAVASCRIPT-->
          <!--I will write script here because it doesnt work in any another place, I dont know WHY!-->
          <script type="text/javascript">
            $("#change_status").click(function(){
            //ajax call to update task status
            $.ajax({
                url: "change_status.php",
                type: "POST",
                //we need to send the entered ID to the php file
                data: {id:$("#id_to_change").val()},
                success: function (data){
                    if(data == 'error'){
                        $('#alertContent').text("There was an issue while changing status!");
                        $("#alert").fadeIn();
                    }else if( data == 'success' ){
                       location.reload();
                    }
                },
                error: function(){
                    $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> Change status, Error : 2)");
                            $("#alert").fadeIn();
                }

            });
            
        });
          </script>


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
                      <button id="edit" type="button" class="btn btn-info btn-lg pull-right"><strong>Edit</strong></button>
                      <button id="done" type="button" class="btn green btn-lg pull-right">Done</button>
                      <button id="allNotes" type="button" class="btn btn-info btn-lg">All Tasks</button>
                  </div>
                  
                  <div id="notePad">
                    <form  class="imageUpload" method="post" style="position : relative ; left : 0;" enctype="multipart/form-data">
                      <p style="color : red;"><strong>Image should be named similary to your ID.(ex. "122.jpg")</strong></p>
                      <input type="file" name="picture">
                      <input type="submit" class="btn green imageSubmit" value="Donwload image">
                    </form>
                    
                      
                      <textarea rows="10" placeholder="Enter your task here....."></textarea>
                      <input type='email' id='email' placeholder="Enter your email">
                      <input type='text' id='username' placeholder="Enter your name">
                      <button class="btn btn-lg green saveInfo">Save Info</button>
                  </div>
                  
                  <div id="notes" class="notes">
<!--                  Ajax call to a php file-->
                  </div>
              
              </div>
          </div>
      </div>


    <!-- Footer-->
      <div class="footer" id='footer`'>
          <div class="container">
              <p><strong>Kachailo Dmytro</strong> Copyright &copy; 2016-<?php $today = date("Y"); echo $today?>.</p>
          </div>
      </div>

   
      
  </body>
</html>