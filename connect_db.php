<?php
if(!(@mysql_connect('localhost','root',''))||!(@mysql_select_db('arpan')))
{echo"we are temporarily down..cant connect..";
die();
}
?>