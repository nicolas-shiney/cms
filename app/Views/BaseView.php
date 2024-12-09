<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 20:13
 */

namespace App\Views;

use Smarty\Smarty;

class BaseView
{
protected Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();

        // Set Smarty directories
        $this->smarty->setTemplateDir(__DIR__ . '/templates');
        $this->smarty->setCompileDir(__DIR__ . '/cache');
        $this->smarty->setCacheDir(__DIR__ . '/cache');
        $this->smarty->setConfigDir(__DIR__ . '/configs');
    }

    /**
     * Render a template with variables.
     *
     * @param string $template The template file to render.
     * @param array $data Variables to pass to the template.
     */
    public function render(string $template, array $data = []): void
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        $this->smarty->display($template);
    }
}
