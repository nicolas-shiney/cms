<?php
/* Smarty version 5.4.2, created on 2024-12-10 14:58:25
  from 'file:errors/404.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67581ed1191827_35129430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd674373a714437677aac5201a4eb77b988c050cb' => 
    array (
      0 => 'errors/404.tpl',
      1 => 1733827249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67581ed1191827_35129430 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/errors';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
<div class="container text-center">
    <h1 class="display-1 text-danger">404</h1>
    <h2 class="mb-4">Oops! Looks like you're lost...</h2>
    <p class="lead mb-5">We couldn't find the page you were looking for. Maybe it was abducted by aliens or decided to take a vacation!</p>
    <a href="index.php?page=home" class="btn btn-primary btn-lg">Take Me Home</a>
    <div class="mt-4">
        <img src="assets/images/404-illustration.png" alt="Lost in Space" class="img-fluid" style="max-height: 300px;">
    </div>
</div>
<!-- Bootstrap JS -->
<?php echo '<script'; ?>
 src="assets/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
