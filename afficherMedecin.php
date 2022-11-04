<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/medecin/afficherMedecinAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body>
    <?php include 'inclure/navbar.php'?>
    <div class="container">
    <h1>Les Medecins du cabinet médical</h1>

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="recherche" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                    <a href ="ajouterMedecin.php" class="btn btn-primary active">Ajouter un Medecin</a>
                    
                </div>

            </div>
        </form>

        <br>

        <?php 
            while($Medecin = $afficherMedecin->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                       <b>NOM : </b> <?= $Medecin['nom']; ?>
                        <br>
                        <b>PRENOM : </b> <?= $Medecin['prenom']; ?>
                        <br>
                        <b>Civilité :</b> <?= $Medecin['civilite']; ?>
                        <br>
                        <b>ID Médecin : </b> <?= $Medecin['id_medecin']; ?>
                    </div>
                    <div class="cart-footer">
                        <a href="modifier_medecin.php?id=<?= $Medecin['id_medecin']; ?>" class="btn btn-warning" id ="cent">Modifier les informations</a>
                        <a href="actions/medecin/supprimerMedecinAction.php?id=<?= $Medecin['id_medecin']; ?>" class="btn btn-danger" id ="cent">Supprimer Medecin</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?> 
</div>
    
</body>
</html>