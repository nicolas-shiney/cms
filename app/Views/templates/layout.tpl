<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title|default:'My CMS'}</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Jumbotron -->
    {block name="jumbotron"}
        <div class="jumbotron {if $isAdmin} bg-primary text-white p-5 rounded mt-4 {else}bg-dark p-5 rounded mt-4{/if}">
            <div class="container align-cont my-5 mx-5">
                <h1 class="display-4 {if $isAdmin}text-white{else}text-light{/if}">
                    {if $isAdmin}Admin Dashboard{else}Welcome to Simple CMS{/if}
                </h1>
                <p class="lead {if $isAdmin}text-white-50{else}text-secondary px-5{/if}">
                    {if $isAdmin}Manage your CMS content with ease.{else}A simple content management system to make your life easier.{/if}
                </p>
            </div>
        </div>
    {/block}
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
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
<footer class="{if $isAdmin} bg-primary {else} bg-dark {/if} text-white text-center p-3 mt-4">
    <p>&copy; Simple CMS 2024 - {$smarty.now|date_format:"Y"}</p>
</footer>
<!-- Bootstrap JS and Popper.js -->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
</bo
</html>
