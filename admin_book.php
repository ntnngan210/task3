<?php
	session_start();
	require_once "./controllers/admin.php";
	$title = "List book";
	require_once "./template/header.php";
	// $database = new Database();
	// $conn =$database->getConnect();
	include "./controllers/product_books.php";

?>
	<p class="lead"><a href="admin_add.php">Add new book</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ISBN</th>
			<th>Title</th>
			<th>Author</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Publisher</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php 
		for ($x = 0; $x <count($row); $x++) {
			echo '
			<tr><td>'.$row[$x]['book_isbn'].'</td>
			<td>'.$row[$x]['book_title'].'</td>
			<td>'.$row[$x]['book_author'].'</td>
			<td>'.$row[$x]['book_image'].'</td>
			<td>'.$row[$x]['book_descr'].'</td>
			<td>'.$row[$x]['book_price'].'</td>
			<td>'.$row[$x]['publisherid'].'</td>
			<td><a href="admin_edit.php?bookisbn='.$row[$x]['book_isbn'].'">Edit</a></td>
			<td><a href="admin_delete.php?bookisbn='.$row[$x]['book_isbn'].'">Delete</a></td>
			
			</tr>
			';
		  }
	
		?>
			
	
	</table>

<?php

	require_once "./template/footer.php";
?>