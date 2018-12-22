<!--FOR STAFF UPDATE-->
<?php

	include 'inc/connect.php';
	if (isset($_POST['submit'])) {
		$id 		= mysqli_real_escape_string($conn,$_POST['id']);
		$name 		= mysqli_real_escape_string($conn,$_POST['uName']);
		$age 		= mysqli_real_escape_string($conn,$_POST['uAge']);
		$phone 		= mysqli_real_escape_string($conn,$_POST['uPhone']);
		$address 	= mysqli_real_escape_string($conn,$_POST['uAddress']);
		$gender 	= mysqli_real_escape_string($conn,$_POST['uGender']);
		$type 		= mysqli_real_escape_string($conn,$_POST['uType']);


			$sql= "UPDATE master_tb SET master_name='$name', master_age='$age', master_phone='$phone', master_address='$address', master_gender='$gender', master_type='$type' WHERE master_id='$id'";

			$qry= mysqli_query($conn,$sql);
			header('Location: admin.php?page=master_list');
		
	}

	if (isset($_POST['insert'])) {
	$master_name 			= mysqli_real_escape_string($conn,$_POST['name']);
	$master_age 			= mysqli_real_escape_string($conn,$_POST['age']);
	$master_phone 			= mysqli_real_escape_string($conn,$_POST['phone']);
	$master_address 		= mysqli_real_escape_string($conn,$_POST['address']);
	$master_gender 			= mysqli_real_escape_string($conn,$_POST['gender']);
	$master_type 			= mysqli_real_escape_string($conn,$_POST['type']);
	$password				= md5($master_phone);

	$qry = "INSERT INTO `master_tb`(`master_name`, `master_age`, `master_phone`,`master_address`,`master_gender`,`master_type`,`password`) VALUES ('$master_name','$master_age','$master_phone','$master_address','$master_gender','$master_type','$password')";
	$rslt = mysqli_query($conn,$qry);
	header('Location: admin.php?page=master_list');
	}

?>
<!--END STAFF UPDATE-->
<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Master List <span class="pull-right"><a class="btn btn-success" data-toggle="modal" data-target="#add_data_Modal">Add Master</a></span></h3>
	</div>
	<div class="panel-body">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Age</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 

					$q = "SELECT * FROM master_tb ";

					$query = mysqli_query($conn,$q);

					while ($res= mysqli_fetch_array($query)) {
										
				?>
				<tr>
					<td><?php echo $res['master_id']; ?></td>
					<td><?php echo $res['master_name']; ?></td>
					<td><?php echo $res['master_age']; ?></td>
					<td>+88<?php echo $res['master_phone']; ?></td>
					<td><?php echo $res['master_address']; ?></td>
					<td><?php echo $res['master_gender']; ?></td>
					<td><?php echo $res['master_type']; ?></td>
					<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $res['master_id']; ?>">Edit</button></td>
				</tr>

				<!-- MODAL FOR UPDATE DATA-->
				<div class="modal fade" id="<?php echo $res['master_id']; ?>" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Edit Master Information</h4>
				        </div>
				        <div class="modal-body">
				          
				          <form method="POST" >
							<input type="hidden" name="id" class="form-control" value="<?php echo $res['master_id']; ?>" />
				          	<label>Name</label>
				          	<input type="text" name="uName" class="form-control" value="<?php echo $res['master_name']; ?>" /><br/>
				          	<label>Age</label>
				          	<input type="text" name="uAge" class="form-control" value="<?php echo $res['master_age']; ?>" /><br/>
				          	<label>Phone</label>
				          	<input type="text" name="uPhone" class="form-control" value="<?php echo $res['master_phone']; ?>" /><br/>
				          	<label>Address</label>
				          	<textarea class="form-control" rows="2" name="uAddress" value="" /><?php echo $res['master_address']; ?></textarea>
				          	<br/>
				          	<label>Gender</label><br/>
				          	<label class="radio-inline"><input type="radio" name="uGender" value="Male" <?php if( $res['master_gender']=='Male'){echo "checked";}; ?>>Male</label>
							<label class="radio-inline"><input type="radio" name="uGender" value="Female" <?php if( $res['master_gender']=='Female'){echo "checked";}; ?>>Female</label>
							<label class="radio-inline"><input type="radio" name="uGender" value="Other" <?php if( $res['master_gender']=='Other'){echo "checked";}; ?>>Other</label>
							<br/><br/>
							<label>Master Type</label>
										<select class="form-control" name="uType" id="sel1">
											<option value="Shirt" <?php if( $res['master_type']=='Shirt'){echo "selected";};?> >Shirt</option>
											<option value="Pant" <?php if( $res['master_type']=='Pant'){echo "selected";};?> >Pant</option>
										</select><br/>
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

<!--modal use for add customer-->

					<div id="add_data_Modal" class="modal fade" role="dialog" >
					 <div class="modal-dialog" role="document">
					  <div class="modal-content">
					  	
					   <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal">&times;</button>
					    <h4 class="modal-title">Enter Master Information</h4>
					   </div>
					   <div class="modal-body">
						<form method="POST" action="" id="insert_form">
					    
					    	<div class="form-group">
							     <label>Master Name</label>
							     <input type="text" name="name" id="name" class="form-control" required="" />
							     <label id="lblname" style="color: red;"></label>
					     	</div>
					     	<div class="form-group">
							     <label>Age</label>
							     <input type="text" name="age" id="age" class="form-control" required="" />
							     <label id="lblage" style="color: red;"></label>
					     	</div>
					     	<div class="form-group">
							     <label>Phone Number</label>
							     <input type="number" name="phone" id="phone" class="form-control" required="" />
							     <label id="lblphone" style="color: red;"></label>
					     	</div>
					     	<div class="form-group">
							     <label>Address</label>
							     <textarea name="address" id="address" class="form-control" required=""></textarea>
							     <label id="lbladdress" style="color: red;"></label>
					     	</div>
					     	<div class="form-group">
							     <label>Select Gender</label><br/>
							     <label class="radio-inline"><input type="radio" name="gender" value="Male" checked>Male</label>
								 <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
								 <label class="radio-inline"><input type="radio" name="gender" value="Other">Other</label>
					     	</div>
					     	<div class="form-group">
							     <label>Master Type</label>
							     <select class="form-control" name="type" id="sel1">
									<option value="Shirt" >Shirt</option>
									<option value="Pant"  >Pant</option>
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
					<!--end modal use for add customer-->