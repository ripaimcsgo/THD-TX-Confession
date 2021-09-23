<?php
require_once '../vendor/autoload.php';
require_once __DIR__ . '/sendData.php';
require_once __DIR__ . '/client.php';

$input = $_POST["content"];
$upload_date = date('d/m/Y H:i:s');

$send = new sendData();
$send = $send->uploadFrom($upload_date, $input, "");
var_dump($send);

//Form validation (copy from W3Schools)
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>