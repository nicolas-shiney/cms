<?php
/* Smarty version 5.4.2, created on 2024-12-13 21:38:48
  from 'file:admin/user_edit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_675c7128aa3ea6_82621678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a26ec4016ebcacb827b446760bba3a410e1b8094' => 
    array (
      0 => 'admin/user_edit.tpl',
      1 => 1734111525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675c7128aa3ea6_82621678 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1359098743675c7128a9b7c1_38899793', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1359098743675c7128a9b7c1_38899793 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit User</h1>
        <!-- Modal for Flash Messages -->
        <?php if ((null !== ($_smarty_tpl->getValue('flashMessages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('flashMessages')) > 0) {?>
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border border-danger">
                        <div class="modal-header bg-danger-subtle">
                            <h5 class="modal-title text-danger" id="flashModalLabel">Something is wrong…</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-danger-subtle text-center">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('flashMessages'), 'messages', false, 'type');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('type')->value => $_smarty_tpl->getVariable('messages')->value) {
$foreach0DoElse = false;
?>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
                                    <div class="text-<?php echo $_smarty_tpl->getValue('type');?>
-emphasis"><?php echo $_smarty_tpl->getValue('msg');?>
</div>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </div>
                        <div class="modal-footer bg-danger-subtle">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <form method="POST" action="index.php?page=user_edit" class="w-50 mx-auto">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('user')['id'];?>
">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required value="<?php echo $_smarty_tpl->getValue('user')['username'];?>
">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php echo $_smarty_tpl->getValue('user')['email'];?>
">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role">
                    <option value="user" <?php if ($_smarty_tpl->getValue('user')['role'] == 'user') {?>selected<?php }?>>User</option>
                    <option value="editor" <?php if ($_smarty_tpl->getValue('user')['role'] == 'editor') {?>selected<?php }?>>Editor</option>
                    <option value="admin" <?php if ($_smarty_tpl->getValue('user')['role'] == 'admin') {?>selected<?php }?>>Admin</option>
                </select>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
    <?php if ((null !== ($_smarty_tpl->getValue('flashMessages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('flashMessages')) > 0) {?>
        <?php echo '<script'; ?>
>
            document.addEventListener('DOMContentLoaded', function () {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            });
        <?php echo '</script'; ?>
>
    <?php }
}
}
/* {/block "content"} */
}
