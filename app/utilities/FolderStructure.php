<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-08
 * Time: 18:21
 */

require 'vendor/autoload.php';
require_once 'MessageHandler.php';

/**
 * Class FolderStructure
 * Handles the creation of directory structures based on a nested array configuration.
 */
class FolderStructure
{

private MessageHandler $messageHandler;

    public function __construct()
    {
        $this->messageHandler = new MessageHandler();
    }

    /**
     * Create a directory structure based on the provided array configuration.
     *
     * @param array $folders The directory structure to create.
     * @param string $basePath The base directory where the structure will be created. Defaults to the current directory.
     */
    public function create(array $folders, string $basePath = __DIR__): void
    {
        foreach ($folders as $folder) {
            $folderPath = $basePath . DIRECTORY_SEPARATOR . $folder['name'];

            // Create the folder if it doesn't exist
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
                $this->messageHandler->success("Created folder: $folderPath");
            } else {
                $this->messageHandler->warning("Folder already exists: $folderPath");
            }

            // Set writable permissions if specified
            if (isset($folder['writable']) && $folder['writable'] === true) {
                chmod($folderPath, 0777);
                $this->messageHandler->info("Set writable permissions on: $folderPath");
            }

            // Recursively create child folders
            if (!empty($folder['children'])) {
                $this->create($folder['children'], $folderPath);
            }
        }
    }
}


