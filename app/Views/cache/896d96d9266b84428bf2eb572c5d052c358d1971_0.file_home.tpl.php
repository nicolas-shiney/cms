<?php
/* Smarty version 5.4.2, created on 2024-12-10 14:54:00
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67581dc8363237_85584212',
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
function content_67581dc8363237_85584212 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_204311397367581dc83614e1_54459595', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_204311397367581dc83614e1_54459595 extends \Smarty\Runtime\Block
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
