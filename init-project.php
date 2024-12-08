<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-8
 * Time: 15:49
 */

// Create composer.json if it doesn't exist and include Symfony YAML library

//composer init
//composer init
//composer require symfony/yaml

require_once "app/utilities/ConsoleColor.php";
$console_message = new ConsoleColor();

// Create composer.json if it doesn't exist and include Symfony YAML library
$composerJson = 'composer.json';
if (!file_exists($composerJson)) {
    // Run composer init to initiate the project
    echo $console_message->colorText("Initialise composer...\n", "cyan");

    exec('composer init --name=simple/cms-name --description="simple cms description" --type=project --no-interaction', $output, $returnVar);
    if ($returnVar !== 0) {
        die($console_message->colorText("Error: Failed to install dependencies.\n", "red") . PHP_EOL . implode("\n", $output));
    }
    echo "composer.json created.\n";

    // Run composer install to fetch dependencies
    echo $console_message->colorText("Installing dependencies...\n", "cyan");
    exec('composer install', $output, $returnVar);
    if ($returnVar !== 0) {
        die("Error: Failed to install dependencies.\n" . implode("\n", $output));
    }
    echo "Dependencies installed successfully.\n";

    // Run composer require to fetch symfony/yaml
    echo $console_message->colorText("Installing symfony/yaml...\n", "cyan");
    exec('composer require symfony/yaml', $output, $returnVar);
    if ($returnVar !== 0) {
        die("Error: Failed to install dependencies.\n" . implode("\n", $output));
    }
    echo "Symfony/yaml installed successfully.\n";

    // Run composer require to fetch league/climate
    echo $console_message->colorText("Installing league/climate...\n", "cyan");
    exec('composer require league/climate', $output, $returnVar);
    if ($returnVar !== 0) {
        die("Error: Failed to install dependencies.\n" . implode("\n", $output));
    }
    echo "league/climate installed successfully.\n";
}

require 'vendor/autoload.php';


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
$yamlFilePath = 'config/folder-structure.yaml';
$yaml = Yaml::parseFile($yamlFilePath);
if (isset($yaml['folders'])) {
    createFolderStructure($yaml['folders']);
} else {
    echo "No folders defined in the YAML file.\n";
}


