<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
    <div class='text-center' style='margin-top: 3%;'>
        <h1>Entreprise :</h1>
        <p>Entrez l'ID de l'entreprise à modifié puis entrez mes nouvelles valeurs</p>
    </div>
    <div class='container'>
        <div class='row' style='margin-left:1%; margin-top: 3%;'>
            <div class='col-md-7' style='background-color:lightgray; padding: 1em;'>
                <div class='row'>
                    <div class='col-md-2'>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Création
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Modifier
                            </label>
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <label for="ID">ID</label>
                        <input class="form-control" id="ID" type="text" placeholder="ID">
                    </div>
                    <div class='col-md-2'>
                        <label for="NomEntreprise">Nom Entreprise</label>
                        <input class="form-control" id="NomEntreprise" type="text" placeholder="Nom">
                    </div>
                    <div class='col-md-2'>
                        <label for="EmailEntreprise">Email Entreprise</label>
                        <input class="form-control" id="EmailEntreprise" type="email" placeholder="email">
                    </div>
                    <div class='col-md-2'>
                        <label for="Secteur">Secteur d'activité</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Secteur --> choix</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class='row' style='margin-top:2%;'>
                    <div class='col-md-3'>
                        <label for="Adresse">Adresse</label>
                        <input class="form-control" id="Adresse" type="text" placeholder="Adresse">
                    </div>
                    <div class='col-md-2'>
                        <label for="Ville">Ville</label>
                        <input class="form-control" id="Ville" type="text" placeholder="Ville">
                    </div>
                    <div class='col-md-2'>
                        <label for="Region">Région</label>
                        <input class="form-control" id="Region" type="text" placeholder="Région">
                    </div>
                    <div class='col-md-3'>
                        <label for="nbCesi">Nombre de stagiaires CESI</label>
                        <input class="form-control" id="nbCesi" type="text" placeholder="nombre">
                    </div>
                </div>
                <div class='row'>
                    <div class='text-center' style='margin-top: 3%;'>
                        <button type="submit" class="btn btn-dark">Valider</button>
                    </div>
                </div>
            </div>
            <div class='col-md-1'>
            </div>
            <div class='col-md-3' style='background-color:lightgray; padding: 1em;'>
                <div class='text-center'>
                    <label for="SuppID"><strong>ID à Supprimer</strong></label>
                    <input class="form-control" id="SuppID" type="text" placeholder="ID" style='width:20%; margin-left:40%;margin-top:5%;'>
                </div>
                <div class='text-center' style='margin-top: 5%;'>
                    <button type="submit" class="btn btn-dark">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <div class='container' style='margin-top:5%;'>
        <form>
            <div class='row'>
                <div class='col-md-2'>
                    <label for="ID">Choix de l'id?</label>
                    <input class="form-control" id="ID" type="text" placeholder="Search..">
                </div>
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
        </form>
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Company</th>
                    <th scope="col">Compétences</th>
                    <th scope="col">Location</th>
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