<?php
//Prevent direct access
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: /index.php'));
}

/* Google Spreadsheet API config */
const spreadsheetId = ''; //Google spreadsheet ID
const range = ''; //start range to write new data

/* Google Drive API config */
const folder_name = ''; //Name of folder to be used
const client_email = ''; //Email to share the given folder to

/* Config temp upload folder */
const folder_path = "../uploads";
const allowed_file_types = array('.jpg', '.png', '.jpeg', '.mp4', ".mov");
