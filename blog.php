<!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/starter-template/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <title>Blog</title>

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
            <li><a href="user.php">Profile</a></li>
            <li><a href="sign-out.php">Sign-out</a></li>
            <li ><a href="register.php">Register</a></li>
            <li  class="active"><a href="blog.php"> Blogs</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div style="padding:20px">
   <?php
   ob_start();
			session_start();
			require 'db_connect.php';
			
		
echo '<h3>Stories</h3><br>';
$query = "SELECT * from `article` where `status` = 'approved'";
$query_run = mysql_query($query);
$num=mysql_num_rows($query_run);
$i = 0;
while($i< $num){
	echo ($i+1).'. <br>Title :'.mysql_result($query_run,$i,'title').'<br>';
	
	echo 'Category :'. mysql_result( mysql_query( "SELECT `cat` FROM `catogry` WHERE `cat_id` = '".mysql_result($query_run,$i,'cat_id')."'"),0,'cat').'<br>';
	echo 'Blog :'.mysql_result($query_run,$i,'description').'<br>';
	$i=$i+1;
	}
?></div>
</body>
</html>