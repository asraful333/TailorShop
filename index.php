<?php 
	session_start();
	if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
		echo '<script type="text/javascript">location.href="admin.php";</script>';
	}
	if (isset($_SESSION["SYSTEMUSER"]) && $_SESSION["SYSTEMUSER"]=="IS_ACTIVE") {
		echo '<script type="text/javascript">location.href="systemUser.php";</script>';
	}
	if (isset($_SESSION["MASTER"]) && $_SESSION["MASTER"]=="IS_ACTIVE") {
		echo '<script type="text/javascript">location.href="master.php";</script>';
	}
	if (isset($_SESSION["CUSTOMER"]) && $_SESSION["CUSTOMER"]=="IS_ACTIVE") {
		echo '<script type="text/javascript">location.href="customer.php";</script>';
	}

	include 'inc/connect.php';

	if(isset($_POST['username']) && isset($_POST['type']) && isset($_POST['password'])){

	$username=$_POST['username'];
	$type=$_POST['type'];
	$password=$_POST['password'];
	$pwd=md5($password);

	// START ADMIN LOGIN
	if ($type == 'Admin') {
		$sql = "SELECT * FROM admin_tb WHERE admin_name = '$username'";
		$query = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($query);
		if($count==1){
			while ($res= mysqli_fetch_array($query)) {
				$pass= $res["password"];
				$uid= $res["admin_id"];
				$uname= $res["admin_name"];
			}
			if (trim($pass) == trim($password)) {
				$_SESSION["ADMIN"]="IS_ACTIVE";
				$_SESSION["userid"]=$uid;
				$_SESSION["username"]=$uname;
				echo '<script type="text/javascript">location.href="admin.php";</script>';				
			}else{
				$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Password is Incorrect.</div>';
			}

		}else{
			$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Username is not exist.</div>';
		}

	}
	// END ADMIN LOGIN

	// START SYSTEMUSER LOGIN
	if ($type == 'SystemUser') {
		$sql = "SELECT * FROM systemuser_tb WHERE sUser_name = '$username'";
		$query = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($query);
		if($count==1){
			while ($res= mysqli_fetch_array($query)) {
				$pass= $res["password"];
				$uid= $res["sUser_id"];
				$uname= $res["sUser_name"];
			}
			if (trim($pass) == trim($pwd)) {
				$_SESSION["SYSTEMUSER"]="IS_ACTIVE";
				$_SESSION["userid"]=$uid;
				$_SESSION["username"]=$uname;
				echo '<script type="text/javascript">location.href="systemUser.php";</script>';				
			}else{
				$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Password is Incorrect.</div>';
			}

		}else{
			$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Username is not exist.</div>';
		}

	}
	// END SYSTEMUSER LOGIN

	// START MASTER LOGIN
	if ($type == 'Master') {
		$sql = "SELECT * FROM master_tb WHERE master_name = '$username'";
		$query = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($query);
		if($count==1){
			while ($res= mysqli_fetch_array($query)) {
				$pass= $res["password"];
				$uid= $res["master_id"];
				$uname= $res["master_name"];
			}
			if (trim($pass) == trim($pwd)) {
				$_SESSION["MASTER"]="IS_ACTIVE";
				$_SESSION["userid"]=$uid;
				$_SESSION["username"]=$uname;
				echo '<script type="text/javascript">location.href="systemUser.php";</script>';				
			}else{
				$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Password is Incorrect.</div>';
			}

		}else{
			$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Username is not exist.</div>';
		}

	}
	// END MASTER LOGIN

	// START CUSTOMER LOGIN
	if ($type == 'Customer') {
		$sql = "SELECT * FROM customer_tb WHERE customer_name = '$username'";
		$query = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($query);
		if($count==1){
			while ($res= mysqli_fetch_array($query)) {
				$pass= $res["password"];
				$uid= $res["customer_id"];
				$uname= $res["customer_name"];
			}
			if (trim($pass) == trim($pwd)) {
				$_SESSION["CUSTOMER"]="IS_ACTIVE";
				$_SESSION["userid"]=$uid;
				$_SESSION["username"]=$uname;
				echo '<script type="text/javascript">location.href="systemUser.php";</script>';				
			}else{
				$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Password is Incorrect.</div>';
			}

		}else{
			$msg= '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-warning"></i> Username is not exist.</div>';
		}

	}
	// END CUSTOMER LOGIN
}


	include 'inc/headerplugin.php';
?>

<body>
	<!-- WRAPPER -->
	<div class="col-md-3"></div>

	<div class="col-md-6">
	<div id="wrapper" style="margin-top: 90px;">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				
				
				<div class="auth-box">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/sewing.png" alt="Klorofil Logo" style="width: 100px; height: 60px;"> <h1>Tailor Shop</h1></div>
								<p class="lead">Login to your account</p>
							</div>
							<?php if (isset($msg)): ?>
								<span><?php echo $msg;?></span>
							<?php endif ?>
							<form class="form-auth-small" action="" method="POST" style="margin: 10px;">
								<div class="form-group">
									<label for="signin-username" class="control-label sr-only">User Name</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
								</div>
								<div class="form-group">
									<label for="signin-usertype" class="control-label sr-only">User Type</label>
									<select name="type" id="type" class="form-control">
								      <option disabled="" selected="">Select</option>  
								      <option value="Admin">Admin</option>  
								      <option value="SystemUser">SystemUser</option>
								      <option value="Master">Master</option>
								      <option value="Customer">Customer</option>
							     	</select>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" name="login" style="color: white;" >LOGIN</button>
							</form>
					</div>
				</div>
			</div>
				
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
	<!-- END WRAPPER -->
</body>

</html>
