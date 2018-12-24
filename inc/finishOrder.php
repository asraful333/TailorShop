<?php 
session_start();

if (isset($_SESSION["order"]) && isset($_SESSION["serial"]) && isset($_SESSION["customerid"]) && $_SESSION["order"]=='yes') {
	$_SESSION["order"] = null;
	$_SESSION["serial"] = null;
	$_SESSION["customerid"] = null;
	if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				header('location:../admin.php?page=orders_list');
			}
			else
				header('location:../systemUser.php?page=orders_list');
}
else 
	echo 'ok';