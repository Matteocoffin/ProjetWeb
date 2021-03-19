<?php include('Bootstrap.php') ?>

<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
    <div class='text-center' style='margin-top: 3%;'>
        <h1>Contacter nous :</h1>
    </div>
    <div class='container' style='background-color:lightgray; padding-top:15px; margin-top:5%; border-radius: 25px;'>
        <div class='row justify-content-center'>
            <div class='col-md-3'>
                <label for="Nom">Nom</label>
                <input class="form-control" id="Nom" type="text" placeholder="Nom">
            </div>
            <div class='col-md-3'>
                <label for="Prenom">Prénom</label>
                <input class="form-control" id="Prenom" type="text" placeholder="Prenom">
            </div>
        </div>
        <div class='row justify-content-center' style='margin-top:5%;'>
            <div class='col-md-3'>
                <label for="Email">Email</label>
                <input class="form-control" id="Email" type="Email" placeholder="Email">
            </div>
            <div class='col-md-3'>
                <label for="Sujet">Sujet</label>
                <input class="form-control" id="Sujet" type="text" placeholder="Sujet">
            </div>
        </div>
        <div class='row justify-content-center' style='margin-top:5%;'>
            <div class='col-md-6'>
                <label for="Description">Description</label>
                <textarea class="form-control" id="Description" rows="3" placeholder="Description"></textarea>
            </div>
        </div>
        <div class='text-center' style='margin-top: 5%;'>
            <button type="submit" class="btn btn-dark">Envoyer</button>
        </div>
    </div>
    <?php include('Footer.php') ?>
    </body>
</html>