<?php 
session_start();
	include 'inc/connect.php';
	$shirt_id = $_GET['shirt_id'];

	$qry = "DELETE FROM shirt_tb WHERE shirt_id = $shirt_id";

	$query = mysqli_query($conn,$qry);
	if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				header('location:admin.php?page=suborder');
			}
			else
				header('location:systemUser.php?page=suborder');
 ?>