<!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/starter-template/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">What's Your Story?</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li class="active"><a href="user.php">Profile</a></li>
            <li><a href="sign-out.php">Sign-out</a></li>
            <li ><a href="register.php">Register</a></li>
            <li><a href="blog.php"> Blogs</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

<div style="padding:20px">
 <?php
			ob_start();
			session_start();
			require 'db_connect.php';
			
		
			if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
				header("location:home.php");
				exit();
			}
			else{
				$user_id = $_SESSION['user_id'];
				
			if(isset($_POST['cat'])){
				if(!empty($_POST['cat'])){
					$cat=($_POST['cat']);
					$query = "INSERT INTO `catogry`( `cat`) VALUES ('$cat')";
					if(mysql_query($query)){
						echo 'category updated'; }
						else{
							echo 'Error';}
					}}
					
			if(isset($_POST['approve'])){
				if(!empty($_POST['approve'])){
					$approve_id =$_POST['approve'];
					$query = "SELECT `art_id` FROM `article` WHERE `art_id` = '$approve_id' AND status = 'waiting'" ;
					$query_num_rows = mysql_num_rows(mysql_query($query));
					if($query_num_rows == 1){
						$query ="UPDATE `article` SET `status` = 'approved' WHERE  `art_id`='$approve_id'";
						if($query_run = mysql_query($query)){
							echo "Article with ".$approve_id." is approved.";}
						else{
							echo 'Error occured in approving';
							}
						}
					else {
						echo 'No such article present or article is already approved.';
						}
					}}
					
					if(isset($_POST['del'])){
				if(!empty($_POST['del'])){
					$del_id =$_POST['del'];
					$query = "SELECT `art_id` FROM `article` WHERE `art_id` = '$del_id' AND status = 'waiting'" ;
					$query_num_rows = mysql_num_rows(mysql_query($query));
					if($query_num_rows == 1){
						$query ="DELETE FROM `article` WHERE `art_id` = $del_id;";
						if($query_run = mysql_query($query)){
							echo "Article with ".$del_id." is deleted.";}
						else{
							echo 'Error occured in deleting';
							}
						}
					else {
						echo 'No such article present or article is already approved.';
						}
					}}
			
			}?>
            
<form action="admin.php" method="post">
<h3>Update Category:</h3>
Add the category for writting blogs<br>
<input type="text" name="cat"><br>
<input type="submit" value="update">
</form><br>

<?php
echo '<h3>Blogs For approval are</h3>';
$query = "SELECT * from `article` where `status` = 'waiting'";
$query_run = mysql_query($query);
$num=mysql_num_rows($query_run);
$i = 0;
while($i< $num){
	echo ($i+1).'. <br>Title :'.mysql_result($query_run,$i,'title').'<br>';
	echo 'Art_id :'.mysql_result($query_run,$i,'art_id').'<br>';
	echo 'Category :'. mysql_result( mysql_query( "SELECT `cat` FROM `catogry` WHERE `cat_id` = '".mysql_result($query_run,$i,'cat_id')."'"),0,'cat').'<br>';
	echo 'Blog :'.mysql_result($query_run,$i,'description').'<br>';
	$i=$i+1;
	}
?>
<form action="admin.php" method="post">
<h3>Approve Blog :</h3>
Enter the Article id of the blog you want to approve<br>
<input type="text" name="approve" placeholder="Art_id"><br>
<input type="submit" value="Approve">
</form>

<form action="admin.php" method="post">
<h3>Delete blog :</h3>
Enter the Article id of the unsuitable blog you want to delete<br>
<input type="text" name="del" placeholder="Art_id"><br>
<input type="submit" value="Delete">
</form>
</div>
</body>
</html>