<?php
class client {
    public function getClient()
    {
        $client = new \Google_Client();
        $client->setApplicationName("Web PHP tuong tac voi google sheet API");
        $client->setScopes(Google\Service\Sheets::SPREADSHEETS);
        $client->setAuthConfig('../include/credentials.json');
        $client->setAccessType('offline');
        
        return $client;
    }
}
?>