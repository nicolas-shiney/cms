<?php
/* Smarty version 5.4.2, created on 2024-12-13 21:54:28
  from 'file:admin/users.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_675c74d415e012_43994353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bdce3598cbb6ed9d663ffa1ffdd18195a9da41f' => 
    array (
      0 => 'admin/users.tpl',
      1 => 1734112465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675c74d415e012_43994353 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
$_smarty_debug = new \Smarty\Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2106651164675c74d4156189_77140401', "content");
?>

















<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_2106651164675c74d4156189_77140401 extends \Smarty\Runtime\Block
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
                            <!--
                            <td>
                                <a href="index.php?page=user_edit&id=<?php echo $_smarty_tpl->getValue('user')['id'];?>
" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=user_delete&id=<?php echo $_smarty_tpl->getValue('user')['id'];?>
" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                             -->
                            <td>
                                <a href="index.php?page=user_edit&id=<?php echo $_smarty_tpl->getValue('user')['id'];?>
" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?php echo $_smarty_tpl->getValue('user')['id'];?>
">Delete</button>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteUserModal<?php echo $_smarty_tpl->getValue('user')['id'];?>
" tabindex="-1" aria-labelledby="deleteUserModalLabel<?php echo $_smarty_tpl->getValue('user')['id'];?>
" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning-subtle">
                                                <h5 class="modal-title text-warning" id="deleteUserModalLabel<?php echo $_smarty_tpl->getValue('user')['id'];?>
">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-warning-subtle">
                                                Are you sure you want to delete <strong><?php echo $_smarty_tpl->getValue('user')['username'];?>
</strong>?
                                            </div>
                                            <div class="modal-footer bg-warning-subtle">
                                                <form method="POST" action="index.php?page=user_delete">
                                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('user')['id'];?>
">
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<?php if ((null !== ($_smarty_tpl->getValue('flashMessages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('flashMessages')) > 0) {?>
    <div class="modal fade" id="flashModal" tabindex="-1" aria-labelledby="flashModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border border-success">
                <div class="modal-header bg-success-subtle">
                    <h5 class="modal-title text-success" id="flashModalLabel">Sweeeet!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-success-subtle text-center">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('flashMessages'), 'messages', false, 'type');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('type')->value => $_smarty_tpl->getVariable('messages')->value) {
$foreach1DoElse = false;
?>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach2DoElse = false;
?>
                            <div class="text-<?php echo $_smarty_tpl->getValue('type');?>
"><?php echo $_smarty_tpl->getValue('msg');?>
</div>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
                <div class="modal-footer bg-success-subtle">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
>
        document.addEventListener('DOMContentLoaded', function () {
            var flashModal = new bootstrap.Modal(document.getElementById('flashModal'));
            flashModal.show();
        });
    <?php echo '</script'; ?>
>
<?php }
}
}
/* {/block "content"} */
}
