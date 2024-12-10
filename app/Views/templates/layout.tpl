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
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=home">Simple CMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {if $currentPage == 'home'}active{/if}" href="index.php?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {if $currentPage == 'post'}active{/if}" href="index.php?page=post">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {if $currentPage == 'gallery'}active{/if}" href="index.php?page=gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {if $currentPage == 'contact'}active{/if}" href="index.php?page=contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {if $currentPage == 'about'}active{/if}" href="index.php?page=about">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Main Content -->
<main class="container mt-4">
    {block name="content"}{/block}
</main>
<!-- Footer -->
<footer class="bg-dark text-white text-center p-3 mt-4">
    <p>&copy; {$year} My CMS</p>
</footer>
<!-- Bootstrap JS and Popper.js -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
