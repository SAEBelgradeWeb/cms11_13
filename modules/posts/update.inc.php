
<?php 
if($_POST['submit']) {
	$title = $_POST['title']; //TODO: ovde uraditi za sve validaciju
	$article = $_POST['article'];
	$image = $_POST['image'];
	$author = $_POST['author'];
	$ts = time();

	if ($_FILES['image']['tmp_name']) {
		$tmp = $_FILES['image']['tmp_name']; //temporary file putanja
		$image_name = $_FILES['image']['name'];
		$new_name = time() . "_" . $image_name;
		move_uploaded_file($tmp, "images/" . $new_name);
	} else {
		$new_name = $_POST['old_img'];
	}

	$id = $_GET['id'];
	$sql = "UPDATE posts SET title = '$title', article = '$article', image = '$new_name', id_author='$author', ts = '$ts' WHERE id = '$id'";
	mysql_query($sql);

	?>

 <script>
 	window.location = "?module=posts";
 </script>
	<?php
}

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id ='$id'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$author_id = $row['id_author'];

 ?>
<form action="" method="post" enctype="multipart/form-data">
	<label for="title">Title: </label>
		<input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">
	
	<br>
	<label for="article"></label>
	<textarea name="article" id="article" cols="30" rows="10"><?php echo $row['article'] ?></textarea>
	<br>
	<label for="image">Image: </label>
		<img src="images/<?php echo $row['image'] ?>" alt="" width="80">
		<input type="hidden" name="old_img" value="<?php echo $row['image'] ?>">  
		<input type="file" name="image" id="image">
	
	<br>
	<label for="author">Author: </label>
		<select name="author" id="author">
		<option value="">--- SELECT AUTHOR ---</option>
		<?php 
		$sql = "SELECT * FROM authors";
		$result = mysql_query($sql);
		while ($arow = mysql_fetch_assoc($result)) {
			if ($author_id == $arow['id']) {
				$selected = "selected";
			} else {
				$selected = "";
			}

			//$selected = ($author_id == $arow['id']) ? "selected" : "";
			?>
		
		<option value="<?php echo $arow['id'] ?>" <?php echo $selected ?>><?php echo $arow['firstname'] . " " . $arow['lastname'] ?></option>
			<?php
		}

		 ?>

		</select>
	
	<br>
	<input type="submit" value="Submit" name="submit">


</form>

