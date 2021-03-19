<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
    <div class='text-center' style='margin-top: 3%;'>
        <h1>Compte :</h1>
        <p>Entrez l'ID du profil à modifié puis entrez mes nouvelles valeurs</p>
    </div>
    <div class='row' style='margin-left:1%; margin-top: 3%;'>
        <div class='col-md-7' style='background-color:lightgray; padding: 1em;'>
            <div class='row'>
                <div class='col-md-2'>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Statistiques des entreprises
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Statistiques des offres
                        </label>
                    </div>
                </div>
                <div class='col-md-2'>
                        <label for="ID">ID</label>
                        <input class="form-control" id="ID" type="text" placeholder="Enter ID">
                </div>
                <div class='col-md-2'>
                        <label for="Nom">Nom</label>
                        <input class="form-control" id="Nom" type="text" placeholder="Enter Nom">
                </div>
                <div class='col-md-2'>
                        <label for="Prenom">Prénom</label>
                        <input class="form-control" id="Prenom" type="text" placeholder="Enter Prénom">
                </div>
                <div class='col-md-2'>
                        <label for="Email">Email</label>
                        <input class="form-control" id="Email" type="email" placeholder="Enter email">
                </div>
            </div>
            <div class='row'>
                <div class='col-md-2'>
                    <label for="mdp">Mot de passe</label>
                    <input class="form-control" id="mdp" type="password" placeholder="Enter password">
                </div>
                <div class='col-md-2'>
                    <label for="Centre">Centre</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Centre --> choix</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class='col-md-2'>
                    <label for="Promotion">Promotion</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Promotion --> choix</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                </div>
                <div class='col-md-2'>
                    <label for="role">Rôle</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Rôle --> choix</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class='row'>
                <div class='text-center' style='margin-top: 3%;'>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </div>
        <div class='col-md-1' >
        </div>
        <div class='col-md-3' style='background-color:lightgray; padding: 1em;'>
            <div class='text-center'>
                <label for="SuppID">ID à Supprimer</label>
                <input class="form-control" id="SuppID" type="text" placeholder="Enter ID">
            </div>
            <div class='text-center' style='margin-top: 3%;'>
                    <button type="submit" class="btn btn-primary">Supprimer</button>
            </div>
        </div>
    </div>
    <?php include('Footer.php') ?>
    </body>
</html>