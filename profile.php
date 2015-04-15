<?php
require 'connect_db.php';
include 'h3.php';
session_start();
$id=$_SESSION['id'];

if(!empty($id))
{
$query="SELECT `firstname`, `surname`, `roll`, `register`, `votes`,`pledge` FROM `student_info` WHERE `id` = '".mysql_real_escape_string($_GET['id'])."'";
$query_run=mysql_query($query);
while($vara=mysql_fetch_assoc($query_run))
echo "<b><h1>".$vara['firstname']." ".$vara['surname']."</h1></b><center><table border><tr><th>register number</th><th>roll number</th><th>pledge</th></tr><tr><td>".$vara['register']."</td><td>".$vara['roll']."</td><td>".$vara['pledge']."</td></tr></table></center>";
}
else 
header('Location: index.php');

?>
<a href='tasks.php'>go back</a>
