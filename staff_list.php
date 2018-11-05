<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Staff List</h3>
	</div>
	<div class="panel-body">
		<input class="form-control pull-right" id="myInput" type="text" placeholder="Search.." style="width: 50%;">
		<br><br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Age</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Staff Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 
					include 'inc/connect.php';

					$q = "SELECT * FROM staff_tb";

					$query = mysqli_query($conn,$q);

					while ($res= mysqli_fetch_array($query)) {
										
				?>
				<tr>
					<td><?php echo $res['staff_id']; ?></td>
					<td><?php echo $res['staff_name']; ?></td>
					<td><?php echo $res['staff_age']; ?></td>
					<td>+880 <?php echo $res['staff_phone']; ?></td>
					<td><?php echo $res['staff_address']; ?></td>
					<td><?php echo $res['staff_gender']; ?></td>
					<td><?php echo $res['staff_type']; ?></td>
					<td><a class="btn btn-success" href="reg_print.php?staff_id=<?php echo $res['staff_id']; ?>">Edit</a></td>
				</tr>
				<?php 
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->
