<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Orders<span class="pull-right"><a class="btn btn-success" href="customer.php?page=orderlist_C">Back</a></span></h3>
	</div>
	<div class="panel-body">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Serial No</th>
					<th>Payable</th>
					<th>Status</th>
					<th>Delivery Date</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 
					include 'inc/connect.php';
					$q = "SELECT * FROM order_tb o INNER JOIN transaction_tb t ON o.order_id = t.order_id WHERE customer_id = '".$_SESSION["userid"]."'";
					$query = mysqli_query($conn,$q);
					$i = 1;
					while ($res= mysqli_fetch_array($query)) { ?>
					   <tr>
					    <td><?php echo $i++; ?></td>
					    <td><?php echo $res['serial']; ?></td>
						<td>
						<?php 
							if ($res['payable']=='0') {
								echo '<span class="label label-success">','Paid','</span>';
							}else{ 
								echo $res['payable'];
							} ?>	
						</td>
					    <td>
						<?php if ($res['status'] == '0') {
							echo '<span class="label label-default">On Process</span>';
						}elseif ($res['status'] == '1') {
							echo '<span class="label label-primary">Ready</span>';
						}elseif ($res['status'] == '2') {
							echo '<span class="label label-success">Delivered</span>';
						} ?>	
					</td>
					<td><?php echo $res['deliveryDate']; ?></td>
					   </tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->