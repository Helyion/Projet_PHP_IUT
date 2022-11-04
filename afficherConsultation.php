<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/consultation/afficherconsultationAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body>
    <?php include 'inclure/navbar.php'?>
    <div class="container">
    <h1>Les Consultations du cabinet médical</h1>

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="recherche" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                    <a href ="ajouterconsultation.php" class="btn btn-primary active">Ajouter un consultation</a>
                    
                </div>

            </div>
        </form>

        <br>

        <?php 
            while($consultation = $afficherconsultation->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <b>Nom :</b> <?= $consultation[0]; ?>
                        <b>Prenom :</b> <?= $consultation[1]; ?>
                        <br>
                        <b>Non Medecin :</b> <?= $consultation[3]; ?>
                        <b>Prenom Medecin :</b> <?= $consultation[4]; ?>
                        <br>
                        <b>Date :</b> <?= $consultation['date_rdv']; ?>
                        <br>
                        <b>Duree</b> : <?= $consultation['duree']; ?>
                    </div>
                    <div class="cart-footer">
                        <a href="modifier_consultation.php?date=<?= $consultation['date_rdv']; ?> &id= <?=$consultation[6]; ?>" class="btn btn-warning" id ="cent">Modifier les informations</a>
                        <a href="actions/consultation/supprimerConsultationAction.php?date=<?= $consultation['date_rdv']; ?> &id= <?=$consultation[6]; ?>" class="btn btn-danger" id="cent">Supprimer la consultation</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?> 
</div>
    
</body>
</html>