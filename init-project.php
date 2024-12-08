<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-8
 * Time: 15:49
 */

// Create composer.json if it doesn't exist and include Symfony YAML library
$composerJson = 'composer.json';
if (!file_exists($composerJson)) {
    echo "Creating composer.json with Symfony YAML dependency...\n";
    $composerContent = [
        "name" => "Simple CMS",
        "description" => "Project setup with YAML for folder creation",
        "type" => "project",
        "require" => [
            "symfony/yaml" => "^6.0"
        ],
        "autoload" => [
            "psr-4" => ["App\\" => "src/"]
        ]
    ];
    file_put_contents($composerJson, json_encode($composerContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    echo "composer.json created.\n";

    // Run composer install to fetch dependencies
    echo "Installing dependencies...\n";
    exec('composer install', $output, $returnVar);
    if ($returnVar !== 0) {
        die("Error: Failed to install dependencies.\n" . implode("\n", $output));
    }
    echo "Dependencies installed successfully.\n";
}

require 'vendor/autoload.php'; // Assuming you use Symfony's YAML component

use Symfony\Component\Yaml\Yaml;

function createFolderStructure(array $folders, $basePath = __DIR__)
{
    foreach ($folders as $folder) {
        $folderPath = $basePath . DIRECTORY_SEPARATOR . $folder['name'];
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);
            echo "Created folder: $folderPath\n";
        } else {
            echo "Folder already exists: $folderPath\n";
        }

        if (isset($folder['writable']) && $folder['writable'] === true) {
            chmod($folderPath, 0777); // Ensure folder is writable
            echo "Set writable permissions on: $folderPath\n";
        }

        if (!empty($folder['children'])) {
            createFolderStructure($folder['children'], $folderPath);
        }
    }
}

// Load the YAML file
$yamlFilePath = 'folder-structure.yaml';
$yaml = Yaml::parseFile($yamlFilePath);
if (isset($yaml['folders'])) {
    createFolderStructure($yaml['folders']);
} else {
    echo "No folders defined in the YAML file.\n";
}

// Move folder-structure.yaml to its final destination
$newYamlPath = __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'folder-structure.yaml';
if (!is_dir(dirname($newYamlPath))) {
    mkdir(dirname($newYamlPath), 0777, true);
    echo "Created config directory.\n";
}
if (rename($yamlFilePath, $newYamlPath)) {
    echo "Moved $yamlFilePath to $newYamlPath\n";
} else {
    echo "Failed to move $yamlFilePath to $newYamlPath\n";
}