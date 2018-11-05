<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Customers List</h3>
	</div>
	<div class="panel-body">
		<input class="form-control pull-right" id="myInput" type="text" placeholder="Search.." style="width: 50%;">
		<br><br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Age</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 
					include 'inc/connect.php';

					$q = "SELECT * FROM customer_tb";

					$query = mysqli_query($conn,$q);

					while ($res= mysqli_fetch_array($query)) {
										
				?>
				<tr>
					<td><?php echo $res['customer_id']; ?></td>
					<td><?php echo $res['customer_name']; ?></td>
					<td><?php echo $res['customer_age']; ?></td>
					<td>+880 <?php echo $res['customer_phone']; ?></td>
					<td><?php echo $res['customer_address']; ?></td>
					<td><?php echo $res['customer_gender']; ?></td>
					<td><a class="btn btn-success" href="reg_print.php?customer_id=<?php echo $res['customer_id']; ?>">Edit</a></td>
				</tr>
				<?php 
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->
