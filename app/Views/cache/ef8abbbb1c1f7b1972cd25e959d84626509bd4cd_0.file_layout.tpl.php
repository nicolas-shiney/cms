<?php
/* Smarty version 5.4.2, created on 2024-12-11 21:24:21
  from 'file:layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6759cac5ecbbd4_51050798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef8abbbb1c1f7b1972cd25e959d84626509bd4cd' => 
    array (
      0 => 'layout.tpl',
      1 => 1733937861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6759cac5ecbbd4_51050798 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? 'My CMS' ?? null : $tmp);?>
</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Jumbotron -->
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2537524876759cac5ec4e92_84023133', "jumbotron");
?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('menu'), 'item');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_smarty_tpl->getValue('currentPage') == $_smarty_tpl->getValue('item')['path']) {?>active<?php }?>" href="index.php?page=<?php echo $_smarty_tpl->getValue('item')['path'];?>
"><?php echo $_smarty_tpl->getValue('item')['name'];?>
</a>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="mt-4">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16876390766759cac5eca1f3_28686545', "content");
?>

    </main>
</div>
<!-- Footer -->
<footer class="<?php if ($_smarty_tpl->getValue('isAdmin')) {?> bg-primary <?php } else { ?> bg-dark <?php }?> text-white text-center p-3 mt-4">
    <p>&copy; Simple CMS 2024 - <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),"Y");?>
</p>
</footer>
<!-- Bootstrap JS and Popper.js -->
<?php echo '<script'; ?>
 src="assets/js/bootstrap/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</bo
</html>
<?php }
/* {block "jumbotron"} */
class Block_2537524876759cac5ec4e92_84023133 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
?>

        <div class="jumbotron <?php if ($_smarty_tpl->getValue('isAdmin')) {?> bg-primary text-white p-5 rounded mt-4 <?php } else { ?>bg-dark p-5 rounded mt-4<?php }?>">
            <div class="container align-cont my-5 mx-5">
                <h1 class="display-4 <?php if ($_smarty_tpl->getValue('isAdmin')) {?>text-white<?php } else { ?>text-light<?php }?>">
                    <?php if ($_smarty_tpl->getValue('isAdmin')) {?>
                        Admin Dashboard
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->getValue('jumbotron_title');?>

                    <?php }?>
                </h1>
                <p class="lead <?php if ($_smarty_tpl->getValue('isAdmin')) {?>text-white-50<?php } else { ?>text-secondary px-5<?php }?>">
                    <?php if ($_smarty_tpl->getValue('isAdmin')) {?>
                        Manage your CMS content with ease.
                    <?php } else { ?>
                        A simple content management system to make your life easier.
                    <?php }?>
                </p>
            </div>
        </div>
    <?php
}
}
/* {/block "jumbotron"} */
/* {block "content"} */
class Block_16876390766759cac5eca1f3_28686545 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
}
}
/* {/block "content"} */
}
