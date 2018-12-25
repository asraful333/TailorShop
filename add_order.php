<?php 
	include 'inc/connect.php';
if (isset($_SESSION["order"]) && isset($_SESSION["serial"]) && isset($_SESSION["customerid"]) && $_SESSION["order"]=='yes') {

			if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				header('location:admin.php?page=suborder');
			}
			else
				header('location:systemUser.php?page=suborder');
		}
	if (isset($_POST['submitOdr']) && isset($_POST['customer_id'])) {

		$customer_id = mysqli_real_escape_string($conn,$_POST['customer_id']);
		if ($customer_id!=null) {
			$q = "SELECT * FROM order_tb order by order_id desc limit 1";
				$query = mysqli_query($conn,$q);
				while ($res= mysqli_fetch_array($query)) {
					$serial= $res['serial'];
				}
				if ($serial <=1000) {
					$serial = 1001;
				}
				else{
					$serial += 1;
				}

			$qr = "INSERT INTO order_tb (serial,customer_id) VALUES ('$serial','$customer_id')";
				$qry = mysqli_query($conn,$qr);
				if ($qry) {
					$_SESSION["order"]='yes';
					$_SESSION["serial"]=$serial;
					$_SESSION["customerid"]=$_POST['customer_id'];

					if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
							header('location:admin.php?page=suborder');
						}
					else
						header('location:systemUser.php?page=suborder');
				}else{
					echo "Insert Failed!..";
				}
				unset($_POST['submitOdr']);
		}

	}
 ?>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Add Order</h3>
		</div>
		<div class="panel-body">						
				<div class="container-fluid">

					<div class="row">
						<form action="" method="POST">
						<div class="col-md-6">
							<div class="form-group">
								<label>Select Customer</label>
								<select class="chosen form-control" name="customer_id" >
									<option disabled="" selected="">Select</option>
									<?php 
											
											$q = "SELECT * FROM customer_tb";
											$query = mysqli_query($conn,$q);

											while ($res= mysqli_fetch_array($query)) {
										?>
									<option value="<?php echo $res['customer_id']; ?>"><?php echo $res['customer_name']; ?></option>

										<?php 
											}
										?>
								</select>
							</div>
							<input type="hidden" name="status" value="on process">
							<input type="submit" name="submitOdr" class="btn btn-success">
						</div>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
