<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: /index.php'));
}
require_once '../vendor/autoload.php';
require_once __DIR__ . '/sendData.php';
require_once __DIR__ . '/client.php';



//Confession text data handler
$input = $_POST["content"];

$send = new sendData();
$url = "";

//Form validation (copy from W3Schools)
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (isset($_FILES['fileToUpload'])) {
	// Lay ten anh
	$filename = $_FILES['fileToUpload']['name'];
	$file_basename = substr($filename, 0, strripos($filename, '.'));
	$file_ext = substr($filename, strripos($filename, '.'));
	$filesize = $_FILES["fileToUpload"]["size"];
	$mimeType = $_FILES['fileToUpload']['type'];
	if (in_array($file_ext, allowed_file_types) && ($filesize < 20000000)) {
		// Rename file
		$newfilename = md5($file_basename) . $file_ext;
		try {
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], folder_path . $newfilename);
			$url = $send->uploadFile($newfilename, $mimeType);
			unlink(folder_path . $newfilename);
		} catch (Exception $e) {
			exit("lỗi: " . $e->getMessage());
		}
	} elseif ($filesize > 20000000) {
		exit("Lỗi: Kích thước file lớn hơn mức cho phép");
	} else {
		// file type error
		unlink($_FILES["fileToUpload"]["tmp_name"]);
		exit("Lỗi: Định dạng file không hợp lệ");
	}
}

try {
	$send->uploadFrom(date('d/m/Y H:i:s'), $input, $url);
	$send->checkFolderExist();
	exit ("Gửi confession thành công!");

} catch (Exception $e) {
	exit ("Đã có lỗi xảy ra khi gửi confession: " . $e->getMessage());
}
