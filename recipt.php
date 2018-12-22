<?php 
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
?>
<div class="container-fluid">
	<div class="row" style="margin-top: 100px;">
		<h2><strong>Tailor Shop</strong><img class="pull-right" src="assets/img/logo-ori.png"></h2>
		<h4><strong>Address:</strong> 30 Sonargonj Jonopoth, Uttara, Dhaka.</h4>
		<h4><strong>Email:</strong> tailorshop@gmail.com, <strong>Contact:</strong> 01676728073</h4>
	</div>

	<hr style="border: 1px solid;">

	<div class="row">

				<h3><strong>Bill To</strong><strong class="pull-right">Serial 1000</strong></h3>
				<h4><strong>Customer Name: </strong><strong class="pull-right">Received Date: </strong></h4>
				<h4><strong>Address: </strong><strong class="pull-right">Delivery Date: </strong></h4>
				<h4><strong>Contact: </strong><strong class="pull-right">Number of Service: </strong></h4>
				<h4><strong class="pull-right">Quantity: </strong></h4>

	</div>

	<hr style="border: 1px solid;">
	
	<div class="row">
		<div class="t1 table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>#</th>
					<th>Service</th>
					<th>Quantity</th>
					<th>Master</th>
					<th>Amount</th>
				</tr>
				<th>
					<td>1</td>
					<td>Shirt</td>
					<td>2</td>
					<td>1000</td>
				</th>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<div class="pull-right">
			<h4><b>Sub Total: </b></h4>
			<h4><b>Discount: </b></h4>
			<h4><strong>Total Bill: </strong></h4>
			<h4><b>Advance: </b></h4>
			<h4><b>Payable: </b></h4>
			</div>
		</div>
	</div>

	<hr style="border: 1px solid;">

	<p style="text-align: center;">It's computer generated</p>
	<div class="row">
		<div class="col-md-6">
			<p>Print by: Nayem</p>
		</div>
		<div class="col-md-6"><p class="pull-right">Print Date: </p></div>
	</div>

	<div style="text-align: center;">
		<a class="btn btn-success hidden-print" onclick="window.print()" href="">Print</a>
	</div>
	

	<a type="button" class="btn btn-success pull-right hidden-print" href="inc/finishOrder.php" style="margin: 20px 0 50px 0;">Submit Order</a>
</div>