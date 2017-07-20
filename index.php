<?php
session_start();
include('connection.php');


?>
<!--All scripts I add at the end of the file-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Tasks</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <style>
        #adminlogin{
          font-size : 18px;
          color : darkred;
        }
      </style>
  </head>
  <body>
                              <!--Add JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



    <!--Navigation Bar-->  
      <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      
          <div class="container-fluid">
            
              <div class="navbar-header">
              
                  <a class="navbar-brand">Online Task Manager</a>
                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="mainpageloggedin.php">All tasks</a></li>
                    <li><a href="sorting.php">Sorting </a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li ><a id="adminlogin" href="#loginModal" data-toggle="modal"><strong>Log In (for admin only)</strong></a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>

      <!-- Login for admin password : 123-->
      
      <form   id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Login: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="form-group">
                      <input class="form-control" type="text" name="username" id="loginemail" placeholder="admin" maxlength="6">
                  </div>
                  <div class="form-group">
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="123" maxlength="3">
                      
                  </div>

                  
                  
              </div>
              <div class="modal-footer">
                <!-- <input class="btn green" name="login" id='login' type="submit" value="Login"> -->
                <div class="btn green btn-lg btn-login">GOGO</div>
                
                <script>
                  $('.btn-login').click(function(){
                    if($('#loginemail').val() == 'admin' && $('#loginpassword').val() == '123' ){
                      window.location.assign('forAdmin.php');
                    }
                  });
                </script>
                <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">
                  Cancel
                </button>
                  
              </div>
          </div>
      </div>
      </div>
      </form>
    
    <!--Jumbotron with Sign up Button-->
      <div class="jumbotron" id="myContainer">
          <h1>Online Task Manager</h1>
          <p>Useful tool for vigorous people.</p>
          <p>Easy to use, we are protecting your time!</p>
          <a type="button" href="mainpageloggedin.php" class="btn btn-lg green signup" "><strong>Add Task</strong></a>
      </div>


    
                  

    
      <!-- Footer-->
      <div class="footer">
          <div class="container">
              <p><strong>Kachailo Dmytro</strong> Copyright &copy; 2016-<?php $today = date("Y"); echo $today?>.</p>
          </div>
      </div>


    
    
    <script src="js/bootstrap.min.js"></script>
    <script src="mynotes.js"></script>
    
  </body>
</html>