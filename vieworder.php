<?php 
	include 'inc/connect.php';
	$order_id = $_GET['order_id'];

	$sql = "SELECT * FROM order_tb WHERE order_id='$order_id'";
	$qry = mysqli_query($conn,$sql);
	while ($res=mysqli_fetch_array($qry)) {
		$customer_id=$res['customer_id'];
		$serial=$res['serial'];
	}

 ?>
<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<?php 
			$sql = "SELECT * FROM customer_tb WHERE customer_id='$customer_id'";
			$qry = mysqli_query($conn,$sql);
			while ($res=mysqli_fetch_array($qry)) {
				$customer_name=$res['customer_name'];
			?>
		<h3>
			<?php echo $customer_name."<br> Serial No: ".$serial; ?>
			<?php 
				if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
					echo '<span class="pull-right"><a class="btn btn-success" href="admin.php?page=orders_list">Back</a></span>';
				}
				else
					echo '<span class="pull-right"><a class="btn btn-success" href="systemUser.php?page=orders_list">Back</a></span>';
			 ?>
		</h3>
		<?php } ?>
	</div>
	<div class="panel-body">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Service</th>
					<th>Quantity</th>
					<th>Master</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php $q = "SELECT * FROM shirt_tb s INNER JOIN master_tb m ON s.master_id = m.master_id WHERE order_id = '$order_id'";
					            		$query = mysqli_query($conn,$q);
					            		$i = 1;
										while ($res= mysqli_fetch_array($query)) {
											$shirt_id = $res['shirt_id'];
					            	 ?>
					            	<tr>
					            		<td><?php echo $i++; ?></td>
					            		<td><?php if ($res['master_type'] == 'Shirt') {
					            			echo "Shirt";
					            		}?></td>
					            		<td><?php echo $res['quantity']; ?></td>
					            		<td><?php echo $res['master_name']; ?></td>
					            		<td><?php echo $res['amount']; ?></td>
					            		<td>
											<div class="dropdown">
											    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="float: left;">Action
											    <span class="caret"></span></button>
											    <ul class="dropdown-menu">
											    <?php if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE"): ?>
													<li><a href="admin.php?page=viewmeasurementS&shirt_id=<?php echo $shirt_id; ?>">View</a></li>
												<?php endif ?>

												<?php if (isset($_SESSION["SYSTEMUSER"]) && $_SESSION["SYSTEMUSER"]=="IS_ACTIVE"): ?>
													<li><a href="systemUser.php?page=viewmeasurementS&shirt_id=<?php echo $shirt_id; ?>">View</a></li>
												<?php endif ?>


											    <?php if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE"): ?>
													<li><a href="admin.php?page=editmeasurementS&shirt_id=<?php echo $shirt_id; ?>">Edit</a></li>
												<?php endif ?>

												<?php if (isset($_SESSION["SYSTEMUSER"]) && $_SESSION["SYSTEMUSER"]=="IS_ACTIVE"): ?>
													<li><a href="systemUser.php?page=editmeasurementS&shirt_id=<?php echo $shirt_id; ?>">Edit</a></li>
												<?php endif ?>
											    </ul>
											</div>
										</td>
					            	</tr>
					            		<?php } ?>

					            	<?php $q = "SELECT * FROM pant_tb s INNER JOIN master_tb m ON s.master_id = m.master_id WHERE order_id = '$order_id'";
					            		$query = mysqli_query($conn,$q);
					            		// $i = 1;
										while ($res= mysqli_fetch_array($query)) {
											$pant_id = $res['pant_id'];
					            	 ?>
					            	<tr>
					            		<td><?php echo $i++; ?></td>
					            		<td><?php if ($res['master_type'] == 'Pant') {
					            			echo "Pant";
					            		}?></td>
					            		<td><?php echo $res['quantity']; ?></td>
					            		<td><?php echo $res['master_name']; ?></td>
					            		<td><?php echo $res['amount']; ?></td>
					            		<td>
											<div class="dropdown">
											    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="float: left;">Action
											    <span class="caret"></span></button>
											    <ul class="dropdown-menu">
											    <?php if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE"): ?>
													<li><a href="admin.php?page=viewmeasurementP&pant_id=<?php echo $pant_id; ?>">View</a></li>
												<?php endif ?>

												<?php if (isset($_SESSION["SYSTEMUSER"]) && $_SESSION["SYSTEMUSER"]=="IS_ACTIVE"): ?>
													<li><a href="systemUser.php?page=viewmeasurementP&pant_id=<?php echo $pant_id; ?>">View</a></li>
												<?php endif ?>


											     <?php if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE"): ?>
													<li><a href="admin.php?page=editmeasurementP&pant_id=<?php echo $pant_id; ?>">Edit</a></li>
												<?php endif ?>

												<?php if (isset($_SESSION["SYSTEMUSER"]) && $_SESSION["SYSTEMUSER"]=="IS_ACTIVE"): ?>
													<li><a href="systemUser.php?page=editmeasurementP&pant_id=<?php echo $pant_id; ?>">Edit</a></li>
												<?php endif ?>

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