<?php

require '../vendor/autoload.php';

$smarty = new \Smarty\Smarty();

$smarty->assign('title', 'Smarty Test');
$smarty->assign('content', 'This is a test of the Smarty library.');

$smarty->setTemplateDir('../app/Views/templates');
$smarty->setCompileDir('../app/Views/cache');

$smarty->display('test.tpl');