<?php 
error_reporting(2);
require_once("config.php");
require_once("lib/db_conn.php");
require_once("lib/functions.php");
$logovan = check_if_login();

if (!$logovan) {

header("Location: login.php");
}
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
<h5>Welcome <?php echo $_SESSION['user']['username'] ?></h5>
<h5><a href="logout.php">Logout</a></h5>
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