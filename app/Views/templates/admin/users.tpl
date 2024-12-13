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
{if isset($flashMessages) && $flashMessages|@count > 0}
    <div class="modal fade" id="flashModal" tabindex="-1" aria-labelledby="flashModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border border-success">
                <div class="modal-header bg-success-subtle">
                    <h5 class="modal-title text-success" id="flashModalLabel">Sweeeet!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-success-subtle text-center">
                    {foreach from=$flashMessages key=type item=messages}
                        {foreach from=$messages item=msg}
                            <div class="text-{$type}">{$msg}</div>
                        {/foreach}
                    {/foreach}
                </div>
                <div class="modal-footer bg-success-subtle">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var flashModal = new bootstrap.Modal(document.getElementById('flashModal'));
            flashModal.show();
        });
    </script>
{/if}
{/block}
















