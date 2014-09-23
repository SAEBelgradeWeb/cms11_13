
<a href="?module=posts&action=create">Add New</a>
<table>
	<tr>
		<th>No</th>
		<th>Title</th>
		<th>Text</th>
		<th>Author</th>
		<th>Image</th>
		<th>Date</th>
		<th>Actions</th>
	</tr>

<?php 
	$sql = "SELECT posts.*, authors.firstname, authors.lastname 
			FROM posts  
			LEFT JOIN authors 
			ON authors.id = posts.id_author";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)):
		$count++;

	$txt = $row['article'];
	$n_char = strlen($txt);
	$txt = substr($txt, 0, 50);
	if ($n_char >= 50) $txt.="...";


	$id_author = $row['id_author'];

	/*$sql = "SELECT * FROM authors WHERE id = '$id_author'";
	$result1 = mysql_query($sql);
	$arow=mysql_fetch_assoc($result1);*/



 ?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $row['title'] ?></td>
		<td><?php echo $txt ?></td>
		<td><?php echo $row['firstname'] . " " . $row['lastname'] ?></td>
		<td><img src="images/<?php echo $row['image'] ?>" alt="" width="60"></td>
		<td><?php echo date("d. m. Y." , $row['ts']) ?></td>
		<td><a href="?module=posts&action=update&id=<?php echo $row['id'] ?>">Edit</a> | <a href="?module=posts&action=delete&id=<?php echo $row['id'] ?>">Delete</a></td>
	</tr>

	<?php 
	endwhile;
	 ?>
</table>