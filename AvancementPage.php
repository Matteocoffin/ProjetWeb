<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
    <div class='text-center' style='margin-top: 3%;'>
        <h1>Avancement étudiant :</h1>
    </div>
    <div class='container' style='margin-top:5%;'>
        <div class='row justify-content-center'>
            <div class='col-md-1'>
                <label for="ID">ID</label>
                <input class="form-control" id="ID" type="text" placeholder="ID">
            </div>
            <div class='col-md-2'>
                <label for="Nom">Nom</label>
                <input class="form-control" id="Nom" type="text" placeholder="Nom">
            </div>
            <div class='col-md-2'>
                <label for="Prenom">Prénom</label>
                <input class="form-control" id="Prenom" type="text" placeholder="Prénom">
            </div>
        </div>
    </div>
    <div class='container' style='margin-top:5%;'>
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Company</th>
                    <th scope="col">Avancement</th>
                    <th scope="col">Secteur</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@mdo</td></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>@mdo</td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <?php include('Footer.php') ?>
    </body>
</html>