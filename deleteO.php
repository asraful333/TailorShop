<?php 

include 'inc/connect.php';

session_start();
include 'inc/connect.php';
if (isset($_SESSION["order"]) && isset($_SESSION["serial"]) && isset($_SESSION["customerid"]) && $_SESSION["order"]=='yes') {
	$open = $_SESSION["order"];
	$serial =  $_SESSION["serial"];
	$customerid = $_SESSION["customerid"];
	$q = "SELECT * FROM order_tb WHERE serial='$serial'";
			$query = mysqli_query($conn,$q);
			while ($res= mysqli_fetch_array($query)) {
				$oid= $res['order_id'];
			}
}
	$qt = "DELETE FROM pant_tb WHERE order_id = '$oid'";
	$qut = mysqli_query($conn,$qt);

	$qry = "DELETE FROM order_tb WHERE order_id = '$oid'";
	$query = mysqli_query($conn,$qry);

	$qs = "DELETE FROM shirt_tb WHERE order_id = '$oid'";
	$qus = mysqli_query($conn,$qs);

	$qt = "DELETE FROM transaction_tb WHERE order_id = '$oid'";
	$qut = mysqli_query($conn,$qt);
	
	header('location:inc/finishOrder.php');


 ?>