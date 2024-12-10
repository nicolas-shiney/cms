<?php
/* Smarty version 5.4.2, created on 2024-12-10 14:54:01
  from 'file:about.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67581dc9856fa5_66312490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1aaff07c5484105e4b18bed538b8c76aef065112' => 
    array (
      0 => 'about.tpl',
      1 => 1733826198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67581dc9856fa5_66312490 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_150332190967581dc9855d12_66376732', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_150332190967581dc9855d12_66376732 extends \Smarty\Runtime\Block
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
