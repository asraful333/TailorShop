<?php 
	include 'inc/connect.php';

	if (isset($_POST['ok'])) {

		$sid = $_POST['sid'];
		$update = "UPDATE shirt_tb SET status=1 WHERE status=0 AND shirt_id='$sid' ";
		$qry = mysqli_query($conn,$update);
		header('Location:master.php?page=orderassign_list');

	}
	if (isset($_POST['okp'])) {

		$pid = $_POST['pid'];
		$update = "UPDATE pant_tb SET status=1 WHERE status=0 pant_id='$pid' ";
		$qry = mysqli_query($conn,$update);
		header('Location:master.php?page=orderassign_list');

	}

 ?>
<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Assign Work<span class="pull-right"><a class="btn btn-success" href="master.php">Back</a></span></h3>
	</div>
	<div class="panel-body">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Serial</th>
					<th>Service</th>
					<th>Quantity</th>
					<th>Status</th>
					<th>Delivery Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 
					$i=1;
					$q = "SELECT * FROM shirt_tb WHERE master_id = '".$_SESSION["userid"]."'";
					$query = mysqli_query($conn,$q);
					while ($res= mysqli_fetch_array($query)) {
						$order_id=$res['order_id'];
						$quantity=$res['quantity'];
						$status=$res['status'];
						$shirt_id=$res['shirt_id'];
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<?php 
						$sql = "SELECT * FROM order_tb WHERE order_id='$order_id'";
						$qry = mysqli_query($conn,$sql);
							while ($res= mysqli_fetch_array($qry)) {
								$deliveryDate = $res['deliveryDate'];
					 ?>
					<td><?php echo $res['serial']; ?></td>
					<?php } ?>
					<td><?php if ($_SESSION["usertype"] == 'Shirt') { echo "Shirt"; }?></td>
					<td><?php echo $quantity; ?></td>
					<td>
						<?php if ($status == 0) {
							echo '<span class="label label-default">On Process</span>';
						}elseif ($status == 1) {
							echo '<span class="label label-primary">Done</span>';
						} ?>	
					</td>
					<td><?php echo $deliveryDate; ?></td>
					<td>
						<form method="POST" style="float: left;">
							<input type="hidden" name="sid" value="<?php echo $shirt_id;?>">
							<button type="submit" class="btn btn-primary" name="ok" id="ok">ok</button>|
						</form>
						<button class="btn btn-primary" type="submit"><a style="color: white;" href="master.php?page=viewmeasurementS&shirt_id=<?php echo $shirt_id; ?>">View Measurement</a></button>
					</td>
				</tr>
				<?php } ?>

				<?php 
					$q = "SELECT * FROM pant_tb WHERE master_id = '".$_SESSION["userid"]."'";
					$query = mysqli_query($conn,$q);
					while ($res= mysqli_fetch_array($query)) {
						$order_id=$res['order_id'];
						$quantity=$res['quantity'];
						$status=$res['status'];
						$pant_id=$res['pant_id'];
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<?php 
						$sql = "SELECT * FROM order_tb WHERE order_id='$order_id'";
						$qry = mysqli_query($conn,$sql);
							while ($res= mysqli_fetch_array($qry)) {
								$deliveryDate = $res['deliveryDate'];
					 ?>
					<td><?php echo $res['serial']; ?></td>
					<?php } ?>
					<td><?php if ($_SESSION["usertype"] == 'Pant') { echo "Pant"; }?></td>
					<td><?php echo $quantity; ?></td>
					<td>
						<?php if ($status == 0) {
							echo '<span class="label label-default">On Process</span>';
						}elseif ($status == 1) {
							echo '<span class="label label-primary">Done</span>';
						} ?>	
					</td>
					<td><?php echo $deliveryDate; ?></td>
					<td>
						<form method="POST" style="float: left;">
							<input type="hidden" name="pid" value="<?php echo $pant_id;?>">
							<button type="submit" class="btn btn-primary" name="okp" id="okp">ok</button>|
						</form>
						<button type="submit" class="btn btn-primary" name="okp" id="okp"><a style="color: white;" href="master.php?page=viewmeasurementP&pant_id=<?php echo $pant_id; ?>">View Measurement</a></button>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->
