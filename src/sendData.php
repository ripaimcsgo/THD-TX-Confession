<?php

use Google\Service\Sheets;

//require_once '../vendor/autoload.php';
//include '..\vendor\google\apiclient-services\src\Sheets.php';
require_once __DIR__ . '/client.php';
require_once '../include/config.php';

class sendData {
    public $client;
    public $spreadsheetID;
    public $range;
    public $googleSheet;

    public static function uploadFrom($date ,$message, $includelink)
    {
        $client = new client();
        $client = $client->getClient();
        $service = new Google_Service_Sheets($client);
        $values = [
            [$date, $message, $includelink]
            ];

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $insert = [
            "insertDataOption"=> "INSERT_ROWS",
        ];

        $result = $service->spreadsheets_values->append(spreadsheetId, range, $body, $params, $insert);
        //var_dump($result);
        return $result;
    }
}
?>