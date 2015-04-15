<?php
require 'connect_db.php';
include 'h4.php';
session_start();
$id=$_SESSION['id'];
$branch=$_SESSION['branch'];
$year=$_SESSION['year'];
$votes=$_SESSION['votes'];
$givevotes=$_SESSION['givevotes'];

//echo $nom."<BR>";
if(!empty($id))

{
	$query="SELECT `id`, `firstname`, `surname`, `roll`, `votes` FROM `student_info` WHERE `branch`='$branch' AND `year`='$year' and `votes`>='2'";
	$query_run=mysql_query($query);
	if(mysql_num_rows($query_run)==0)
		echo "No Nominees yet!<br>";
	else
	 { 
	 echo "<center><table border>";
	   echo "<tr><th>name</th><th>roll number</th>";

	   	if($givevotes==1) //to enable votes if not voted
	   		echo "<th>vote</th></tr>";
	   	else echo "</tr>";

	 	while($var=mysql_fetch_assoc($query_run))
	 		{
	 			$count=$var['votes'];
	 			$hisid=$var['id'];
	 			//echo $hisid;
	 			echo "<tr><td><a href=profile.php?id=".$hisid.">".$var['firstname']." ".$var['surname']."</a></td>"."<td>".$var['roll']."</td>";//echo $var['id'];
	 			if($givevotes==1)
	   				{
	   					echo "<th><form action='nominees.php' method='post'>
	   						<input type='submit' name=".$hisid." value='vote'>
	   						</form>
	   						</th></tr>";
	   				}
	   			else echo "</tr>";
	   			if(isset($_POST[$hisid]))
				{//echo "OK";
					$count++;
					$_SESSION['givevotes']=0;
					$query="UPDATE `student_info` SET `votes`='$count' WHERE `id`='$hisid'";
					$query_run=mysql_query($query);
					$query="UPDATE `student_info` SET `givevotes`='0' WHERE `id`='$id'";
					$query_run=mysql_query($query);
					header('Location: nominees.php');
				}
	 		}		
	 echo "</table></center>";

	 		
	 }

if($givevotes==0&&$votes==0)
	 	echo "thanks for voting<br>";

	 if($givevotes==0&&$votes!=0)
	 	echo "best of luck!<br>";
}
else
{
header('Location: page1.php');
}
?>
<a href='tasks.php'>go back</a>