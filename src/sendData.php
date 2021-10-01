<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: /index.php'));
}
require '../vendor/autoload.php';
require_once __DIR__ . '/client.php';
require_once '../include/config.php';

class sendData
{
    public static function uploadFrom($date, $message, $media_url)
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
            "insertDataOption" => "INSERT_ROWS",
        ];

        $result = $service->spreadsheets_values->append(spreadsheetId, range, $body, $params, $insert);
        return $result;
    }

    /* These methods not finish yet. Just for test */

    public static function uploadFile($filename, $mimeType)
    {
        $client = new client();
        $client = $client->DriveClient();

        $service = new Google_Service_Drive($client);

        $file = new \Google_Service_Drive_DriveFile();
        $file->setName(date('d/m/Y-H:i:s-').$filename);
        $file->setMimeType($mimeType);
        $file->setParents([self::getIdbyFolderName(folder_name)]); //uploaded file should be in the right upload folder

        $result = $service->files->create($file, [
            'data' => file_get_contents(folder_path. $filename),
            'mimeType' => $mimeType,
            'uploadType' => 'resumable',
            'supportsAllDrives' => true
        ]);
        //Return view-only url
        $view_url = "https://drive.google.com/file/d/" . $result->id;
        return $view_url;
    }

    public static function checkFolderExist()
    {
        $client = new client();
        $client = $client->DriveClient();

        $service = new Google_Service_Drive($client);
        // List all user files (and folders) at Drive root
        $found = false;
        $folderId = self::getIdbyFolderName(folder_name);
        if ($folderId != null) {
            $found = true;
            self::setFolderPermission($folderId);
        }

        // If not, create one
        if ($found == false) {
            $folder = new Google_Service_Drive_DriveFile();

            //Setup the folder to create
            $folder->setName(folder_name);
            $folder->setMimeType('application/vnd.google-apps.folder');

            //Create the Folder
            try {
                $createdFile = $service->files->create($folder, array(
                    'mimeType' => 'application/vnd.google-apps.folder',
                ));
                self::setFolderPermission($createdFile->id);
                // Return the created folder's id
                return $createdFile->id;
            } catch (Exception $e) {
                die ("An error occurred: ") . $e->getMessage();
            }
        }
    }

    public static function setFolderPermission($folderId)
    {
        $client = new client();
        $client = $client->DriveClient();
        $service = new \Google_Service_Drive($client);

        //setup permissions
        $permissions = new \Google_Service_Drive_Permission();

        $list_permissions = $service->permissions->listPermissions($folderId, [
            'supportsAllDrives'     => true,
            'fields'            => 'permissions'
        ]);

        //Check if user already have permissions by emails
        $hasPermission = false;
        foreach ($list_permissions['permissions'] as $email) {
            if ($email['emailAddress'] == client_email) {
                $hasPermission = true;
            }
        }

        //Only set user as folder owner if user not have permission yet.
        if ($hasPermission == false) {
            $permissions->setType('user');
            $permissions->setEmailAddress(client_email);
            $permissions->setRole('owner');
            try {
                $permissions = $service->permissions->create($folderId, $permissions, [
                    'transferOwnership' => true,
                    'sendNotificationEmail' => true
                ]);
                return $permissions;
            } catch (Exception $e) {
                die ("An error occurred: ") . $e->getMessage();
            }
        }
    }

    public static function getIdbyFolderName() {
        $client = new client();
        $client = $client->DriveClient();

        $service = new Google_Service_Drive($client);
        // List all user files (and folders) at Drive root
        $files = $service->files->listFiles();
        // Go through each one to see if there is already a folder with the specified name
        foreach ($files['files'] as $item) {
            if ($item['name'] == folder_name) {
                return $item['id'];
                break;
            }
        }
    }
}
?>