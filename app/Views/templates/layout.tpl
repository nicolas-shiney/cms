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
<header class="bg-primary text-white text-center p-3">
    <h1>{$title|default:'My CMS'}</h1>
</header>
<main class="container mt-4">
    {block name="content"}{/block}
</main>
<footer class="bg-dark text-white text-center p-3 mt-4">
    <p>&copy; {date('Y')} My CMS</p>
</footer>
<!-- Bootstrap JS and Popper.js -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
