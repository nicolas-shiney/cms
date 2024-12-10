<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 20:13
 */
namespace App\Views;
use Symfony\Component\Yaml\Yaml;
use Smarty\Smarty;

class BaseView

{
    /**
     * @var \Smarty\Smarty
     */
    protected $smarty;
    protected $baseDir;

    public function __construct(string $baseDir)
    {
        $this->baseDir = $baseDir;
        $this->smarty = new \Smarty\Smarty();
        $this->smarty->setTemplateDir($this->baseDir . '/app/Views/templates');
        $this->smarty->setCompileDir($this->baseDir . '/app/Views/cache');
        $this->smarty->setCacheDir($this->baseDir . '/app/Views/cache');
        $this->smarty->setConfigDir($this->baseDir . '/app/Views/configs');

        // Load navigation items from YAML
        $navConfig = Yaml::parseFile($this->baseDir . '/configs/navigation.yaml');
        $this->smarty->assign('menu', $navConfig['menu']);
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
