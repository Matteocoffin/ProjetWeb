<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
    <div class="container">
        <div class="card w-75" style='margin-top: 5%; margin-left: 8%;'>
            <div class="card-body">
                <h5 class="card-title">Bienvenue dans notre site : User_test</h5>
                <p class="card-text">Votre compte est identifié comme un compte : User_type. Je vous pris si vous n'avez pas encore lu les mentions légales
                , de prendre quelque temps pour les lires.</p>
                <a href="#" class="btn btn-primary">MENTIONS LEGALES</a>
            </div>
        </div>
    </div>

    <div class="container" style='margin-top: 5%;'>
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evaluation</th>
                    <th scope="col">Company</th>
                    <th scope="col">Compétences</th>
                    <th scope="col">Description</th>
                    <th scope="col">Location</th>
                    <th scope="col">Wish-list</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td><i class="far fa-heart fa-2x" data-bs-toggle="modal" data-bs-target="#Evaluate"></i></td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                <td><i class="fas fa-times fa-2x"></i></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td><i class="far fa-heart fa-2x" data-bs-toggle="modal" data-bs-target="#Evaluate"></i></td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                <td><i class="fas fa-times fa-2x"></i></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td><i class="far fa-heart fa-2x" data-bs-toggle="modal" data-bs-target="#Evaluate"></i></td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                <td><i class="fas fa-times fa-2x"></i></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class='d-flex justify-content-center' style='margin-top: 5%;'>
        <button type="button" class="btn btn-dark">Plus d'options</button>
    </div>
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal fade" id="Evaluate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Evaluer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style='margin-left:7%;'>
                    <i class="far fa-star fa-4x"></i>
                    <i class="far fa-star fa-4x"></i>
                    <i class="far fa-star fa-4x"></i>
                    <i class="far fa-star fa-4x"></i>
                    <i class="far fa-star fa-4x"></i>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                    <button type="button" class="btn btn-primary">Evaluer</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include('Footer.php') ?>
    </body>
</html>