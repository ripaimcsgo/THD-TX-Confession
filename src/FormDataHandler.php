<?php
require_once '../vendor/autoload.php';
require_once __DIR__ . '/sendData.php';
require_once __DIR__ . '/client.php';

//Confession text data handler
$input = $_POST["content"];
$upload_date = date('d/m/Y H:i:s');

$send = new sendData();
$send = $send->uploadFrom($upload_date, $input, "");

//Form validation (copy from W3Schools)
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//File upload handle
if (isset($_POST['submit'])) {
	//$noi_dung = $_POST['fileToUpload'];
	// Lay ten anh
	$image = $_FILES['fileToUpload']['name'];

	// Lay phan duoi cua file
	$extension = substr($image, strpos($image, '.') + 1);

	// Noi luu anh
	$filename = basename($image);
	$path = "E:\code\wamp_server\www\cfs\THD-TX-Confession\uploads/" . $filename;

	// Kiem tra xem co phai file anh hay khong
	if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
		// Chuyen anh vao thu muc uploads
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path);
	} else {
		$_SESSION["ErrorMess"] = "File bạn tải lên không phải là file ảnh";
	}

	// Encode the image string data into base64
	$image_base64 = base64_encode($image);
}
?>