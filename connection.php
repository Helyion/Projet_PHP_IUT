<?php require 'actions/utilisateur/connectionAction.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body class="bl">

</br></br>
     <!-- J'ai fait une application qui permet d'avoir plusieurs comptes utilisateurs (secrétaires) qui sont stocké dans la base de données -->
     <!-- Par exemple j'ai un utilisateur Admin avec comme mots de passe Admin et comme mdp hasher : $2y$10$78/LxjSipaBYZARSw7IJBORUwFEFgcp7SzpTL02MYTn65lxp3dp2G -->
     <!-- Le secrétaire doit rentrer son mot de passe et son identifiant, le code vérifie que le login et le mdp correspondent bien au mot de passe hacher dans la base de données -->
     <!-- Si c'est le cas le secrétaire peut accéder au site.  -->
        <form class="container1" method="POST" id ="con">
            <?php if (isset($errorMsg)) {echo '<p>' .$errorMsg. '</P>';} ?>

            <div class ="mb-3">
                    <label class="form-label"> Pseudo</label>
                    <input type="text" class = "form-control" name ="pseudo">
            </div>
            <div class ="mb-4">
                    <label class="form-label"> Mot de passe</label>
                    <input type="password" class = "form-control" name ="mdp">
            </div>
            <button type ="submit" class="btn btn-primary" name="validate"> Se connecter</button>
            <br><br>
        </from>
</body>
</html>