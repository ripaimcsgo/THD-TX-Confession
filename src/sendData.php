<?php
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

    public static function uploadMediaFile($media)
    {
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

    public static function checkFolderExist()
    {
        $client = new client();
        $client = $client->DriveClient();

        $service = new Google_Service_Drive($client);
        // List all user files (and folders) at Drive root
        $files = $service->files->listFiles();
        $found = false;
        // Go through each one to see if there is already a folder with the specified name
        foreach ($files['files'] as $item) {
            if ($item['name'] == folder_name) {
                $found = true;
                self::setFolderPermission($item['id']);
                return $item['id'];
                break;
            }
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
                echo "An error occurred: " . $e->getMessage();
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
        foreach ($list_permissions['permissions'] as $emails) {
            if ($emails['emailAddress'] == client_email) {
                echo "user already have permission";
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
                echo "An error occurred: " . $e->getMessage();
            }
        }
    }
}
?>