<?php

	include('includes/connection.php');
	$query = "delete from notification where no_id = {$_GET['id']}";
	mysqli_query($conn , $query);

	header('location:talk.php');

?>