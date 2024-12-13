<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-08
 * Time: 18:11
 */
namespace App\Utilities;

class MessageHandler
{
    private $logFile;
    private $flashStorage;

    public function __construct(string $logFile = null, &$flashStorage = null)
    {
        // Ensure session is started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->logFile = $logFile ?? BASE_DIR . '/logs/app.log';

        // Initialize flash storage
        if (!isset($_SESSION['flash_messages'])) {
            $_SESSION['flash_messages'] = [];
        }
        $this->flashStorage = &$_SESSION['flash_messages'];
    }

    // Flash Messages
    public function setFlash(string $type, string $message): void
    {
        $this->flashStorage[$type][] = $message;
    }

    public function getFlash(string $type = null): array
    {
        $messages = $this->flashStorage ?? [];
        if ($type) {
            return $messages[$type] ?? [];
        }
        return $messages;
    }

    public function getFlashAndClear(string $type = null): array
    {
        $messages = $this->getFlash($type);
        $this->clearFlash($type);
        return $messages;
    }

    public function clearFlash(string $type = null): void
    {
        if ($type) {
            unset($this->flashStorage[$type]);
        } else {
            $this->flashStorage = [];
        }
    }

    // Logging
    public function log(string $level, string $message, \Exception $exception = null): void
    {
        $dateTime = date('Y-m-d H:i:s');
        $logMessage = "[$dateTime][$level] $message";

        if ($exception) {
            $logMessage .= " Exception: " . $exception->getMessage();
        }

        error_log($logMessage . PHP_EOL, 3, $this->logFile);
    }

    public function logError(string $message, \Exception $exception = null): void
    {
        $this->log('ERROR', $message, $exception);
    }

    public function logInfo(string $message): void
    {
        $this->log('INFO', $message);
    }
}
