<?php
	include 'inc/connect.php';

	if (isset($_POST['submit'])) {

		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$age = mysqli_real_escape_string($conn,$_POST['age']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);
		$gender = mysqli_real_escape_string($conn,$_POST['gender']);

		$check = "SELECT * FROM customer_tb WHERE customer_phone ='$phone'";
		$res_c = mysqli_query($conn,$check) or die(mysqli_error($conn));

		if (mysqli_num_rows($res_c)>0) {
			$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Phone number is already exists</div>';
		}
		else{

			$qr = "INSERT INTO `customer_tb`(`customer_name`, `customer_age`, `customer_phone`,`customer_address`,`customer_gender`) VALUES ('$name','$age','$phone','$address','$gender')";

			$qry = mysqli_query($conn,$qr);
			if ($qry) {
				header('Location: user.php?page=customers_list');
			}else{
				echo "Insert Failed!..";
			}
		}
	}
?>

<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Add Customer</h3>
					</div>
					<div class="panel-body">
						<div style="max-width: 600px; margin: 0 auto;">

							<form class="form-horizontal" action="" method="POST">
								
								  <div class="form-group required">
								    <label class="control-label col-sm-2" for="name">Name:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required="" />
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-2" for="pwd">Age:</label>
								    <div class="col-sm-10"> 
								      <input type="text" class="form-control" name="age" id="age" placeholder="Enter Age" required="" />
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-2" for="pwd">Phone:</label>
								    <div class="col-sm-10"> 
								      <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" required="" />
								      									  
									      <?php if (isset($msg)): ?>
											<span><?php echo $msg;?></span>
										  <?php endif ?>
									  
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-2" for="pwd">Address:</label>
								    <div class="col-sm-10"> 
								      <textarea class="form-control" rows="4" name="address" id="address" placeholder="Enter Address" required=""></textarea>
								    </div>
								  </div>
								  <div class="form-group required">
								    <label class="control-label col-sm-2" for="pwd">Gender:</label>
								    <div class="col-sm-10"> 
								      <label class="radio-inline"><input type="radio" name="gender" value="Male" checked>Male</label>
									  <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
									  <label class="radio-inline"><input type="radio" name="gender" value="Other">Other</label>
								    </div>
								  </div>							  
								  <div class="form-group"> 
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" name="submit" class="btn btn-success">Submit</button>
								    </div>
								  </div>
							</form>

						</div>
					</div>
				</div>
