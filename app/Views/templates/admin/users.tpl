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
                            <!--
                            <td>
                                <a href="index.php?page=user_edit&id={$user.id}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=user_delete&id={$user.id}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                             -->
                            <td>
                                <a href="index.php?page=user_edit&id={$user.id}" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal{$user.id}">Delete</button>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteUserModal{$user.id}" tabindex="-1" aria-labelledby="deleteUserModalLabel{$user.id}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning-subtle">
                                                <h5 class="modal-title text-warning" id="deleteUserModalLabel{$user.id}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-warning-subtle">
                                                Are you sure you want to delete <strong>{$user.username}</strong>?
                                            </div>
                                            <div class="modal-footer bg-warning-subtle">
                                                <form method="POST" action="index.php?page=user_delete">
                                                    <input type="hidden" name="id" value="{$user.id}">
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
















