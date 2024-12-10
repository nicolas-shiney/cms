<?php
/* Smarty version 5.4.2, created on 2024-12-10 12:53:28
  from 'file:contact.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67580188ee46d7_26841634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ff811c5b617de3ce4f5e8b063caa4feffa74413' => 
    array (
      0 => 'contact.tpl',
      1 => 1733816368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67580188ee46d7_26841634 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_82885632067580188ee2af3_10261275', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_82885632067580188ee2af3_10261275 extends \Smarty\Runtime\Block
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
