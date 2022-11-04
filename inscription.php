<?php require('actions/utilisateur/inscriptionAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inclure/head.php'; ?>
<body>
    <!-- J'ai fait une application qui permet d'avoir plusieurs comptes utilisateurs (secrétaires) qui sont stocké dans la base de données -->
    <br><br>
    <form class="container" method="POST">

        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
        <br><br>
        <a href="connection.php"><p>J'ai déjà un compte, je me connecte</p></a>
   </form>

</body>
</html>