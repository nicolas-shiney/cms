<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title|default:'My CMS'}</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Jumbotron -->
    <div class="jumbotron bg-dark p-5 rounded mt-4">
        <div class="container align-cont my-5 mx-5">
            <h1 class="display-4 text-light">Welcome to Simple CMS</h1>
            <p class="lead text-secondary px-5">A simple content management system to make your life easier.</p>
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=home">Simple CMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                {foreach $menu as $item}
                    <li class="nav-item">
                        <a class="nav-link {if $currentPage == $item.path}active{/if}" href="index.php?page={$item.path}">{$item.name}</a>
                    </li>
                {/foreach}
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="mt-4">
        {block name="content"}{/block}
    </main>
</div>
<!-- Footer -->
<footer class="bg-dark text-white text-center p-3 mt-4">
    <p>&copy; {$year} My CMS</p>
</footer>
<!-- Bootstrap JS and Popper.js -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
