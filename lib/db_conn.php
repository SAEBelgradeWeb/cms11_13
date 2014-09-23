<?php 

$conn = mysql_connect($db_host, $db_user, $db_pass);
if (!$conn) die('Not connected');

$db = mysql_select_db($db_base);
if (!$db) die();


 ?>