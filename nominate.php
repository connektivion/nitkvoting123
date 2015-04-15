<?php
require 'connect_db.php';
include 'h7.php';
session_start();
$id=$_SESSION['id'];
$votes=$_SESSION['votes'];
$givevotes=$_SESSION['givevotes'];
//echo $givevotes;
if(!empty($id))
{
	if($givevotes==1) //check if already voted
	{
	echo '<form action="nominate.php" method="post"><input type="submit" name="click" value="click to submit"></form>';
	
		if(isset($_POST['click']))
		{//echo "OK";
			$_SESSION['givevotes']=0;
			$_SESSION ['votes']=1;
			$query="UPDATE `student_info` SET `votes`='1', `givevotes`='0' WHERE `id`='$id'";
			$query_run=mysql_query($query);
			header('Location: nominate.php');

		}
	}	
	if($givevotes==0&&$votes==1) 
	{
		echo "You are in the list of possible nominees<br>";
		echo "You may submit your <a href='pledge.php'>PLEDGE!</a><br>";
	}
	if($votes>=2) 
	echo "you are in the final nominated list<br>";
	if($givevotes==0&&$votes==0)
		echo "thank you for voting!<br>";
}
else
{
header('Location: page1.php');
}
?>
<a href='tasks.php'>go back</a>