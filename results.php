<?php //really basic
require 'connect_db.php';
include 'h8.php';
session_start();
$id=$_SESSION['id'];
$branch=$_SESSION['branch'];
if(!empty($id))
{ 
	$query="SELECT `firstname`, `surname`, `roll`, `votes` FROM `student_info` WHERE `branch`='$branch' AND `votes`>1 ORDER BY `student_info`.`votes` DESC";
	$query_run=mysql_query($query);
		echo "<center><table border>";
	   	echo "<tr><th>rank</th><th>name</th><th>roll number</th><th>votes</th>";
	   	$i=1;
	  	 while($var=mysql_fetch_assoc($query_run))
	 		{
				echo "<tr><td>".$i."</td><td>".$var['firstname']." ".$var['surname']."</td>"."<td>".$var['roll']."</td>"."<td>".$var['votes']."</td>";
				$i++;
			}
	echo "</table></center>";
}
else
header('Location: index.php');
?>
<a href='tasks.php'>go back</a>


