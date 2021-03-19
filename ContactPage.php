<?php include('Bootstrap.php') ?>

<!DOCTYPE html>
<html>
    <body> 
    <?php include('navbar.php') ?>

        <form>
            <div class='text-center' style='margin-top: 5%;'>
                <h1>Contactez-Nous</h1>
                <p>Remplissez le formulaire ci dessous pour nous contacter</p>
            </div>
            <div class="container" style='margin-top: 5%;'>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="LastName" placeholder="Nom">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="Name" placeholder="Prénom">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="Mail" placeholder="Email">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="Subject" placeholder="Sujet">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="Message" placeholder="Entre ton message ici">
                    </div>
                </div>
            </div>
            <div class="text-center" style='margin-top: 5%;'>
                <button type="button" class="btn btn-dark">Envoyer</button>
            </div>
        </form>
        <?php include('Footer.php') ?>
    </body>
</html>