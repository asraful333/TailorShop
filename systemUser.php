<?php 
session_start();
if (!isset($_SESSION["SYSTEMUSER"]) || $_SESSION["SYSTEMUSER"]!="IS_ACTIVE") {
	echo '<script type="text/javascript">location.href="index.php";</script>';
}

include 'inc/headerplugin.php'; 
?>

	<body>
		<div id="wrapper">
			<!-- NAVBAR -->
			<nav class="navbar navbar-default navbar-fixed-top hidden-print">
				<div class="brand">
					<a href="systemUser.php"><img src="assets/img/logo-ori.png" alt="Taior Logo" class="img-responsive logo"></a>
				</div>
				<div class="container-fluid">
					<div class="navbar-btn">
						<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
					</div>
					<div id="navbar-menu">
						<ul class="nav navbar-nav navbar-right">						
							<li><a href="logout.php"><i class="lnr lnr-exit"></i>Logout</a></li>				
						</ul>
					</div>
				</div>
			</nav>
			<!-- END NAVBAR -->
			<!-- LEFT SIDEBAR -->
			<div id="sidebar-nav" class="sidebar hidden-print">
				<div class="sidebar-scroll">
					<nav>
						<ul class="nav">
							<li><a href="systemUser.php" style="font-size: 25px;"> <span>System User</span></a></li>
							<li><a href="systemUser.php?page=dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
							<li>
								<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Customer</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								<div id="subPages" class="collapse ">
									<ul class="nav">
										<li><a href="systemUser.php?page=add_customer" class="">Add Customer</a></li>
										<li><a href="systemUser.php?page=customers_list" class="">Customers List</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#sub" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-add"></i> <span>Order</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								<div id="sub" class="collapse ">
									<ul class="nav">
										<li><a href="systemUser.php?page=add_order" class="">Add order</a></li>
										<li><a href="systemUser.php?page=orders_list" class="">Orders List</a></li>

									</ul>
								</div>
							</li>
							<li><a href="systemUser.php?page=transaction" class=""><i class="lnr lnr-text-format"></i> <span>Transaction</span></a></li>
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

<?php include 'inc/footerplugin.php'; ?>
