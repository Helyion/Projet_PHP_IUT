<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/usager/afficherUsagerAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body>
    <?php include 'inclure/navbar.php'?>

    <div class="container">
    <h1>Les Usagers du cabinet médical</h1>

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="recherche" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                    <a href ="ajouterUsager.php" class="btn btn-primary active">Ajouter un usager</a>
                    
                </div>

            </div>
        </form>

        <br>

        <?php 
            while($usager = $afficherUsager->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <b>NOM :</b> <?= $usager['nom']; ?>
                        <br>
                        <b>PRENOM :</b> <?= $usager['prenom']; ?>
                        <br>
                        <b>DATE DE NAISSANCE :</b> <?= $usager['date_naiss']; ?>
                    </div>
                    <div class="cart-footer">
                        <a href="modifier_usager.php?id=<?= $usager['id_usager']; ?>" class="btn btn-warning" id ="cent">Modifier les informations</a>
                        <a href="actions/usager/supprimerUsagerAction.php?id=<?= $usager['id_usager']; ?>" class="btn btn-danger" id ="cent">Supprimer usager</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?> 
</div>
    
</body>
</html>