<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
    <div class='text-center' style='margin-top: 3%;'>
        <h1>Statistique :</h1>
    </div>
    <div class='row' style='margin-left:1%; margin-top: 3%;'>
        <div class='col-md-2'>
            <label for="region">option de statistique</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Statistique --> choix</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div class="form-check" style='margin-top:5%;'>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Statistiques des entreprises
                </label>
            </div>
            <div class="form-check" style='margin-top:5%;'>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Statistiques des offres
                </label>
            </div>
        </div>
        <div class='col-md-8'>
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Company</th>
                        <th scope="col">Compétences</th>
                        <th scope="col">Description</th>
                        <th scope="col">Location</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('Footer.php') ?>
    </body>
</html>