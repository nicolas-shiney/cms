<?php
/* Smarty version 5.4.2, created on 2024-12-11 22:45:51
  from 'file:admin/user_add.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6759dddf50f2e3_86555646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fb02868593a571de2398d14277502091772c2a9' => 
    array (
      0 => 'admin/user_add.tpl',
      1 => 1733942750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6759dddf50f2e3_86555646 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11328494536759dddf50d611_50706424', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_11328494536759dddf50d611_50706424 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Add User</h1>
        <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
            <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
        <?php }?>
        <form method="POST" action="index.php?page=user_add" class="w-25 mx-auto">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required value="user_<?php echo time();?>
">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php echo time();?>
@e.mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required value="password_<?php echo time();?>
">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role">
                    <option value="user" selected>User</option>
                    <option value="editor">Editor</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-success text-end">Add User</button>
            </div>
        </form>
    </div>
<?php
}
}
/* {/block "content"} */
}
