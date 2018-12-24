<?php 
include 'inc/connect.php';
	$customer_id = $_GET['customer_id'];

	$qry = "DELETE FROM customer_tb WHERE customer_id = '$customer_id'";

	$query = mysqli_query($conn,$qry);
	header('Location:admin.php?page=customers_list');
 ?>