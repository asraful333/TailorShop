<?php 
include 'inc/connect.php';
	$sUser_id = $_GET['sUser_id'];

	$qry = "DELETE FROM systemuser_tb WHERE sUser_id = '$sUser_id'";

	$query = mysqli_query($conn,$qry);
	header('Location:admin.php?page=systemUser_list');
 ?>