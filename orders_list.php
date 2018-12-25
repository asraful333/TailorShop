<?php 
include 'inc/connect.php';

	if (isset($_POST['ok'])) {
		$orderid = $_POST['orderid'];
		$update = "UPDATE order_tb o INNER JOIN transaction_tb t ON o.order_id=t.order_id SET o.status=2 WHERE o.status=1 AND t.payable=0 AND o.order_id='$orderid' ";
		$qry = mysqli_query($conn,$update);
		if ($qry) {
			if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				header('location:admin.php?page=orders_list');
			}
			else
				header('location:systemUser.php?page=orders_list');
		}else{
			if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				header('location:admin.php?page=orders_list');
			}
			else
				header('location:systemUser.php?page=orders_list');
		}
	}

	$payable = "SELECT order_id FROM order_tb";
	$q = mysqli_query($conn,$payable);
	while ($pnt= mysqli_fetch_array($q)) {
		$oid[] = $pnt['order_id'];
	}

	foreach ($oid as $key => $value) {

		$qr = "SELECT COUNT(status) total, SUM(status) done FROM pant_tb WHERE order_id ='$value'";
		$q = mysqli_query($conn,$qr);
		while ($pnt= mysqli_fetch_array($q)) {
			$x =  $pnt['total'];
			$y =  $pnt['done'];
			// echo $x,$y.'<br>';
			if ($x==0) {
				$sts0 = 1;
			}
			elseif ($x == $y) {
				$sts0 = 1;
			}
		}	

		$qr = "SELECT COUNT(status) total, SUM(status) done FROM shirt_tb WHERE order_id ='$value'";
		$q = mysqli_query($conn,$qr);
		while ($pnt= mysqli_fetch_array($q)) {
			$x =  $pnt['total'];
			$y =  $pnt['done'];
			// echo $value;
			// echo $value,$x,$y.'<br>';
			if ($x==0) {
				$sts1 = 1;
			}
			elseif ($x == $y) {
				$sts1 = 1;
			}
		}
		if (isset($sts1) && isset($sts0)) {
			if ($sts0==$sts1) {
				$uq = "UPDATE order_tb SET status = 1 WHERE status = 0 AND order_id = '$value'";
				mysqli_query($conn,$uq);
			}
		}
			
	}
 ?>
 <!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<?php 
			if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				echo '<h3>Orders List <span class="pull-right"><a class="btn btn-success" href="admin.php?page=add_order">Add Order</a></span></h3>';
			}
			else
				echo '<h3>Orders List <span class="pull-right"><a class="btn btn-success" href="systemUser.php?page=add_order">Add Order</a></span></h3>';
		 ?>
		
	</div>
	<div class="panel-body">
	<!--	<input class="form-control pull-right" id="myInput" type="text" placeholder="Search.." style="width: 50%;">
		<br><br>-->
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Serial No</th>
					<th>Customer Name</th>
					<th>Payable</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 

					
					$i=1;

					$search = "SELECT * FROM order_tb";
					$query = mysqli_query($conn,$search);

					while ($res= mysqli_fetch_array($query)) {
						$name = $res['customer_id'];
						$order_id = $res['order_id'];
				?>

				<tr>
					<td><?php echo $i++ ; ?></td>
					<td><?php echo $res['serial']; ?></td>
					 
				<?php 
					$sel = "SELECT * FROM customer_tb WHERE customer_id = '$name' "; 
					$qry = mysqli_query($conn,$sel);
					while ($reg= mysqli_fetch_array($qry)) {
				?>
					<td><?php echo $reg['customer_name']; ?></td>

				<?php } ?>

				<?php 

					$payable = "SELECT * FROM transaction_tb WHERE order_id = '$order_id'";
					$q = mysqli_query($conn,$payable);
					while ($r= mysqli_fetch_array($q)) {

				 ?>
					<td>
						<?php 
						if ($r['payable']=='0') {
						echo '<span class="label label-success">','Paid','</span>';
					}else{ 
						echo $r['payable'];
					} ?></td>
				<?php } ?>

					<td>
						<?php if ($res['status'] == '0') {
							echo '<span class="label label-default">On Process</span>';
						}elseif ($res['status'] == '1') {
							echo '<span class="label label-primary">Ready</span>';
						}elseif ($res['status'] == '2') {
							echo '<span class="label label-success">Delivered</span>';
						} ?>
					</td>
					<td>
						<form method="POST" style="float: left;">
							<input type="hidden" name="orderid" id="orderid" value="<?php echo $order_id; ?>">
							<button type="submit" class="btn btn-primary" name="ok" id="ok">ok</button>|
						</form>
						<div class="dropdown">
						    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="float: left;">Action
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu">

						      <?php if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE"): ?>
									<li><a href="admin.php?page=vieworder&order_id=<?php echo $order_id; ?>">View</a></li>
								<?php endif ?>

								<?php if (isset($_SESSION["SYSTEMUSER"]) && $_SESSION["SYSTEMUSER"]=="IS_ACTIVE"): ?>
									<li><a href="systemUser.php?page=vieworder&order_id=<?php echo $order_id; ?>">View</a></li>
							 <?php endif ?>
						      
						      <?php if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE"): ?>
									<li><a href="invoicedetails.php?order_id=<?php echo $order_id; ?>">Print</a></li>
								<?php endif ?>

								<?php if (isset($_SESSION["SYSTEMUSER"]) && $_SESSION["SYSTEMUSER"]=="IS_ACTIVE"): ?>
									<li><a href="invoicedetails.php?order_id=<?php echo $order_id; ?>">Print</a></li>
							 <?php endif ?>
						    </ul>
						</div>
						<?php if(isset($_SESSION["ADMIN"])): ?>
							<button type="button" class="btn btn-danger"><a style="color: white;" href="deleteorder.php?order_id=<?php echo $res['order_id'];?>"><span class="glyphicon glyphicon-remove"></span></a></button>
						<?php endif ?>

					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->