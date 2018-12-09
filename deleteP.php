<?php 
	include 'inc/connect.php';
	$pant_id = $_GET['pant_id'];

	$qry = "DELETE FROM pant_tb WHERE pant_id = $pant_id";

	$query = mysqli_query($conn,$qry);
	header('Location:systemUser.php?page=suborder');
 ?>