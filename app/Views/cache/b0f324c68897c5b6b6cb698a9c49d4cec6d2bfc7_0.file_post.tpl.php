<?php
/* Smarty version 5.4.2, created on 2024-12-11 21:03:47
  from 'file:post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6759c5f38dc994_52247883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0f324c68897c5b6b6cb698a9c49d4cec6d2bfc7' => 
    array (
      0 => 'post.tpl',
      1 => 1733826198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6759c5f38dc994_52247883 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15834784166759c5f38da592_04811050', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_15834784166759c5f38da592_04811050 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
?>

    <div class="row">
        <div class="col">
            <h1>Welcome, <span class="text-success"><?php echo (($tmp = $_smarty_tpl->getValue('username') ?? null)===null||$tmp==='' ? 'Guest' ?? null : $tmp);?>
</span> on the <span class="text-primary"><?php echo $_GET['page'];?>
</span>!</h1>
            <p><?php echo $_smarty_tpl->getValue('content');?>
</p>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
