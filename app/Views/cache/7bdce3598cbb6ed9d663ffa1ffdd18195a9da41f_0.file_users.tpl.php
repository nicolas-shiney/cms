<?php
/* Smarty version 5.4.2, created on 2024-12-11 21:52:38
  from 'file:admin/users.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6759d16637ef49_96389808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bdce3598cbb6ed9d663ffa1ffdd18195a9da41f' => 
    array (
      0 => 'admin/users.tpl',
      1 => 1733939556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6759d16637ef49_96389808 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_868104986759d16637c676_57110833', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_868104986759d16637c676_57110833 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                <h1>Manage Users</h1>
                <a href="index.php?page=user_add" class="btn btn-success">Add User</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'user');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach0DoElse = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getValue('user')['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('user')['username'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('user')['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('user')['role'];?>
</td>
                            <td>
                                <a href="index.php?page=edit_user&id=<?php echo $_smarty_tpl->getValue('user')['id'];?>
" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=delete_user&id=<?php echo $_smarty_tpl->getValue('user')['id'];?>
" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
