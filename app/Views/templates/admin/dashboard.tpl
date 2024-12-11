{extends file="layout.tpl"}
{block name="content"}
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
{/block}
