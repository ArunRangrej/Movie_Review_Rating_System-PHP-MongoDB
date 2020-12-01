 
  <?php if(isset($_POST['submit']))
  {
    $full_name=$_POST['fullname'];
    $user_name=$_POST['username'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $password=$_POST['password'];
     $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $bulk = new MongoDB\Driver\BulkWrite;
$query = new MongoDB\Driver\Query([]); 
$rows = $mng->executeQuery("arun.movie_users", $query);
$flag=0;
foreach ($rows as $row1) 
{
  if($user_name == $row1->user_name)
  $flag=1;
}
if($flag==1)
{
 ?>
 <script type="text/javascript">
 if(window.confirm("User Name already Exist."))
 	window.location.href="usersignup.php";
</script>
<?php

}
if($flag==0)
{
    $bulk->insert( ['full_name'=>$full_name,
                    'user_name'=>$user_name,
                    'email'=>$email,
                    'contact'=>$contact,
                    'address'=>$address,
                    'password'=>$password,
                      ]);



        $mng -> executeBulkWrite('arun.movie_users', $bulk);
        ?>
  <div class="container">
  <div class="jumbotron" style="text-align: center;">
    <h2> <?php echo "Welcome $full_name!" ?> </h2>
    <h1>Your account has been created.</h1>
    <p>Login Now from <a href="userlogin.php">HERE</a></p>
  </div>
</div>
  <?php
 }   
}
?>

<html>
<head>
    <title> User Signup</title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/managersignup.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

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
    </nav>
  <body>
    <div class="container" style="margin-top: 0%; margin-bottom: 2%;">
      <div class="col-md-5 col-md-offset-4"style="color: black;">
      <div class="panel panel-primary"style="color: black;">
        <div class="panel-heading" > Create Admin Account </div>
        <div class="panel-body" style="color: black;">
          
        <form action="" method="POST">
         
          <div class="row">
          <div class="form-group col-xs-12">
            <label for="fullname"><span class="text-danger" style="margin-right: 20px;">*</span> Full Name: </label>
            <div class="input-group">
              <input class="form-control" id="fullname" type="text" name="fullname" placeholder="Your Full Name" required="" autofocus="">
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
            <div class="input-group">
              <input class="form-control" id="username" type="text" name="username" placeholder="Your Username" required="">
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="email"><span class="text-danger" style="margin-right: 5px;">*</span> Email: </label>
            <div class="input-group">
              <input class="form-control" id="email" type="email" name="email" placeholder="Email" required="">
             
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="contact"><span class="text-danger" style="margin-right: 5px;">*</span> Contact: </label>
            <div class="input-group">
              <input class="form-control" id="contact" type="text" name="contact" placeholder="Contact" required="">
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="address"><span class="text-danger" style="margin-right: 5px;">*</span> Address: </label>
            <div class="input-group">
              <input class="form-control" id="address" type="text" name="address" placeholder="Address" required="">
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
              <input type="submit" name="submit" value="submit"></div>

        </div>
        <label style="margin-left: 5px;">or</label> <br>
       <label style="margin-left: 5px;"><a href="userlogin.php">Have an account? Login.</a></label>

        </form>

        </div>
        
      </div>
      
    </div>
    </div>
    </body>
</html>