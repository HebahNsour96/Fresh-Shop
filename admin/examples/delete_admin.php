<?php

	include('includes/connection.php');
	$query = "delete from admin where admin_id = {$_GET['id']}";
	mysqli_query($conn , $query);

	header('location:admin.php');

?>