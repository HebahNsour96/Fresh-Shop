<?php

	session_start();
	unset($_SESSION['customer_id']);
	header('location:signin.php');

?>