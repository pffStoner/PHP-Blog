<?php
	//connection
	$conn = mysqli_connect(DB_HOST, DB_USER, '', DB_NAME);

	//check connection
	if (mysqli_connect_errno()) {
		//connection failed
		echo "connection failed!".mysqli_connect_errno();
	}
