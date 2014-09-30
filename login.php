<?php 
error_reporting(2);
require_once("config.php");
require_once("lib/db_conn.php");
require_once("lib/functions.php");

if($_POST['username']) {
	$logovan = login_user();
	if($logovan) {
		header("Location: index.php");
	}

}


?>


<form action="" method="post">
	
	<input type="text" name="username">
	<br>
	<input type="password" name="password">
	<br>
	<input type="submit" value="Login">

</form>


<?php 
require_once("lib/footer.inc.php");

 ?>