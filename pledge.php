<?php
require 'connect_db.php';
include 'h6.php';
session_start();
$id=$_SESSION['id'];
$name1=$_SESSION['name1'];
$name2=$_SESSION['name2'];
if(!empty($id))
{
	echo "make/change your pledge(100words),<br> ".$name1." ".$name2."<br>";
     if(isset($_POST['pledge']))
     {
     	$txt=$_POST['pledge'];
     	if(!empty($txt))
     	{	
     		$query="UPDATE `student_info` SET `pledge`='$txt' WHERE `id`='$id'";
			$query_run=mysql_query($query);
			echo "successfully updated!";
		}	
     }
}

else
header('Location: index.php');
?>
<form action='pledge.php' method='post'>
	  <input type='text' maxlength=100 name="pledge" value='<?php if(isset($pledge)) echo $croll ?>'><br>
	  <input type='submit' value="submit"><br>
	</form>

<a href='tasks.php'>go back</a>
