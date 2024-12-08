<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-8
 * Time: 17:10
 */

namespace App\utilities;


class ConsoleColor {
private $colors = [
'red' => "\033[31m",
'green' => "\033[32m",
'yellow' => "\033[33m",
'blue' => "\033[34m",
'magenta' => "\033[35m",
'cyan' => "\033[36m",
'white' => "\033[37m",
'reset' => "\033[0m",
];

    /**
     * Returns the text with the specified color.
     */
    public function colorText(string $text, string $color): string
    {
        $colorCode = $this->colors[$color] ?? $this->colors['reset'];
        return $colorCode . $text . $this->colors['reset'];
    }

    /**
     * Returns the list of available colors.
     */
    public function getAvailableColors(): array
    {
        return array_keys($this->colors);
    }
}
*/

/*
class ConsoleColor {
private array $colors = [
'red' => "\033[31m",
'green' => "\033[32m",
'yellow' => "\033[33m",
'blue' => "\033[34m",
'magenta' => "\033[35m",
'cyan' => "\033[36m",
'white' => "\033[37m",
'reset' => "\033[0m"
];

    public function colorText(string $text, string $color): string
    {
        $colorCode = $this->colors[$color] ?? $this->colors['reset'];
        return $colorCode . $text . $this->colors['reset'];
    }
}

*/

// Example usage
//$console = new ConsoleColor();
//echo $console->colorText("This is red text!", "red") . PHP_EOL;
//echo $console->colorText("This is green text!", "green") . PHP_EOL;
//echo $console->colorText("This is blue text!", "blue") . PHP_EOL;
