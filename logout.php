<?php
require 'connect_db.php';
session_start();
session_destroy();
header('Location: index.php');
?>
