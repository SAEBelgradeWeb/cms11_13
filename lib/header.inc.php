<?php 
error_reporting(2);
require_once("config.php");
require_once("lib/db_conn.php");
require_once("lib/functions.php");
 ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/main.js"></script>
</head>
<body>
<header>
	<nav>
		<ul>
			<?php 
			$dirs = scandir("modules/");
			foreach ($dirs as $key => $value) {
				if ($value != "." && $value != "..") {
					echo "<li><a href='?module=".$value."'>" . $value . "</a></li>";
				}
			}


			 ?>
		</ul>

	</nav>
</header>