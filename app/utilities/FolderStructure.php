<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-08
 * Time: 18:21
 */


/**
 * Class FolderStructure
 * Handles the creation of directory structures based on a nested array configuration.
 */
class FolderStructure {
    /**
     * Create a directory structure based on the provided array configuration.
     *
     * @param array $folders The directory structure to create.
     * @param string $basePath The base directory where the structure will be created. Defaults to the current directory.
     */
    public function create(array $folders, string $basePath = __DIR__): void {
        foreach ($folders as $folder) {
            $folderPath = $basePath . DIRECTORY_SEPARATOR . $folder['name'];

            // Create the folder if it doesn't exist
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
                echo "Created folder: $folderPath\n";
            } else {
                echo "Folder already exists: $folderPath\n";
            }

            // Set writable permissions if specified
            if (isset($folder['writable']) && $folder['writable'] === true) {
                chmod($folderPath, 0777);
                echo "Set writable permissions on: $folderPath\n";
            }

            // Recursively create child folders
            if (!empty($folder['children'])) {
                $this->create($folder['children'], $folderPath);
            }
        }
    }
}

