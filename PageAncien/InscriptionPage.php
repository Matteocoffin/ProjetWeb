<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
        <form>
            <div class='container' style='margin-top: 5%;'>
                <h1>Formulaire d'inscription :</h1>
                <div class="row" style='margin-top: 5%;'>
                    <div class="col-md-2">
                        <label for="Login"><B>&nbsp;Nom de compte :</B></label>
                        <input type="text" class="form-control" id="Login" placeholder="ex : CMattéo">
                    </div>
                    <div class="col-md-2">
                        <label for="Password"><B>&nbsp;Mot de passe :</B></label>
                        <input type="password" class="form-control" id="Password">
                    </div>    
                    <div class="col-md-2">
                        <label for="LastName"><B>&nbsp;Nom :</B></label>
                        <input type="text" class="form-control" id="LastName" placeholder="ex : Coffin">
                    </div>
                    <div class="col-md-2">
                        <label for="Name"><B>&nbsp;Prénom :</B></label>
                        <input type="text" class="form-control" id="Name" placeholder="ex : Mattéo">
                    </div>
                </div>
                <div class="row" style='margin-top: 2%;'>   
                    <div class="col-md-3">
                        <label for="ChoixCentre"><B>&nbsp;Centre :</B></label>
                        <select class="form-select" aria-label="Default select example" id="ChoixCentre">
                            <option selected>Centre --> choix</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="ChoixPromotion"><B>&nbsp;Promotion :</B></label>
                        <select class="form-select" aria-label="Default select example" id="ChoixPromotion">
                            <option selected>Promotion --> choix</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                <div class="row" style='margin-top: 2%;'>
                    <div class="col-md-3">
                        <label for="Email"><B>&nbsp;Email :</B></label>
                        <input type="email" class="form-control" id="Email" placeholder="ex : mattéo.coffin@viacesi.fr">
                    </div>
                    <div class="col-md-3 text-center" style='margin-top: 1.7%;'>
                        <button type="button" class="btn btn-dark">S'inscrire</button>
                    </div>
                </div>
            </div>
        </form>
    <?php include('Footer.php') ?>
    </body>
</html>