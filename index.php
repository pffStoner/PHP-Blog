<?php
	require('config/config.php');
	require('config/db.php');

	//create query
	$query = 'SELECT * from posts ORDER BY created_at DESC'  ;

	//get result
	$result =  mysqli_query($conn, $query);


	//fetch data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//var_dump($posts);
	//free
	mysqli_free_result($result);

	//close connection
	mysqli_close($conn);

?>
	<?php include('inc/header.php'); ?> 
		<div class="container">
			<h1>Posts</h1>
		<?php foreach($posts as $post): ?>
			<article class="well">
				<h3><?php echo $post['title']; ?></h3>
				<small><?php echo $post['created_at']; ?>
					by <?php echo $post['author']; ?>
				</small>
				<p><?php echo $post['body']; ?></p>
				<a class="btn btn-success" href="<?php echo ROOT_URL; ?>
				post.php?id=<?php echo $post['id']; ?>">Read More</a>

			</article>

		<?php endforeach; ?>
		</div>
	<?php include('inc/footer.php'); ?> 
