<?php
require 'connect_db.php';
include 'h1.php';


session_start();
if (isset($_SESSION['false']))
{	
	if($_SESSION['false']==1)
	echo 'enter right id/password combo';
}

if(empty($_SESSION['id']))
{
	if(isset($_POST['rollno'])&&isset($_POST['password']))
	{
		$username=mysql_real_escape_string($_POST['rollno']);
		$password=md5($_POST['password']);
		if(!empty($username)&&!empty($password))
    		{
    			$_SESSION['un']=$username;
    			$_SESSION['pwd']=$password;
    			header('Location: check.php');
    
   			 }	
    	else
    	{	
    	echo "enter username and password";
    	}  
	}

	?>
	<form action="index.php" method="post">
	enter roll number: <br>
	<input type="text" name="rollno" value=""><br>
	enter password:<br>
	<input type="password" name="password"><br>
	<input type="submit" value="login"><br>
	</form>
	'OR'<br><br>
	<form action="register.php" method="post"><input type="submit" value="register"></form>

	<?php	
}
else
{
header('Location: tasks.php');
}

?>
