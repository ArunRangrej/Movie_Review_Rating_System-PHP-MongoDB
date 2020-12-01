<?php
session_start();
if(isset($_SESSION['uname']))
{
	if(isset($_POST['submitrating']))
	{
		$title=$_POST['title'];
		$usrname=$_SESSION['uname'];
		$rating=(int)$_POST['user_rate'];
		$comment=$_POST['user_review'];
		 $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->update( ['title'=>$title],
					['$addToSet'=>['rating_review.user_review'=>
								array('name'=>$usrname,
								'rating'=>$rating,
								'comment'=>$comment)
									]]);
		$mng -> executeBulkWrite('arun.movie', $bulk);
		?>
	
 		<script type="text/javascript">
 if(window.confirm("Your rating and review are successfull recorded"))
  window.location.href="userloged.php";

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
            <li><a>Logged user name : <?php echo $_SESSION['uname'];?></a></li>
          </ul>


<ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"> LOGOUT </a></li>
          </ul>




        </div>
    </div>
</nav>






<?php
$db="arun";
$coll="movie";
$title=$_POST['title'];
$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$query = new MongoDB\Driver\Query([]);
$rows = $conn->executeQuery("$db.$coll", $query);
    $count=0;
foreach ($rows as $row1) 
{

     if ($row1->title == $title)
     {
      echo "<div class='row'>";

?>
<div class="container" style="width:40%;" style="position: center">
<form method="POST" action="">
<img src="<?php echo "images/$row1->img";?>" class="img-responsive" style="width:200%,height:25%;" >
<h4>Title : <input class="text-dark" type="text" name="title" value="<?php echo $row1->title; ?>" style="border:none" width="100" readonly>
</h3>
<h4>year : <input class="text-dark" type="text" value="<?php echo $row1->year; ?>" style="border:none" readonly></h3>
<h4>Movie Type : <input class="text-dark" type="text" value="<?php echo $row1->movie_type; ?>" style="border:none" readonly></h3>
<h4>Released Date : <input class="text-dark" type="text" value="<?php echo $row1->released; ?>" style="border:none" readonly></h3>	
<h4>Run Time : <input class="text-dark" type="text" value="<?php echo $row1->runtime."mins"; ?>" style="border:none" readonly></h3>	
<h4>category : <input class="text-dark" type="text" value="<?php echo $row1->category; ?>" style="border:none" readonly></h3>	
<h4>Director : <input class="text-dark" type="text" value="<?php echo $row1->director; ?>" style="border:none" readonly></h3>	
<h4>Writer : <input class="text-dark" type="text" value="<?php echo $row1->writer; ?>" style="border:none" readonly></h3>			
<h4>         Wins : <input class="text-dark" type="text" value="<?php echo $row1->awards->wins; ?>" style="border:none" readonly></h3>
<h4>         Nominations : <input class="text-dark" type="text" value="<?php echo $row1->awards->nominations; ?>" style="border:none" readonly></h3>
 <h4><input class="text-dark" type="text" value="<?php echo "IMDB Rating : ".$row1->rating_review->imdb_review->rating; ?>" style="border:none" readonly></h3>
  <h4><input class="text-dark" type="text" value="<?php echo "TOMATO Rating : ".$row1->rating_review->tomato_review->rating; ?>" style="border:none" readonly></h3>
 <h4>Set your Rating : <input type="number" min="1" max="10" name="user_rate" onkeyup=imposeMinMax(this) required=""></h3> 	
 <h4>Enter your Review : <input type="text"  name="user_review" required=""></h3> 		
<input type="submit" name="submitrating" value=" Rate and Review " >
</div>
</form>    
</div>
<?php
}
}
?>   
</body>
</html>

<script type="text/javascript">
	function imposeMinMax(el){
  if(el.value != ""){
    if(parseInt(el.value) < parseInt(el.min)){
      el.value = el.min;
    }
    if(parseInt(el.value) > parseInt(el.max)){
      el.value = el.max;
    }
  }
}
</script>

<?php
}
else
  header("location:index.php")


?>