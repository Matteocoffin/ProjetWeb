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
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                <td><button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                <td><button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                <td><button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class='d-flex justify-content-center' style='margin-top: 5%;'>
        <button type="button" class="btn btn-dark">Plus d'options</button>
    </div>
    

    <?php include('Footer.php') ?>
    </body>
</html>