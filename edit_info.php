<?php
require 'connect_db.php';
include 'h5.php';
session_start();
$id=$_SESSION['id'];
if(!empty($id))
{
	if(isset($_POST['password'])&&isset($_POST['npassword'])&&isset($_POST['renpassword']))
	{
		$old=md5($_POST['password']);
		$new=md5($_POST['npassword']);
		$conf=md5($_POST['renpassword']);
		if(!empty($old)&&!empty($new)&&!empty($conf))
		{
			$query="SELECT `password` FROM `student_info` WHERE `id`='$id'";
			$query_run=mysql_query($query);
			$check=mysql_result($query_run,0);
			if($check==$old)
			{
				if($new==$conf)
				{
				 $query="UPDATE `student_info` SET `password`='$new' WHERE `id`='$id'";
				 mysql_query($query);
				 echo "password changed succesfully!";
				}else echo "passwords do not match";
			}else echo "old password is wrong";
		}else echo "enter the fields<br>";
	}
}
else
header('Location: index.php');
?>
<form method="post" action="edit_info.php">
enter old password:<br>
<input type="password" name="password" maxlength="30" ><br>
enter new password:<br>
<input type="password" name="npassword" maxlength="30"><br>
re-enter new password:<br>
<input type="password" name="renpassword" maxlength="30"><br>
<input type="submit" value="submit"><br>
</form>
<a href='tasks.php'>go back</a>