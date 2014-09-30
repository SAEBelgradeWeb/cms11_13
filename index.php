<?php 
require_once("lib/header.inc.php");

 ?>

<?php 
if (!$_GET['action']) {
	$action = "read";
} else {
	$action = $_GET['action'];
}

if (!$_GET['module']) {
	$module = "posts";
} else {
	$module = $_GET['module'];
}



require_once('modules/' . $module . '/' .$action .'.inc.php');
 ?>

 <?php 
require_once("lib/footer.inc.php");

  ?>


