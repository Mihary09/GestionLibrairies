<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= isset($page) ? 'Page | ' . strtoupper($page) : 'Page | LIVRE' ?> </title>
    <!-- Liaison CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL . '/css/bootstrap.css'; ?>">
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="#">Gestion Librairie</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item <?= (isset($page) && $page ==  'livre') || (!isset($page)) ? 'active ' : '' ?>">
                    <a class="nav-link" href="<?= BASE_URL . '/index.php?p=livre' ?>">Livres</a>
                </li>
                <li class="nav-item <?= (isset($page) && $page ==  'membre') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= BASE_URL . '/index.php?p=membre' ?>">Membres</a>
                </li>
                <li class="nav-item <?= (isset($page) && $page ==  'categorie') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= BASE_URL . '/index.php?p=categorie' ?>">Catégories</a>
                </li>
            </ul>
        </div>

    </div>
    
</nav>
<div class="container">
    <?php echo $contenue; ?>
</div>

<!-- Liaison scripts et bootstrap -->
<script src="<?= BASE_URL . '/JQuery/jquery-3.6.0.min.js' ?>"></script>
<script src="<?= BASE_URL . '/js/bootstrap.js' ?>"></script>
</body>
</html>
