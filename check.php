<?php
require 'connect_db.php';
session_start();
$username=$_SESSION['un'];
$password=$_SESSION['pwd'];
//echo $username."<BR>".$password;
$query="SELECT `id`, `firstname`, `surname`, `roll`, `password`, `register`, `year`, `branch`, `votes`,`givevotes` FROM `student_info` WHERE  `roll`='$username' and `password`='$password'";
if($query_run=mysql_query($query))
{
	if(mysql_num_rows($query_run)==1)
	{
		$var=mysql_fetch_assoc($query_run);
		//echo "Welcome, ".$var['firstname'].' '.$var['surname'];
		$_SESSION['name1']=$var['firstname'];
		$_SESSION['name2']=$var['surname'];
		$_SESSION['id']=$var['id'];
		$_SESSION['branch']=$var['branch'];
		$_SESSION['year']=$var['year'];
		$_SESSION['votes']=$var['votes'];
		$_SESSION['givevotes']=$var['givevotes'];
		header('Location: tasks.php');	
	}
	else 
	{
	//echo "wrong username/password combination";//woudnt show because of force redirect,,correct it
	$_SESSION['false']=1;
	header('Location: index.php');
	//echo "wrong username/password combination";
	//include 'page1.php';
	}		
}
?>