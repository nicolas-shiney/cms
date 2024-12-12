{debug}
{extends file="layout.tpl"}

{block name="content"}
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
                    {foreach from=$users item=user}
                        <tr>
                            <td>{$user.id}</td>
                            <td>{$user.username}</td>
                            <td>{$user.email}</td>
                            <td>{$user.role}</td>
                            <td>
                                <a href="index.php?page=edit_user&id={$user.id}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=delete_user&id={$user.id}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{/block}
