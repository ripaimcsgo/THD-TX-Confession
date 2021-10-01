<?php
session_start();	
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: /index.php'));
}

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
