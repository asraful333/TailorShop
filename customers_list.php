<!--FOR STAFF UPDATE-->
<?php

	include 'inc/connect.php';
	if (isset($_POST['submit'])) {
		$customer_id 	= mysqli_real_escape_string($conn,$_POST['customer_id']);
		$name 			= mysqli_real_escape_string($conn,$_POST['uName']);
		$age 			= mysqli_real_escape_string($conn,$_POST['uAge']);
		$phone 			= mysqli_real_escape_string($conn,$_POST['uPhone']);
		$address 		= mysqli_real_escape_string($conn,$_POST['uAddress']);
		$gender 		= mysqli_real_escape_string($conn,$_POST['uGender']);

		$check = "SELECT * FROM customer_tb WHERE customer_phone ='$phone' AND customer_id!='$customer_id'";
		$res_c = mysqli_query($conn,$check) or die(mysqli_error($conn));

		if (mysqli_num_rows($res_c)>0) {
			header('Location: user.php?page=customers_list');
			$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Phone number is already exists</div>';
			
		}
		else{
			$sql= "UPDATE customer_tb SET customer_name='$name', customer_age='$age', customer_phone='$phone', customer_address='$address', customer_gender='$gender' WHERE customer_id='$customer_id'";

			$qry= mysqli_query($conn,$sql);
			
			header('Location: user.php?page=customers_list');
		}
		
	}

	if (isset($_POST['insert'])) {
	$customer_name 			= mysqli_real_escape_string($conn,$_POST['name']);
	$customer_age 			= mysqli_real_escape_string($conn,$_POST['age']);
	$customer_phone 		= mysqli_real_escape_string($conn,$_POST['phone']);
	$customer_address 		= mysqli_real_escape_string($conn,$_POST['address']);
	$customer_gender 		= mysqli_real_escape_string($conn,$_POST['gender']);

	$qry = "INSERT INTO `customer_tb`(`customer_name`, `customer_age`, `customer_phone`,`customer_address`,`customer_gender`) VALUES ('$customer_name','$customer_age','$customer_phone','$customer_address','$customer_gender')";
	$rslt = mysqli_query($conn,$qry);
	header('Location: user.php?page=customers_list');
	}

?>
<!--END STAFF UPDATE-->

<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Customers List <span class="pull-right"><a class="btn btn-success" data-toggle="modal" data-target="#add_data_Modal">Add Customer</a></span></h3>
	</div>
	<div class="panel-body">
		<!--<input class="form-control pull-right" id="myInput" type="text" placeholder="Search.." style="width: 50%;">
		<br><br>-->
		<?php if (isset($msg)): ?>
			<?php echo $msg;?>
		<?php endif ?>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
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

					$q = "SELECT * FROM customer_tb order by customer_id desc";

					$query = mysqli_query($conn,$q);

					while ($res= mysqli_fetch_array($query)) {
										
				?>
				<tr>
					<td><?php echo $res['customer_id']; ?></td>
					<td><?php echo $res['customer_name']; ?></td>
					<td><?php echo $res['customer_age']; ?></td>
					<td>+88<?php echo $res['customer_phone']; ?></td>
					<td><?php echo $res['customer_address']; ?></td>
					<td><?php echo $res['customer_gender']; ?></td>
					<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $res['customer_id']; ?>">Edit</button></td>
				</tr>

				<!-- MODAL FOR UPDATE DATA-->
				<div class="modal fade" id="<?php echo $res['customer_id']; ?>" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Edit Customer Information</h4>
				        </div>
				        <div class="modal-body">
				          
				          <form method="POST" action="" >
									
							<input type="hidden" name="customer_id" class="form-control" value="<?php echo $res['customer_id']; ?>" />
				          	<label>Name</label>
				          	<input type="text" name="uName" class="form-control" value="<?php echo $res['customer_name']; ?>" /><br/>
				          	<label>Age</label>
				          	<input type="text" name="uAge" class="form-control" value="<?php echo $res['customer_age']; ?>" /><br/>
				          	<label>Phone</label>
				          	<input type="number" name="uPhone" class="form-control" value="<?php echo $res['customer_phone']; ?>" /><br/>
				          	<label>Address</label>
				          	<textarea class="form-control" rows="2" name="uAddress" value="" /><?php echo $res['customer_address']; ?></textarea>
				          	<br/>
				          	<label>Gender</label><br/>
				          	<label class="radio-inline"><input type="radio" name="uGender" value="Male" <?php if( $res['customer_gender']=='Male'){echo "checked";}; ?>>Male</label>
							<label class="radio-inline"><input type="radio" name="uGender" value="Female" <?php if( $res['customer_gender']=='Female'){echo "checked";}; ?>>Female</label>
							<label class="radio-inline"><input type="radio" name="uGender" value="Other" <?php if( $res['customer_gender']=='Other'){echo "checked";}; ?>>Other</label>
							<br/><br/>
							
							<input type="submit" name="submit" value="Update" class="btn btn-success" />
				          </form>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>				      
				    </div>
				</div><!--END MODAL-->

				<?php 
					}
				?>	
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->

					<div id="add_data_Modal" class="modal fade" role="dialog" >
					 <div class="modal-dialog" role="document">
					  <div class="modal-content">
					  	
					   <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal">&times;</button>
					    <h4 class="modal-title">Enter Customer Information</h4>
					   </div>
					   <div class="modal-body">
						<form method="POST" action="" id="insert_form">
					    
					    	<div class="form-group">
					     <label>Enter Customer Name</label>
					     <input type="text" name="name" id="name" class="form-control" />
					     <label id="lblname" style="color: red;"></label>
					     	</div>
					     	<div class="form-group">
					     <label>Enter Age</label>
					     <input type="text" name="age" id="age" class="form-control" />
					     <label id="lblage" style="color: red;"></label>
					     	</div>
					     	<div class="form-group">
					     <label>Enter Phone Number</label>
					     <input type="number" name="phone" id="phone" class="form-control" />
					     <label id="lblphone" style="color: red;"></label>
					     	</div>
					     	<div class="form-group">
					     <label>Enter Employee Address</label>
					     <textarea name="address" id="address" class="form-control"></textarea>
					     <label id="lbladdress" style="color: red;"></label>
					     	</div>
					     	<div class="form-group">
					     <label>Select Gender</label>
					     <select name="gender" id="gender" class="form-control">
					      <option value="Male">Male</option>  
					      <option value="Female">Female</option>
					      <option value="Other">Other</option>
					     </select>
					     	</div>	
					     	<input type="submit" name="insert" value="Insert" class="btn btn-success" />		    
					   </div>
					   </form>
					   <div class="modal-footer">
					    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					    
					   </div>
					   

					  </div>
					 </div>
					</div>
