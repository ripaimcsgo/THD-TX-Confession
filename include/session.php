<?php
session_start();	

function ErrorMess() {
	if (isset($_SESSION["ErrorMess"])) {
		$Output = "<div class=\"alert alert-danger\">";
		$Output .= htmlentities($_SESSION["ErrorMess"]);
		$Output .= "</div>";
		$_SESSION["ErrorMess"] = null;
		return $Output;
	}
}

function OkMess() {
	if (isset($_SESSION["OkMess"])) {
		$Output = "<div class=\"alert alert-success\">";
		$Output .= htmlentities($_SESSION["OkMess"]);
		$Output .= "</div>";
		$_SESSION["OkMess"] = null;
		return $Output;
	}
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> b7d8320981c03cc799c4adb76115a8707b1bdf7a
