
<?php 
if($_POST['submit']) {
	$firstname = $_POST['firstname']; //TODO: ovde uraditi za sve validaciju
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];


	$sql = "INSERT INTO authors SET firstname = '$firstname', lastname = '$lastname', email = '$email'";
	
	mysql_query($sql);

		?>

 <script>
 	window.location = "?module=authors";
 </script>
	<?php
}



$id = $_GET['id'];
$sql = "SELECT * FROM authors WHERE id ='$id'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

 ?>
<form action="" method="post">
	<label for="firstname">Firstname: </label>
		<input type="text" name="firstname" id="firstname"  value="<?php echo $row['firstname'] ?>">
	
	<br>

		<label for="lastname">Lastname: </label>
		<input type="text" name="lastname" id="lastname" value="<?php echo $row['lastname'] ?>">
	
	<br>

		<label for="email">Email: </label>
		<input type="text" name="email" id="email" value="<?php echo $row['email'] ?>">
	
	<br>
	
	<br>
	<input type="submit" value="Submit" name="submit">


</form>

