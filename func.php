<?php
function checkeligible($id)
{
	$query="SELECT `votes`, `givevotes` FROM `student_info` WHERE `id`='$id'";
	$query_run=mysql_query($query);
	if($var=mysql_fetch_assoc($query_run))
	{
		if ($var['votes']==0)
		return true;
		else return false;
	}
}
?>