<?php

	include('includes/connection.php');
	$query = "delete from incoming where id = {$_GET['id']}";
	mysqli_query($conn , $query);

	header('location:incoming.php');

?>