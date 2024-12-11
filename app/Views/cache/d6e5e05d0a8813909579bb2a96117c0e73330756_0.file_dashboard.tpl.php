<?php
/* Smarty version 5.4.2, created on 2024-12-11 20:37:31
  from 'file:admin/dashboard.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6759bfcb873057_52344863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6e5e05d0a8813909579bb2a96117c0e73330756' => 
    array (
      0 => 'admin/dashboard.tpl',
      1 => 1733935051,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6759bfcb873057_52344863 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2666245396759bfcb872786_65793672', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_2666245396759bfcb872786_65793672 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/nicolas/projects/cms/app/Views/templates/admin';
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Manage users, roles, and permissions.</p>
                        <a href="index.php?page=admin_users" class="btn btn-primary mt-auto mx-auto w-auto">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Posts</h5>
                        <p class="card-text">Create, edit, and delete blog posts.</p>
                        <a href="index.php?page=admin_posts" class="btn btn-primary mt-auto mx-auto">Manage Posts</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Media</h5>
                        <p class="card-text">Upload and manage pictures and videos.</p>
                        <a href="index.php?page=admin_media" class="btn btn-primary mt-auto mx-auto" >Manage Media</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Tags</h5>
                        <p class="card-text">Manage tags for posts and media.</p>
                        <a href="index.php?page=admin_tags" class="btn btn-primary mt-auto mx-auto">Manage Tags</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
