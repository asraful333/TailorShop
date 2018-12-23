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
else
	header('location:index.php');



// Insert transaction and update order
if (isset($_POST['sOrders'])) {
		$sub_total 		= mysqli_real_escape_string($conn,$_POST['total_amount']);
		$discount 		= mysqli_real_escape_string($conn,$_POST['discount']);
		$total 			= mysqli_real_escape_string($conn,$_POST['total']);
		$advance 		= mysqli_real_escape_string($conn,$_POST['advance']);
		$payable 		= mysqli_real_escape_string($conn,$_POST['payable']);
		$deliveryDate 	= mysqli_real_escape_string($conn,$_POST['deliveryDate']);

		$_SESSION["subtotal"]=$sub_total;
		$_SESSION["discount"]=$discount;
		$_SESSION["total"]=$total;
		$_SESSION["advance"]=$advance;
		$_SESSION["payable"]=$payable;
		$_SESSION["deliveryDate"]=$deliveryDate;

		$sub = $_SESSION["subtotal"];
		$dis = $_SESSION["discount"];
		$tot = $_SESSION["total"];
		$adv = $_SESSION["advance"];
		$paya =$_SESSION["payable"];
		$del = $_SESSION["deliveryDate"];

	}
	if (isset($_POST["saveor"])) {
		$update = "UPDATE order_tb SET deliveryDate = '".$_SESSION["deliveryDate"]."' WHERE order_id = '$oid'";
		$resU = mysqli_query($conn,$update);

		$sql = "INSERT INTO `transaction_tb`(`order_id`, `sub_total`, `discount`, `total`, `advance`, `payable`) VALUES ('$oid', '".$_SESSION["subtotal"]."', '".$_SESSION["discount"]."', '".$_SESSION["total"]."', '".$_SESSION["advance"]."', '".$_SESSION["payable"]."')";
		$qry = mysqli_query($conn,$sql);
		if ($qry) {
			header('Location:inc/finishOrder.php');
		}else{
			echo "failed insert";
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
							<li><a href="logout.php"><i class="lnr lnr-exit"></i>Logout</a></li>				
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
			<h4><strong>Contact: </strong><?php echo $phone; ?></h4>
		</div>
		<?php } ?>

		<div>
			<h3><strong>Serial <?php echo $serial; ?></strong></h3>
			<h4><strong>Received Date: </strong><?php
			date_default_timezone_set('Asia/Dhaka');
			echo date('Y-M-d');
			  ?></h4>
			<h4><strong>Delivery Date: </strong><?php echo $_SESSION["deliveryDate"]; ?></h4>
		</div>
		

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
			<h4><b>Sub Total: </b>	<?php echo $_SESSION["subtotal"]; ?></h4>
			<h4><b>Discount: </b>	<?php echo $_SESSION["discount"]; ?></h4>
			<h4><b>Total Bill: </b>	<?php echo $_SESSION["total"]; ?></h4>
			<h4><b>Advance: </b>	<?php echo $_SESSION["advance"]; ?></h4>
			<h4><b>Payable: </b>	<?php echo $_SESSION["payable"]; ?></h4>
		
			</div>
		</div>
	</div>

	<hr style="border: 1px solid;">

	<p style="text-align: center;">It's computer generated</p>
	<div class="row">
		<div class="col-md-6">
			<?php 

				$q = "SELECT * FROM systemuser_tb WHERE sUser_id='".$_SESSION["userid"]."'"; 
				$query = mysqli_query($conn,$q);
					while ($res= mysqli_fetch_array($query)) {
						$name= $res['sUser_name'];
				?>
				<p>Print by: <?php echo $name; ?></p>
				<?php
					} 
				?> 
			
		</div>
		<div class="col-md-6"><p class="pull-right">Print Date: <?php date_default_timezone_set('Asia/Dhaka'); echo date('Y-m-d') ?></p></div>
	</div>

	<div style="text-align: center;">
		<a class="btn btn-success hidden-print" onclick="window.print()" href="">Print</a>
		<a class="btn btn-success hidden-print" href="systemUser.php?page=suborder">Cancel</a>
	</div>
	<form method="POST">
		<button type="Submit" class="btn btn-success pull-right hidden-print" name="saveor"> Submit </button><br><br>
	</form>
	
	<!-- <a type="button" class="btn btn-success pull-right hidden-print" href="inc/finishOrder.php" style="margin: 20px 0 50px 0;">Submit Order</a> -->
</div>
<?php include 'inc/footerplugin.php'; ?>