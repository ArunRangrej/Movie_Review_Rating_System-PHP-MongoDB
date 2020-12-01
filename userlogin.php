
  <?php if(isset($_POST['submit']))
  {
    $user_name=$_POST['username'];
    $password=$_POST['password'];
     $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $bulk = new MongoDB\Driver\BulkWrite;
$query = new MongoDB\Driver\Query([]); 
$rows = $mng->executeQuery("arun.movie_users", $query);
foreach ($rows as $row1) 
{
  if($user_name == $row1->user_name)
  {
    if($user_name == $row1->user_name && $password == $row1->password)
    {
      session_start(); 
      $_SESSION['uname']=$user_name;
      header("location:userloged.php");
    }
    else
    {
      ?>
       <script type="text/javascript">
 if(window.confirm("Password is wrong"))
</script>
<?php
    }

  }
  else
  {
 ?>
 <script type="text/javascript">
 if(window.confirm("User Name Doesnot Exist. please sign up"))
  window.location.href="usersignup.php";
</script>
<?php

}   
}
}
?>



<html>
  <head>
    <title>Movie Review and Rating System</title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/foodlist.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>
<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li  ><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
          </ul>


<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="usersignup.php"> User Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="userlogin.php"> User Login</a></li>
              <li> <a href="adminlogin.php"> Admin Login</a></li>
            </ul>
            </li>
          </ul>




        </div>

      </div>
    </nav>

    <div class="container">
    <div class="jumbotron">
     <h2>Hi User,<br> Welcome to <span class="edit"> Movie Review and Rating System </span></h2>
     <br>
   <p>Kindly LOGIN to continue.</p>
    </div>
    </div>

    <div class="container" style="margin-top: 4%; margin-bottom: 2%;">
      <div class="col-md-5 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-heading"> Login </div>
        <div class="panel-body">
          
        <form action="" method="POST">
          
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
            <div class="input-group">
              <input class="form-control" id="username" type="text" name="username" placeholder="Username" required="" autofocus="">
              </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
            <div class="input-group">
              <input class="form-control" id="password" type="password" name="password" placeholder="Password" required="">
           
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Submit</button>
          </div>

        </div>
        <label style="margin-left: 5px;">or</label> <br>
       <label style="margin-left: 5px;"><a href="usersignup.php">Create a new account.</a></label>

        </form>
        </div>     
      </div>      
    </div>
    </div>


    </body>
</html>