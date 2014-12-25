<!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/starter-template/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <title>Register</title>

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
            <li><a href="blog.php"> Blogs</a></li>
            <li class="active"><a href="register.php">Register</a></li>
            <li><a href="sign-out.php">Sign-out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div style="padding:20px">
 <?php

require 'db_connect.php';
if(isset($_POST['name'])&&isset($_POST['lname'])&&isset($_POST['userpass'])&&isset($_POST['confirmuserpass']))
{
// Get values from form
$name=$_POST['name'];
$lname=$_POST['lname'];

$username=$_POST['username'];
$userpass=$_POST['userpass'];
$confirmuserpass=$_POST['confirmuserpass'];

if($userpass == $confirmuserpass){//chenck if passwords entered are equal
	$userpass = md5($userpass);
	$query ="SELECT `user_id` FROM `admin` WHERE `user_id`='$username'";
				$query_run= mysql_query($query);
				if(mysql_num_rows($query_run)>=1){//if username already exists in admin table
					echo "Username aready exists.Enter a new username.";
				}
				else {
					$query ="SELECT `user_id` FROM `user` WHERE `user_id`='$username'";
					$query_run= mysql_query($query);
					if(mysql_num_rows($query_run)>=1){//if username already exists in salesperson table
					echo "Username aready exists.Enter a new username.";
					}
					else {
						// Insert data into mysql
						$sql="INSERT INTO user(user_id,pass,fname,sname)
						VALUES('$username', '$userpass', '$name', '$lname')";
						$result=mysql_query($sql);

						// if successfully insert data into database, displays message "Successful".
						if($result){
							echo "Successful";
							header('Location:profile.php');
						}

						else {
							echo "ERROR";
							}
						}
				}
	}
else {
	echo "Password and confirm password don't match";
	}
}

?>

<?php
// close connection
mysql_close();
?>
<form method="post" action="register.php">
  <table>
    <tr>
      <td><label>First name</label>
      </td>
      <td ><input type="text" name="name" placeholder="Fname*" value"" required /><br>
      </td>
    </tr>
     <tr>
      <td><label>Last name</label>
      </td>
      <td ><input type="text" name="lname" placeholder="Lname*" value"" required /><br>
      </td>
    </tr>
    <tr>
      <td><label>Username</label>
      </td>
      <td><input type="text" name="username" placeholder="Username*" value"" required /><br>
      </td>
    </tr>
    <tr>
      <td><label>Password</label>
      </td>
      <td><input type="password" name="userpass" placeholder="Password*" value"" required /><br>
      </td>
    </tr>
    <tr>
      <td><label>Confirm Password</label>
      </td>
      <td><input type="password" name="confirmuserpass" placeholder="Confirm Password*" value"" required /><br>
      </td>
    </tr>
  
    <tr>
      <td><input type="submit" value="Submit" />
      </td>
    </tr>
  </table>
</form>
   
   </div>
</body>
</html>