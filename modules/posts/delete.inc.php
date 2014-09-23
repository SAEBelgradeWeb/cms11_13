<?php 

	$id = $_GET['id'];
	$sql = "DELETE FROM posts WHERE id = '$id'";
	mysql_query($sql);
	//header("Location: ?module=posts");
 ?>

 <script>
 	window.location = "?module=posts";
 </script>