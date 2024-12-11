{extends file="layout.tpl"}

{block name="content"}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add User</h1>
        {if isset($error)}
            <div class="alert alert-danger">{$error}</div>
        {/if}
        <form method="POST" action="index.php?page=user_add" class="w-25 mx-auto">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required value="user_{$smarty.now}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="{$smarty.now}@e.mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required value="password_{$smarty.now}">
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
{/block}
