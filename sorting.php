<!--All scripts I add at the end of the file-->
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
  </head>
  <body>
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
                    <li ><a href="mainpageloggedin.php">All tasks</a></li>
                    <li class="active"><a href="sorting.php">Sorting </a></li>
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
                  <div style='margin-bottom: 10px;'>
                    <button id='email' class='btn btn-lg'>Sort by email</button>
                    <button id='status' class='btn btn-lg'>Sort by status</button>
                    <button id='username' class='btn btn-lg'>Sort by username</button>
                  </div>
                  <div id="notePad">
                      <input type="file" name="imageUpload" id="imageUpload">
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
      <div class="footer">
          <div class="container">
              <p><strong>Kachailo Dmytro</strong> Copyright &copy; 2016-<?php $today = date("Y"); echo $today?>.</p>
          </div>
      </div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js-for-sorting.js"></script>  
  </body>
</html>