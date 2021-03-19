<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="image/log.png" alt="" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="HomePage.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutPage.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">S'INCRIRE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">CONNEXION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="WishListPage.php">WISHLIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ProfilPage.php">PROFIL</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             GESTION
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">OFFRE</a></li>
                            <li><a class="dropdown-item" href="#">ENTREPRISE</a></li>
                            <li><a class="dropdown-item" href="AdminComptePage.php">COMPTE</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">STAT ETUDIANT</a></li>
                            <li><a class="dropdown-item" href="StatistiquePage.php">STAT ENTREPRISE/OFFRE</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    </body>
</html>