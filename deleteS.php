<?php 
	include 'inc/connect.php';
	$shirt_id = $_GET['shirt_id'];

	$qry = "DELETE FROM shirt_tb WHERE shirt_id = $shirt_id";

	$query = mysqli_query($conn,$qry);
	header('Location:systemUser.php?page=suborder');
 ?>