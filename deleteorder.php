	<?php 
	include 'inc/connect.php';

	$oid = $_GET['order_id'];

	$qt = "DELETE FROM pant_tb WHERE order_id = '$oid'";
	$qut = mysqli_query($conn,$qt);

	$qry = "DELETE FROM order_tb WHERE order_id = '$oid'";
	$query = mysqli_query($conn,$qry);

	$qs = "DELETE FROM shirt_tb WHERE order_id = '$oid'";
	$qus = mysqli_query($conn,$qs);

	$qt = "DELETE FROM transaction_tb WHERE order_id = '$oid'";
	$qut = mysqli_query($conn,$qt);
	
	header('location:admin.php?page=orders_list');

 ?>