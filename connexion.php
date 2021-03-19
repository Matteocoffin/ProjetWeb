<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>

        <form>
            <div class='text-center' style='margin-top: 5%;'>
                <h1>Connexion</h1>
                <p>Veuillez entrer votre nom de compte et votre mot de passe ci-dessous</p> 
            </div>
            <div class="container" style='margin-top: 5%;'>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label for="Login"><B> Nom de compte :</B></label>
                        <input type="text" class="form-control" id="Login" placeholder="ex : CMattéo">
                    </div>
                    <div class="col-md-4">
                        <label for="Password"><B> Mot de passe :</B></label>
                        <input type="password" class="form-control" id="Password">
                    </div>    
                </div>
            </div>
            <div class="text-center" style='margin-top: 5%;'>
                <button type="button" class="btn btn-dark">Se connecter</button>
            </div>
        </form>
        <?php include('Footer.php') ?>
    </body>
</html>