<?php 
	include 'inc/connect.php';
	session_start();
	$pant_id = $_GET['pant_id'];
	$qry = "DELETE FROM pant_tb WHERE pant_id = $pant_id";

	$query = mysqli_query($conn,$qry);
	if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				header('location:admin.php?page=suborder');
		}
	else
		header('location:systemUser.php?page=suborder');

 ?>