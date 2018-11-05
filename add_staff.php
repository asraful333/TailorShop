<?php
	include 'inc/connect.php';

	if (isset($_POST['submit'])) {

		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$age = mysqli_real_escape_string($conn,$_POST['age']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);
		$gender = mysqli_real_escape_string($conn,$_POST['gender']);
		$type = mysqli_real_escape_string($conn,$_POST['type']);

		$check = "SELECT * FROM staff_tb WHERE staff_name ='$name' OR staff_phone='$phone'";
		$res_c = mysqli_query($conn,$check) or die(mysqli_error($conn));

		if (mysqli_num_rows($res_c)>0) {
			$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style=" margin-bottom: 10px;"><i class="fa fa-warning"></i> Name or number is already exists</div>';
		}
		else{

			$qr = "INSERT INTO `staff_tb`(`staff_name`, `staff_age`, `staff_phone`,`staff_address`,`staff_gender`, `staff_type`) VALUES ('$name','$age','$phone','$address','$gender','$type')";

			$qry = mysqli_query($conn,$qr);
			if ($qry) {
				header('Location: admin.php?page=staff_list');
			}else{
				echo "Insert Failed!..";
			}
		}
	}
?>

<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Add Staff</h3>
					</div>
					<div class="panel-body">
						<div style="max-width: 600px; margin: 0 auto;">

							<form class="form-horizontal" action="" method="POST">

								
								  <div class="form-group required">
								  	<?php if (isset($msg)): ?>
										<span><?php echo $msg;?></span>
									<?php endif ?>
								    <label class="control-label col-sm-3" for="name">Name:</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-3" for="pwd">Age:</label>
								    <div class="col-sm-9"> 
								      <input type="text" class="form-control" name="age" id="age" placeholder="Enter Age">
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-3" for="pwd">Phone:</label>
								    <div class="col-sm-9"> 
								      <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-3" for="pwd">Adderss:</label>
								    <div class="col-sm-9"> 
								      <textarea class="form-control" rows="4" id="address" name="address" placeholder="Enter Address"></textarea>
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-3" for="pwd">Gender:</label>
								    <div class="col-sm-9"> 
								      <label class="radio-inline"><input type="radio" name="gender" value="Male" checked>Male</label>
									  <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
									  <label class="radio-inline"><input type="radio" name="gender" value="Other">Other</label>
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-3" for="pwd">Staff Type:</label>
								    <div class="col-sm-9"> 
										<select class="form-control" name="type" id="sel1">
											
											<option>Syetem User</option>
											<option>Master</option>
										</select>
								    </div>
								  </div>						  
								  <div class="form-group"> 
								    <div class="col-sm-offset-3 col-sm-9">
								      <button type="submit" name="submit" class="btn btn-success">Submit</button>
								    </div>
								  </div>
							</form>

						</div>
					</div>
				</div>
