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
            <li ><a href="home.php">Home</a></li>
            <li class="active"><a href="user.php" >Profile</a></li>
            <li><a href="sign-out.php">Sign-out</a></li>
            <li ><a href="register.php">Register</a></li>
            <li><a href="blog.php"> Blogs</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<div style="padding:20px">
<h3>Write a Story</h3><br><br>
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
				if(isset($_POST['title'])&&isset($_POST['cat'])&&isset($_POST['blog'])){
					$cat = $_POST['cat'];
					$blog = $_POST['blog'];
					$title = $_POST['title'];
					$status = 'waiting';
					$query = "SELECT `cat_id` FROM `catogry` WHERE `cat` = '".$cat."' ";
			$query_run = mysql_query($query);
				$query_result = mysql_result($query_run,0,'cat_id');
				$query ="INSERT INTO article (user_id ,cat_id ,status ,title,description) VALUES( '$user_id','$query_result','$status','$title','$blog')";
					if(mysql_query($query)){
						echo "Your blog is sent for approval";}
					else
					{echo "Error occured";}
						}
			}?>
<form action="user.php" method="post">

<input type="text" placeholder="Title" name="title" required><br><br>
<?php
echo 'Choose from below categories.Categories are<br> ';
$query = "SELECT `cat` from `catogry`";
$query_run = mysql_query($query);
$num=mysql_num_rows($query_run);
$i = 0;
while($i< $num){
	echo mysql_result($query_run,$i,'cat').'<br>';
	$i=$i+1;
	}

?><input type="text" placeholder="Category" name="cat" required><br><br>

<textarea placeholder="Blog"  name="blog"required cols="200" rows="15"></textarea><br><br>
<input type="submit" value="Submit">
</form>          

</div>
</body>
</html>