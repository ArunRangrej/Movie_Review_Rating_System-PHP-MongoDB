<?php
session_start();
if(isset($_SESSION['admin']))
{
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

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <div class="item active">
     <center> <img src="images/1.jpg" style="width:60%;"></center>
      <div class="carousel-caption">
      </div>
      </div>
      

      <div class="item">
   <center>  <img src="images/2.jpg" style="width:60%;"></center> 
      <div class="carousel-caption">

      </div>
      </div>
      <div class="item">
    <center>  <img src="images/3.jpg" style="width:60%;"></center> 
      <div class="carousel-caption">
      </div>
      </div>
    
    </div>
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>

<div class="jumbotron">
  <div class="container text-center">
    <h2>Welcome <?php echo $_SESSION['admin'] ?> To Movie Review and Rating System</h2>      
  </div>
</div>




<div class="container" style="width:95%;">


<?php
$db="arun";
$coll="movie";

$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$query = new MongoDB\Driver\Query([]); 

$rows = $conn->executeQuery("$db.$coll", $query);
    $count=0;
foreach ($rows as $row1) 
{
     if ($count == 0)
      echo "<div class='row'>";

?>
<div class="col-md-3">
<div class="mypanel" align="center";>
<img src="<?php echo "images/$row1->img"; ?>" class="img-responsive" style="width:100%;">
<h3 class="text-dark"><b><?php echo $row1->title; ?></b></h3>
<h4 class="text-dark"><?php echo $row1->year; ?></h4>
</div>
</form>
      
     
</div>
<?php
}


?>

   
</body>
</html>


<?php
}
else
  header("location:index.php")


?>