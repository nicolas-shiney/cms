{extends file="layout.tpl"}
{block name="content"}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit User</h1>
        <!-- Modal for Flash Messages -->
        {if isset($flashMessages) && $flashMessages|@count > 0}
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border border-danger">
                        <div class="modal-header bg-danger-subtle">
                            <h5 class="modal-title text-danger" id="flashModalLabel">Something is wrong…</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-danger-subtle text-center">
                            {foreach from=$flashMessages key=type item=messages}
                                {foreach from=$messages item=msg}
                                    <div class="text-{$type}-emphasis">{$msg}</div>
                                {/foreach}
                            {/foreach}
                        </div>
                        <div class="modal-footer bg-danger-subtle">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        <form method="POST" action="index.php?page=user_edit" class="w-50 mx-auto">
            <input type="hidden" name="id" value="{$user.id}">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required value="{$user.username}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="{$user.email}">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role">
                    <option value="user" {if $user.role == 'user'}selected{/if}>User</option>
                    <option value="editor" {if $user.role == 'editor'}selected{/if}>Editor</option>
                    <option value="admin" {if $user.role == 'admin'}selected{/if}>Admin</option>
                </select>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
    {if isset($flashMessages) && $flashMessages|@count > 0}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            });
        </script>
    {/if}
{/block}
