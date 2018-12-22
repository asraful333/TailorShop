<?php
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
							<form class="form-auth-small" action="" style="margin: 10px;">
								<div class="form-group">
									<label for="signin-username" class="control-label sr-only">User Name</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-usertype" class="control-label sr-only">User Type</label>
									<select name="gender" id="gender" class="form-control">
								      <option disabled="" selected="">Select</option>  
								      <option value="Admin">Admin</option>  
								      <option value="SyatemUser">SystemUser</option>
								      <option value="Master">Master</option>
								      <option value="Customer">Customer</option>
							     	</select>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" ><a href="systemUser.php" style="color: white;">LOGIN</a></button>
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
