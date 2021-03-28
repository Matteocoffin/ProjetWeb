<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
    <div class='text-center' style='margin-top: 3%;'>
        <h1>Compte :</h1>
        <p>Entrez l'ID du profil à modifié puis entrez les nouvelles valeurs.</p>
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
                            <label for="Nom">Nom</label>
                            <input class="form-control" id="Nom" type="text" placeholder="Nom">
                    </div>
                    <div class='col-md-2'>
                            <label for="Prenom">Prénom</label>
                            <input class="form-control" id="Prenom" type="text" placeholder="Prénom">
                    </div>
                    <div class='col-md-4'>
                            <label for="Email">Email</label>
                            <input class="form-control" id="Email" type="email" placeholder="email">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-3'>
                        <label for="mdp">Mot de passe</label>
                        <input class="form-control" id="mdp" type="password" placeholder="password">
                    </div>
                    <div class='col-md-3'>
                        <label for="Centre">Centre</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Centre --> choix</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class='col-md-3'>
                        <label for="Promotion">Promotion</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Promotion --> choix</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                    </div>
                    <div class='col-md-3'>
                        <label for="role">Rôle</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Étudiant</option>
                            <option value="1">Délégué</option>
                            <option value="2">Pilote</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                </div>
                <div class='row'>
                    <div class='text-center' style='margin-top: 3%;'>
                        <button type="submit" class="btn btn-dark">Valider</button>
                    </div>
                </div>
            </div>
            <div class='col-md-1' >
            </div>
            <div class='col-md-3' style='background-color:lightgray; padding: 1em;'>
                <div class='text-center' style='line-height: 220%;'>
                    <label for="SuppID"><strong>ID à Supprimer</strong></label>
                    <input class="form-control" id="SuppID" type="text" placeholder="ID" style='width:26%; margin-left:37%; margin-top:10%;'>
                    <br /> <button type="submit" class="btn btn-dark">Supprimer</button>
                </div>
            </div>
        </div>
    </div> 
    <div class='container' style='margin-top:5%;'>
        <form>
            <div class='row'>
                <div class='col-md-2'>
                    <label for="ID">choix ID?</label>
                    <input class="form-control" id="ID" type="text" placeholder="Search..">
                </div>
                <div class='col-md-2'>
                    <label for="type">Choix du type?</label>
                    <input class="form-control" id="type" type="text" placeholder="Search..">
                </div>
                <div class='col-md-1'>
                    <label for="Entreprise">Filtre :</label>
                    <button type="button" class="btn btn-dark">Valider</button>
                </div>
            </div>
        </form>
        <br />
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Type</th>
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