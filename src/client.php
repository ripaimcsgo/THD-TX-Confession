<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: /index.php'));
}
class client {
    public function SheetClient()
    {
        $client = new \Google_Client();
        $client->setApplicationName("Google sheet API client");
        $client->setScopes(Google\Service\Sheets::SPREADSHEETS);
        $client->setAuthConfig('../include/credentials.json');
        $client->setAccessType('offline');
        
        return $client;
    }

    public function DriveClient()
    {
        $client = new \Google_Client();
        $client->setApplicationName('Google Drive API client');
        $client->setScopes(Google_Service_Drive::DRIVE_FILE);
        $client->setAuthConfig('../include/credentials.json');
        $client->setAccessType('offline');
        $client->setRedirectUri('http://localhost/cfs/THD-TX-Confession');

        return $client;
    }
}
