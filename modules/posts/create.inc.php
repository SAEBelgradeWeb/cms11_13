
<?php 
if($_POST['submit']) {
	$title = $_POST['title']; //TODO: ovde uraditi za sve validaciju
	$article = $_POST['article'];
	$image = $_POST['image'];
	$author = $_POST['author'];
	$ts = time();

	$tmp = $_FILES['image']['tmp_name']; //temporary file putanja
	$image_name = $_FILES['image']['name'];
	$new_name = time() . "_" . $image_name;

	move_uploaded_file($tmp, "images/" . $new_name);



	$sql = "INSERT INTO posts SET title = '$title', article = '$article', image = '$new_name', id_author='$author', ts = '$ts'";
	mysql_query($sql);

		?>

 <script>
 	window.location = "?module=posts";
 </script>
	<?php
}



 ?>
<form action="" method="post" enctype="multipart/form-data">
	<label for="title">Title: </label>
		<input type="text" name="title" id="title">
	
	<br>
	<label for="article"></label>
	<textarea name="article" id="article" cols="30" rows="10"></textarea>
	<br>
	<label for="image">Image: </label>
		<input type="file" name="image" id="image">
	
	<br>
	<label for="author">Author: </label>
		<select name="author" id="author">
		<option value="">--- SELECT AUTHOR ---</option>
		<?php 
		$sql = "SELECT * FROM authors";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_assoc($result)) {
			?>

		<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] . " " . $row['lastname'] ?></option>
			<?php
		}

		 ?>

		</select>
	
	<br>
	<input type="submit" value="Submit" name="submit">


</form>

