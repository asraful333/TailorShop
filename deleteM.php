<?php 
include 'inc/connect.php';
	$master_id = $_GET['master_id'];

	$qry = "DELETE FROM master_tb WHERE master_id = '$master_id'";

	$query = mysqli_query($conn,$qry);
	header('Location:admin.php?page=master_list');
 ?>