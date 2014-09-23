<?php 

	$id = $_GET['id'];
	$sql = "DELETE FROM authors WHERE id = '$id'";
	mysql_query($sql);
	//header("Location: ?module=posts");
 ?>

 <script>
 	window.location = "?module=authors";
 </script>