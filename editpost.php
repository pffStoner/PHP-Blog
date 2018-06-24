<?php
	require('config/config.php');
	require('config/db.php');
	if (isset($_POST['submit'])) {
		// get form data
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);
		$body = mysqli_real_escape_string($conn, $_POST['body']);

        $query = "INSERT INTO posts(title,body, author) VALUES('$title','$body','$author')";

		 if (mysqli_query($conn, $query)) {
		 	var_dump($query);
		 	header('Location: '.ROOT_URL.'');
		 	var_dump($query);
		 }else {
		 	echo "error".mysqli_error($conn);
		 }
    }
    //get id
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	//create query
	$query = 'SELECT * from posts WHERE id = '.$id;

	//get result
	$result =  mysqli_query($conn, $query);


	//fetch data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);
	//free
	mysqli_free_result($result);

	//close connection
	mysqli_close($conn);

	
	
?>
	<?php include('inc/header.php'); ?> 
		<div class="container">
			<h1>Add Post</h1>
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control" 
                    value="<?php echo $post['title']; ?>">
				</div>
				<div class="form-group">
					<label>Author</label>
					<input type="text" name="author" class="form-control"
                    value="<?php echo $post['author']; ?>" 
				</div>
				<div class="form-group">
					<label>Body</label>
					<textarea type="text" name="body" class="form-control" 
                     ><?php echo $post["body"]; ?></textarea>
				</div>
				<input type="submit" name="submit" value="submit" class="btn btn-default">
			</form>
		
		</div>
	<?php include('inc/footer.php'); ?> 
