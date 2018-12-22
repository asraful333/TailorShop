<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Transaction</h3>
	</div>
	<div class="panel-body">
		<table id="example" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Serial No</th>
					<th>Customer Name</th>
					<th>Payable</th>
					<th>Payment Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
			
				<?php

					include 'inc/connect.php';
					$i=1;

					$search = "SELECT * FROM transaction_tb";
					$query = mysqli_query($conn,$search);
					while ($res= mysqli_fetch_array($query)) {
						$order_id = $res['order_id'];
				?>

				<tr>
					<td><?php echo $i++; ?></td>
					<?php 
						$sql = "SELECT * FROM order_tb WHERE order_id='$order_id'";
						$qu = mysqli_query($conn,$sql);
						while ($re= mysqli_fetch_array($qu)) {
							$customer_id = $re['customer_id'];
						 ?>
					<td><?php echo $re['serial']; ?></td>
					<?php } ?>

					<?php 
						$sql = "SELECT * FROM customer_tb WHERE customer_id='$customer_id'";
						$qry = mysqli_query($conn,$sql);
						while ($r= mysqli_fetch_array($qry)) {
						 ?>
					<td><?php echo $r['customer_name']; ?></td>
					<?php } ?>

					<td><?php echo $res['payable']; ?></td>
					<td><?php if ($res['payable'] == '0') {
						echo '<span class="label label-success">','Paid','</span>';
					}else{
						echo '<span class="label label-danger">','Non Paid','</span>';
					} ?></td>
					<td>
						<div class="dropdown">
						    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu">
						      <li><a href="#">Update/Edit</a></li>
						      <li><a href="#">Details</a></li>
						      <li><a href="#">Print</a></li>
						    </ul>
						</div>
					</td>
				</tr>

<?php } ?>

			</tbody>
						
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->
