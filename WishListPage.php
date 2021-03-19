<?php include('Bootstrap.php') ?>

<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
        <div class='text-center' style='margin-top: 5%;'>
            <h1>WishList :</h1>
        </div>
        <div class="container" style='margin-top: 5%;'>
            <form>
                <div class="container">
                    <div class='row'>
                        <div class='col-md-2'>
                            <label for="region">Choix de la région?</label>
                            <input class="form-control" id="region" type="text" placeholder="Search..">
                        </div>
                        <div class='col-md-2'>
                            <label for="Competence">Choix de la competence?</label>
                            <input class="form-control" id="Competence" type="text" placeholder="Search..">
                        </div>
                        <div class='col-md-2'>
                            <label for="Entreprise">Choix de l'entreprise?</label>
                            <input class="form-control" id="Entreprise" type="text" placeholder="Search..">
                        </div>
                        <div class='col-md-1'>
                            <label for="Entreprise">Filtre :</label>
                            <button type="button" class="btn btn-dark">Valider</button>
                        </div>
                    </div>
                </div>
            <form>
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evaluation</th>
                    <th scope="col">Company</th>
                    <th scope="col">Compétences</th>
                    <th scope="col">Description</th>
                    <th scope="col">Location</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">ID</th>
                <td><i class="far fa-heart fa-2x" data-bs-toggle="modal" data-bs-target="#Evaluate"></i></td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><i class="fas fa-times fa-2x"></i></td>
            </tr>
            <tr>
                <th scope="row">ID</th>
                <td><i class="far fa-heart fa-2x" data-bs-toggle="modal" data-bs-target="#Evaluate"></i></td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><i class="fas fa-times fa-2x"></i></td>
            </tr>
            <tr>
                <th scope="row">ID</th>
                <td><i class="far fa-heart fa-2x" data-bs-toggle="modal" data-bs-target="#Evaluate"></i></td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><i class="fas fa-times fa-2x"></i></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
    <?php include('Evaluate.php')?>

    <div class='bas' style='margin-top:10%;'><?php include('Footer.php') ?></div>
    </body>
</html>