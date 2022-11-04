<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/usager/infoUsagerAction.php');
    require('actions/usager/modifierUsagerAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>
<body class="bl">
    <?php include 'inclure/navbar.php'; ?>

    <br><br>
    <div class="container">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <?php 
            if(isset($usagerInfo)){ 
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label  class="form-label">Modifier le nom</label>
                        <input type="text" class="form-control" name="nom" value="<?= $usager_nom; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier le prenom</label>
                        <input type="text" class="form-control" name="prenom" value="<?=  $usager_prenom; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier la civilité</label>
                        <input type="text" class="form-control" name="civilite" value="<?= $usager_civilite; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier l'adresse</label>
                        <input type="text" class="form-control" name="adresse" value="<?= $usager_adresse; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier le code postal</label>
                        <input type="text" class="form-control" name="cdp" value="<?= $usager_cdp; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier la Ville</label>
                        <input type="text" class="form-control" name="ville" value="<?= $usager_ville; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier lieu de naissance</label>
                        <input type="text" class="form-control" name="lieu_naiss" value="<?= $usager_lieu_naiss; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier le numéro de secu</label>
                        <input type="text" class="form-control" name="num_secu" value="<?= $usager_num_secu; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier la date de naissance</label>
                        <input type="text" class="form-control" name="date_naiss" value="<?= $usager_date_naiss; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary" name="validate">Modifier usager</button>
                </form>
                <?php
            }
           
        ?>

    </div>
</body>
</html>