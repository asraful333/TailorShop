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

include 'inc/headerplugin.php'; 

?>
<body>
	<!-- NAVBAR -->
			<nav class="navbar navbar-default navbar-fixed-top hidden-print">
				<div class="brand">
					<a href="#"><img src="assets/img/logo-ori.png" alt="Taior Logo" class="img-responsive logo"></a>
				</div>
				<div class="container-fluid">
					
					<div id="navbar-menu">
						<ul class="nav navbar-nav navbar-right">						
							<li><a href="#"><i class="lnr lnr-exit"></i>Logout</a></li>				
						</ul>
					</div>
				</div>
			</nav>
			<!-- END NAVBAR -->
<div class="container" style="width: 900px;">
	<div class="row" style="margin-top: 100px;">
		<h2><strong>Tailor Shop</strong><img class="pull-right" src="assets/img/logo-ori.png"></h2>
		<h4><strong>Address:</strong> 30 Sonargonj Jonopoth, Uttara, Dhaka.</h4>
		<h4><strong>Email:</strong> tailorshop@gmail.com, <strong>Contact:</strong> 01676728073</h4>
	</div>

	<hr style="border: 1px solid;">

	<div class="row">
		<?php 
			$sql = "SELECT * FROM customer_tb WHERE customer_id='$customerid'";
			$qry = mysqli_query($conn,$sql);
				while ($res= mysqli_fetch_array($qry)) {
						$name= $res['customer_name'];
						$address= $res['customer_address'];
						$phone= $res['customer_phone'];
				
		 ?>
		<div style="float: left;margin-right: 300px;">
			<h3><strong>Bill To</strong></h3>
			<h4><strong>Customer Name: </strong><?php echo $name; ?></h4>
			<h4><strong>Address: </strong><?php echo $address; ?></h4>
			<h4><strong>Contact: </strong>0<?php echo $phone; ?></h4>
		</div>
		<?php } ?>

		<?php 
			$sql = "SELECT * FROM order_tb WHERE order_id='$oid'";
			$qry = mysqli_query($conn,$sql);
				while ($res= mysqli_fetch_array($qry)) {
						$received= $res['receiveDate'];
						$delivery= $res['deliveryDate'];
		 ?>
		<div>
			<h3><strong>Serial <?php echo $serial; ?></strong></h3>
			<h4><strong>Received Date: </strong><?php echo $received; ?></h4>
			<h4><strong>Delivery Date: </strong><?php echo $delivery; ?></h4>
		</div>
		<?php } ?>

	</div>

	<hr style="border: 1px solid;">
	
	<div class="row">
		<div class="t1 table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Service</th>
					<th>Quantity</th>
					<th>Master</th>
					<th>Amount</th>
				</tr>
				<?php $q = "SELECT * FROM shirt_tb s INNER JOIN master_tb m ON s.master_id = m.master_id WHERE order_id = '$oid'";
					$query = mysqli_query($conn,$q);
					while ($res= mysqli_fetch_array($query)) {
				?>
				<tr>
					<td><?php if ($res['master_type'] == 'Shirt') {
					    echo "Shirt";}?>
					</td>
					<td><?php echo $res['quantity']; ?></td>
					<td><?php echo $res['master_name']; ?></td>
					<td><?php echo $res['amount']; ?></td>
				</tr>
				<?php } ?>

				<?php $q = "SELECT * FROM pant_tb s INNER JOIN master_tb m ON s.master_id = m.master_id WHERE order_id = '$oid'";
					$query = mysqli_query($conn,$q);
					while ($res= mysqli_fetch_array($query)) {
				?>
				<tr>
					<td><?php if ($res['master_type'] == 'Pant') {
					    echo "Pant";}?>
					</td>
					<td><?php echo $res['quantity']; ?></td>
					<td><?php echo $res['master_name']; ?></td>
					<td><?php echo $res['amount']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<div class="pull-right">
		<?php 
			$sql = "SELECT * FROM transaction_tb WHERE order_id='$oid'";
			$qry = mysqli_query($conn,$sql);
				while ($res= mysqli_fetch_array($qry)) {
						$subtotal= $res['sub_total'];
						$discount= $res['discount'];
						$totalbill= $res['total'];
						$advance= $res['advance'];
						$payable= $res['payable'];
		 ?>
			<h4><b>Sub Total: </b>	<?php echo $subtotal; ?></h4>
			<h4><b>Discount: </b>	<?php echo $discount; ?></h4>
			<h4><b>Total Bill: </b>	<?php echo $totalbill; ?></h4>
			<h4><b>Advance: </b>	<?php echo $advance; ?></h4>
			<h4><b>Payable: </b>	<?php echo $payable; ?></h4>
		<?php } ?>
			</div>
		</div>
	</div>

	<hr style="border: 1px solid;">

	<p style="text-align: center;">It's computer generated</p>
	<div class="row">
		<div class="col-md-6">
			<p>Print by: </p>
		</div>
		<div class="col-md-6"><p class="pull-right">Print Date: <?php date_default_timezone_set('Asia/Dhaka'); echo date('Y-m-d') ?></p></div>
	</div>

	<div style="text-align: center;">
		<a class="btn btn-success hidden-print" onclick="window.print()" href="">Print</a>
		<a class="btn btn-success hidden-print" href="deleteO.php">Cancel</a>
	</div>
	

	<a type="button" class="btn btn-success pull-right hidden-print" href="inc/finishOrder.php" style="margin: 20px 0 50px 0;">Submit Order</a>
</div>
<?php include 'inc/footerplugin.php'; ?>