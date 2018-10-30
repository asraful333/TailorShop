<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Tailor Shop MS</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- VENDOR CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
		<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
		<!-- MAIN CSS -->
		<link rel="stylesheet" href="assets/css/main.css">
		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
		<!-- ICONS -->
		<link rel="icon" type="image/png" sizes="96x96" href="assets/img/sewing.png">
	</head>

	<body>
		<div id="wrapper">
			<!-- NAVBAR -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="brand">
					<a href="index.html"><img src="assets/img/logo-ori.png" alt="Klorofil Logo" class="img-responsive logo"></a>
				</div>
				<div class="container-fluid">
					<div class="navbar-btn">
						<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
					</div>
					<div id="navbar-menu">
						<ul class="nav navbar-nav navbar-right">						
							<li><a href="#"><i class="lnr lnr-exit"></i>Logout</a></li>				
						</ul>
					</div>
				</div>
			</nav>
			<!-- END NAVBAR -->
			<!-- LEFT SIDEBAR -->
			<div id="sidebar-nav" class="sidebar">
				<div class="sidebar-scroll">
					<nav>
						<ul class="nav">
							<li><a href="user.php?page=dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
							<li>
								<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Customer</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								<div id="subPages" class="collapse ">
									<ul class="nav">
										<li><a href="user.php?page=add_customer" class="">Add Customer</a></li>
										<li><a href="user.php?page=customers_list" class="">Customers List</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#sub" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-add"></i> <span>Order</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								<div id="sub" class="collapse ">
									<ul class="nav">
										<li><a href="user.php?page=add_order" class="">Add order</a></li>
										<li><a href="user.php?page=orders_list" class="">Orders List</a></li>

									</ul>
								</div>
							</li>
							<li><a href="user.php?page=transaction" class=""><i class="lnr lnr-text-format"></i> <span>Transaction</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- END LEFT SIDEBAR -->
			<!-- MAIN -->
			<div class="main">
				<!-- MAIN CONTENT -->
				<div class="main-content">
					<div class="container-fluid">
						
						<?php  
							if (isset($_GET['page'])) {
								$page_name=$_GET['page'];
								include ($page_name.".php");
							}
							else{
								$page_name='dashboard';
								include ($page_name.".php");
							}
						?>

					</div>
				</div>
			</div>
				<!--END MAIN-->
			<footer>
				<div class="container-fluid">
					<p class="copyright">&copy; 2018 | CAVEMAN INTERNATIONAL LIMITED | All Rights Reserved.</p>
				</div>
			</footer>
		</div>

		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="assets/vendor/chartist/js/chartist.min.js"></script>
		<script src="assets/scripts/klorofil-common.js"></script>
	    <!-- Import repeater js  -->
	    <script src="assets/vendor/jquery/repeater.js" type="text/javascript"></script>
	    <!--Repeter js-->
		<script type="text/javascript">
		    $(document).ready(function(){
		        $(document).on('click','.add',function(){
		            var html = '';
		            html += '<tr>';
		            html += '<td><select name="service[]" class="form-control service"><option>Select Service</option><option>Shirt</option><option>Pant</option><option>Suit</option></select></td>';
		            html += '<td><input type="text" name="rate[]" class="form-control rate" /></td>';
		            html += '<td><input type="text" name="quantity[]" class="form-control quantity" /></td>';
		            html += '<td><input type="text" name="amount[]" class="form-control amount" /></td>';
		            html += '<td><input type="text" name="fabric[]" class="form-control fabric" /></td>';
		            html += '<td><select name="master[]" class="form-control master"><option>Select master</option><option>Nayem</option><option>Shimul</option><option>Sumon</option></select></td>';
		            html += '<td><button type="button" name="remove" class="btn btn-success remove" >Remove</button></td>';
		            $('#item_table').append(html);
		        });
		        $(document).on('click','.remove',function(){
		            $(this).closest('tr').remove();
		        });
		    });
		</script>
		<!--End Repeter-->
	    <!--Filter-->
		<script>
			$(document).ready(function(){
			  $("#myInput").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $("#myTable tr").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});
		</script>
		<!--DateTime Picker-->

	</body>
</html>
