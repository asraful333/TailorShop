<?php 
session_start();

if (isset($_SESSION["order"]) && isset($_SESSION["serial"]) && isset($_SESSION["customerid"]) && $_SESSION["order"]=='yes') {
	$_SESSION["order"] = null;
	$_SESSION["serial"] = null;
	$_SESSION["customerid"] = null;
	header('location:../systemUser.php?page=add_order');
}