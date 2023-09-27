<?php
$path = explode("/", $_SERVER['REQUEST_URI']);
$url = end($path);
?>

<!-- Navbar - Start -->
<nav class="navbar navbar-expand-lg bg-white fixed-top shadow px-2 px-lg-0 py-3">
    <div class="container ">

        <a class="navbar-brand caseOverskrift" href="index.php" id="logo">Bogcaféen</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-secondary-hover">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($url == "forside.php") ? "active" : "" ?>" aria-current="page" href="forside.php">Forside</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($url == "index.php") ? "active" : "" ?>" href="http://index.php">Bøger</a>
                </li>
            </ul>
            <a href="insert.php" class="btn btn-primary text-white ms-lg-2">Opret Produkter</a>
        </div>
    </div>
</nav>





