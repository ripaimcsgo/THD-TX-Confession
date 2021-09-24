<?php
require '../vendor/autoload.php';
require_once __DIR__ . '/client.php';
require_once '../include/config.php';

class sendData {
   public static function uploadFrom($date ,$message, $media_url)
    {
        $client = new client();
        $client = $client->SheetClient();

        $service = new Google_Service_Sheets($client);
        $values = [
            [$date, $message, $media_url]
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

    /* These functions not finish yet. Just for test */

    public static function uploadMediaFile($media) {
        $client = new client();
        $client = $client->DriveClient();

        $service = new Google_Service_Drive($client);

        $file = new \Google_Service_Drive_DriveFile();
        $file->setName('TEST');
        $file->setMimeType('application/vnd.google-apps.folder');
        $result = $service->files->create($file);
        var_dump($result);
        return $result;
    }

    public static function listFile() {
        $client = new client();
        $client = $client->DriveClient();

        $service = new Google_Service_Drive($client);

        $parameters[] = "organizerCount = 0";
        $files = $service->files->listFiles($parameters);
    
    echo "<ul>";
    foreach( $files as $k => $file ){
        echo "<li> 
        
            {$file['name']} - {$file['id']} ---- ".$file['mimeType'];

            try {
                // subfiles
                $sub_files = $service->files->listFiles(array('q' => "'{$file['id']}' in parents"));
                echo "<ul>";
                foreach( $sub_files as $kk => $sub_file ) {
                    echo "<li&gt {$sub_file['name']} - {$sub_file['id']}  ---- ". $sub_file['mimeType'] ." </li>";
                }
                echo "</ul>";
            } catch (\Throwable $th) {
                // dd($th);
            }
        
        echo "</li>";
    }
    echo "</ul>";
    }
}
?>