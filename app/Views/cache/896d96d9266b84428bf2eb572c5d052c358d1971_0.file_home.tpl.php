<?php
/* Smarty version 5.4.2, created on 2024-12-12 18:48:54
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_675af7d63f2b25_18123355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '896d96d9266b84428bf2eb572c5d052c358d1971' => 
    array (
      0 => 'home.tpl',
      1 => 1733826170,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675af7d63f2b25_18123355 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_649544200675af7d63f08c6_95250796', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_649544200675af7d63f08c6_95250796 extends \Smarty\Runtime\Block
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
