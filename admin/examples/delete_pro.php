<?php

	include('includes/connection.php');
	$query = "delete from product where pro_id = {$_GET['id']}";
	mysqli_query($conn , $query);

	header('location:product.php');

?>