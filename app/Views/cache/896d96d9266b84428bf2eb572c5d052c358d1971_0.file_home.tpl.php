<?php
/* Smarty version 5.4.2, created on 2024-12-10 12:05:15
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6757f63b51ec74_90784676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '896d96d9266b84428bf2eb572c5d052c358d1971' => 
    array (
      0 => 'home.tpl',
      1 => 1733816368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6757f63b51ec74_90784676 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14661840706757f63b51ce07_92417257', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_14661840706757f63b51ce07_92417257 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
?>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1>Welcome, <?php echo (($tmp = $_smarty_tpl->getValue('username') ?? null)===null||$tmp==='' ? 'Guest' ?? null : $tmp);?>
!</h1>
            <p><?php echo $_smarty_tpl->getValue('content');?>
</p>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
