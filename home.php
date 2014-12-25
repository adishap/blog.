<!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/starter-template/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <title>Home</title>

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
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="user.php">Profile</a></li>
            <li><a href="sign-out.php">Sign-out</a></li>
            <li ><a href="register.php">Register</a></li>
            <li><a href="blog.php"> Blogs</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div style="padding:20px">
<h2 style="font-family:'Comic Sans MS', cursive; text-align:center">What's Your Story..???</h2>
A blog is your best bet for a voice among the online crowd. It's as easy to use as your e-mail.<br><br>
<?php
 require 'db_connect.php';
		 ob_start();
		 session_start();
		
		if(isset($_POST['username'])&&isset($_POST['password'])){
	  	$username = $_POST['username'];
		$password = md5($_POST['password']);
	   
	    $query = "SELECT `user_id` FROM `admin` WHERE `user_id` ='".$username."' AND `pass` = '".$password." ' ";
		$query_run = mysql_query($query);
		if(mysql_num_rows($query_run)== 1){$user_id = mysql_result($query_run,0,'user_id');
					$_SESSION['user_id'] = $user_id;
					header("location: admin.php");
			}
		else {
			 $query = "SELECT `user_id` FROM `user` WHERE `user_id` ='".$username."' AND `pass` = '".$password." ' ";
		$query_run = mysql_query($query);
		if(mysql_num_rows($query_run)== 1){
			$user_id = mysql_result($query_run,0,'user_id');
					$_SESSION['user_id'] = $user_id;
					header('location: user.php');
					}
		else{
			echo "Enter a valid username and password.";}
			}
		}
?>

	<form id="form1" name="form1" method="post" action="home.php">
	
		<strong>Username : </strong><input type="text" name="username" required/><br/><br/>
        <strong>Password : </strong><input type="password" name="password" required/><br/><br/>
         <input type="submit" value="Sign In" /><br/>
</form>
<a href="register.php">Create an account</a>
</div>
</body>
</html>