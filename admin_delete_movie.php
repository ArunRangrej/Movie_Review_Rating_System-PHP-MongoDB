<?php
session_start();
if(isset($_SESSION['admin']))
{

  if(isset($_POST['submit']))
  {
    $title=$_POST['title'];
    $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete( ['title'=>$title]);
    $mng -> executeBulkWrite('arun.movie', $bulk);
    echo  "successfully Deleted";
 ?>
  
    <script type="text/javascript">
 if(window.confirm("successfully Deleted"))
  window.location.href="adminloged.php";

</script><?php
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
            <li  ><a href="admin_add_movie.php">ADD MOVIE</a></li>
            <li><a href="admin_update_movie.php">UPDATE MOVIE</a></li>
            <li><a href="admin_delete_movie.php">DELETE MOVIE</a></li>
          </ul>



<ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"> LOGOUT </a></li>
          </ul>





        </div>

      </div>
    </nav>
    <div class="container">
    <div class="container">
      <div class="col">
        
      </div>
    </div>

    
      <div class="col-xs-3" style="text-align: center;">

      <div class="list-group">
        <a href="admin_add_movie.php" class="list-group-item active">Add Movies</a>
        <a href="admin_update_movie.php" class="list-group-item ">Update Movies</a>
        <a href="admin_delete_movie.php" class="list-group-item ">Delete Movies</a>
      </div>
    </div>
    

    
    <div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Delete Movie HERE </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="title" placeholder="Movie Title" required="">
          </div>     

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Delete Movie </button>    
      </div>

        </form>
        
        </div>
      
    </div>
</div>

   
</body>
</html>


<?php
}
else
  header("location:index.php")


?>