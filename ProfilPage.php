<?php include('Bootstrap.php') ?>


<!DOCTYPE html>
<html>
    <body>
    <?php include('navbar.php') ?>
    <div class="container">
        <div class="row">
        <div class="col-md-1"><i class="fas fa-user fa-5x" style='margin-top:70%;'></i></div>
        <div class="col-md-3" style='margin-left:5%;'>
            <form>
                    <div class="form-group">
                        <label for="Nom">Nom</label>
                        <input type="text" class="form-control" id="Nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label for="Prenom">Prenom</label>
                        <input type="text" class="form-control" id="Prenom" placeholder="Prenom">
                    </div>
                    <div class="form-group">
                        <label for="Login">Login</label>
                        <input type="text" class="form-control" id="Login" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" id="Email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="Password" class="form-control" id="Password" placeholder="Password">
                    </div>
                    <div class="form-group" style='margin-top:5%; margin-left:30%;'>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
            </form>
        </div>
        <div class="col-md-3" style='margin-left:15%; margin-top:5%;'>
            <ul class="list-group">
                <li class="list-group-item active">Vos droits</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
        </div>
    </div>
    <form>
        <div class="container" style='margin-top:2%;'>
            <div class="row">
                <div class="col-md-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">*CV...</label>
                    </div>
                </div>
                <div class="col-md-3" style='margin-left:5%;'>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">*Lettre de motivation ...</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group" style='margin-left:25.5%;'>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
    <?php include('Footer.php') ?>
    </body>
</html>