<?php
session_start();
if(isset($_SESSION['admin']))
{

  if(isset($_POST['submit']))
  {
    $title=$_POST['title'];
    $img=$_POST['img'];
    $year=(int)$_POST['year'];
    $movie_type=$_POST['movie_type'];
    $released=$_POST['released'];
    $runtime=(int)$_POST['runtime'];
    $category=$_POST['category'];
    $director=$_POST['director'];
    $writer=$_POST['writer'];
    $plot=$_POST['plot'];
    $wins=(int)$_POST['wins'];
    $nominations=(int)$_POST['nominations'];
    $imdb_rating=(int)$_POST['imdb_rating'];
    $tomato_rating=(int)$_POST['tomato_rating'];



     $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert( ['title'=>$title,
            'img'=>$img,
            'year'=>$year,
            'movie_type'=>$movie_type,
            'released'=>$released,
            'runtime'=>$runtime,
            'category'=>$category,
            'director'=>$director,
            'writer'=>$writer,
            'plot'=>$plot,
            'awards'=>['wins'=>$wins, 'nominations'=>$nominations],
            'rating_review'=>['imdb_review'=>['rating'=>$imdb_rating] , 'tomato_review'=>['rating'=>$tomato_rating],'user_review'=>array()]
            ]);
    $mng -> executeBulkWrite('arun.movie', $bulk);
    echo  "successfully Inserted";
      ?>
  
    <script type="text/javascript">
 if(window.confirm("successfully Inserted"))
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
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW Movie HERE </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="title" placeholder="Movie Title" required="">
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="price" name="img" placeholder="Movie Poster Image" required="">
          </div>

          <div class="form-group">
            <input type="number" class="form-control" id="description" name="year" placeholder="Movie Released Year" required="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="movie_type" placeholder="Movie Certificate Type ." required="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="released" placeholder="Released Date (dd-mm-yyyy)" required="">
          </div>

          <div class="form-group">
            <input type="number" class="form-control" name="runtime" placeholder="Runtime" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="category" placeholder="Category." required="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="director" placeholder="Director" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="writer" placeholder="Writer" required="">
          </div>


          <div class="form-group">
            <input type="text" class="form-control" name="plot" placeholder="Plot ( Story Summary )" required="">
          </div>

          <div class="form-group">
            <input type="number" class="form-control" name="wins" placeholder="Awards wins" required="">
          </div>


          <div class="form-group">
            <input type="number" class="form-control" name="nominations" placeholder="Award Nominations" required="">
          </div>


          <div class="form-group">
            <input type="number" class="form-control" name="imdb_rating" placeholder="IMDB RATING" required="">
          </div>

          <div class="form-group">
            <input type="number" class="form-control" name="tomato_rating" placeholder="TOMATO RATING" required="">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> ADD Movie </button>    
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