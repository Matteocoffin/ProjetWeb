<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
        <form>
            <div class='text-center' style='margin-top: 5%;'>
                <h1>Modifier les droits</h1>
            </div>
            <div class='container' style='margin-top: 5%;'>
                <div class="row justify-content-center">
                    <div class="col-md-1" style="background-color: #DDDDDD; padding: 1.5%;">
                        <label for="EnterID"><B>&nbsp;ID :</B></label>
                        <input type="text" class="form-control" id="EnterID">
                    </div>
                        <div class="col-md-3" style="background-color: #DDDDDD; padding: 1.5% 0 1.5% 1.5% ;">
                            <label for="ListeDroits"><B>&nbsp;Liste des droits :</B></label>
                            <div class="col-md-12" style="background-color: white; padding: 1%;">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="Droit1">
                                    <label class="form-check-label" for="Droit1">
                                     Consulter les stats des étudiants
                                    </label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="Droit2">
                                    <label class="form-check-label" for="Droit2">
                                      Créer une entreprise
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="background-color: #DDDDDD; padding: 1.5% 0;">
                            <br />
                            <div class="col-md-12" style="background-color: white; padding: 1%; ">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="Droit3">
                                    <label class="form-check-label" for="Droit3">
                                      Modifier une entreprise
                                    </label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="Droit4">
                                    <label class="form-check-label" for="Droit4">
                                      Evaluer une entreprise
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="background-color: #DDDDDD; padding:1.5% 1.5% 1.5% 0">
                            <br />
                            <div class="col-md-12" style="background-color: white; padding: 1%;">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="Droit5">
                                    <label class="form-check-label" for="Droit5">
                                     Supprimer une entreprise
                                    </label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="Droit6">
                                    <label class="form-check-label" for="Droit6">
                                       Consulter les stats des entreprises
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
        </form>
    <?php include('Footer.php') ?>
    </body>
</html>