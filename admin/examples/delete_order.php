<?php

	include('includes/connection.php');
	$query = "delete from wallOrder where w_id = {$_GET['id']}";
	mysqli_query($conn , $query);

	header('location:order.php');

?>