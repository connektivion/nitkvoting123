<?php
include 'index.php';
if(!empty($_SESSION['confirm']))
$id=$_SESSION['confirm'];
if(!empty($id))
{
	
	//session_destroy();
	echo "<br>Registerd Successfully,<br>Your ID is ".$id."<br>"."You may now login";
	session_destroy();
}

?>