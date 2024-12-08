<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-8
 * Time: 15:49
 */

echo "Initializing project...\n";

// 1. Check for Composer
if (!file_exists('composer.json')) {
    die("Error: composer.json not found. Please ensure you have cloned the full repository.\n");
}

echo "Checking Composer installation...\n";
if (exec('composer --version') === null) {
    die("Error: Composer is not installed. Please install Composer first.\n");
}

// 2. Run Composer Install
echo "Installing dependencies using Composer...\n";
exec('composer install', $output, $returnVar);
if ($returnVar !== 0) {
    die("Error: Failed to install dependencies. Check your Composer setup.\n");
}
echo implode("\n", $output) . "\n";

// 3. Move YAML File to Config Directory
echo "Organizing folder structure...\n";
$yamlFile = 'folder-structure.yaml';
$configDir = 'config';
if (!is_dir($configDir)) {
    mkdir($configDir, 0777, true);
    echo "Created config directory.\n";
}
if (file_exists($yamlFile)) {
    rename($yamlFile, $configDir . DIRECTORY_SEPARATOR . $yamlFile);
    echo "Moved $yamlFile to $configDir.\n";
}

// 4. Set Folder Permissions
echo "Setting folder permissions...\n";
$folders = ['storage', 'public/upload', 'config'];
foreach ($folders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
        echo "Created $folder directory.\n";
    }
    chmod($folder, 0777);
    echo "Set writable permissions for $folder.\n";
}

// 5. Display Completion Message
echo "Project initialization complete!\n";
echo "You can now start development.\n";
