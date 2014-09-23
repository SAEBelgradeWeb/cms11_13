
<a href="?module=authors&action=create">Add New</a>
<table>
	<tr>
		<th>No</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>

<?php 
	$sql = "SELECT * FROM authors";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)):
		$count++;


	

 ?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $row['firstname'] ?></td>
		<td><?php echo $row['lastname'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><a href="?module=authors&action=update&id=<?php echo $row['id'] ?>">Edit</a> | <a href="?module=authors&action=delete&id=<?php echo $row['id'] ?>">Delete</a></td>
	</tr>

	<?php 
	endwhile;
	 ?>
</table>