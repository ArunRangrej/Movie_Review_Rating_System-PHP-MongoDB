<?php
session_start();
if(isset($_SESSION['uname']))
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
            <li><a>Logged user name : <?php echo $_SESSION['uname'];?></a></li>
          </ul>


<ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"> LOGOUT </a></li>
          </ul>




        </div>

      </div>
    </nav>
<div class="jumbotron">
  <div class="container text-center">
    <h2>Welcome <?php echo $_SESSION['uname'];?> To Movie Review and Rating System</h2>      
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
<form method="POST" action="userrate.php">
<div class="col-md-3">
<div class="mypanel" align="center">
<img src="<?php echo "images/$row1->img";?>" class="img-responsive" style="width:100%;" >
<h4>Title : <input class="text-dark" type="text" name="title" value="<?php echo $row1->title; ?>" style="border:none" readonly>
</h3>
<h4>year : <input class="text-dark" type="text" value="<?php echo $row1->year; ?>" style="border:none" readonly></h3>
 <h4><input class="text-dark" type="text" value="<?php echo "IMDB Rating : ".$row1->rating_review->imdb_review->rating; ?>" style="border:none" readonly></h3>
  <h4><input class="text-dark" type="text" value="<?php echo "TOMATO Rating : ".$row1->rating_review->tomato_review->rating; ?>" style="border:none" readonly></h3>
    <?php
      $name=$_SESSION['uname'];
      $flagg=0;
      foreach($row1->rating_review->user_review as $r)
      {
      if($r->name == $name )
      {
        $flagg=1;
      }
      echo "User : ".$r->name."<br>";
      echo "Ratung : ".$r->rating."<br>";
      echo "Comment : ".$r->comment."<br>";
      echo "---------------------------<br>";

    }
      if($flagg == 1)
      { 
       // require 'vendor/autoload.php';
//$collection = (new MongoDB\Client)->arun->movie;
//$myrows=$collection->aggregate([['$group'=>['_id'=>'$r->rating','count'=>['$avg'=>'$r->rating']]]]);

//foreach ($myrows as $myvalue) 
  //echo "Average user rating : ".$myvalue->count;

        ?><h4>You have already Rated</h3><?php
      }
      else
      {
            ?> <input type="submit" name="submit" value="Rate Now"> <?php
      }?>
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