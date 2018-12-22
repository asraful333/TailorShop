<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Orders List <span class="pull-right"><a class="btn btn-success" href="systemUser.php?page=add_order">Add Order</a></span></h3>
	</div>
	<div class="panel-body">
	<!--	<input class="form-control pull-right" id="myInput" type="text" placeholder="Search.." style="width: 50%;">
		<br><br>-->
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th> # </th>
					<th>Serial No</th>
					<th>Customer Name</th>
					<th>Payable</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 

					include 'inc/connect.php';
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

					<td><span class="label label-success">
						<?php if ($res['status'] == 'on process') {
							echo "On Process";
						}elseif ($res['status'] == 'ready') {
							echo "Ready";
						}elseif ($res['status'] == 'delivered') {
							echo "Delivered";
						} ?></span></td>
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
