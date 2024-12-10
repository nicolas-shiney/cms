<?php
/* Smarty version 5.4.2, created on 2024-12-10 12:47:27
  from 'file:layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6758001f3e3e40_66790330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef8abbbb1c1f7b1972cd25e959d84626509bd4cd' => 
    array (
      0 => 'layout.tpl',
      1 => 1733820362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6758001f3e3e40_66790330 (\Smarty\Template $_smarty_tpl) {
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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=home">Simple CMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->getValue('currentPage') == 'home') {?>active<?php }?>" href="index.php?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->getValue('currentPage') == 'post') {?>active<?php }?>" href="index.php?page=post">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->getValue('currentPage') == 'gallery') {?>active<?php }?>" href="index.php?page=gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->getValue('currentPage') == 'contact') {?>active<?php }?>" href="index.php?page=contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->getValue('currentPage') == 'about') {?>active<?php }?>" href="index.php?page=about">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Main Content -->
<main class="container mt-4">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7887528686758001f3e2bc7_39787753', "content");
?>

</main>
<!-- Footer -->
<footer class="bg-dark text-white text-center p-3 mt-4">
    <p>&copy; <?php echo $_smarty_tpl->getValue('year');?>
 My CMS</p>
</footer>
<!-- Bootstrap JS and Popper.js -->
<?php echo '<script'; ?>
 src="assets/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
/* {block "content"} */
class Block_7887528686758001f3e2bc7_39787753 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
}
}
/* {/block "content"} */
}
