<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/consultation/infoConsultation.php');
    require('actions/consultation/modifierConsultationAction.php');
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
            if(isset($consultationInfo)){ 
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label  class="form-label">Modifier la durée de la consultation</label>
                        <input type="text" class="form-control" name="duree" value="<?= $consultation_duree; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Modifier la date de la consultation</label>
                        <input type="datetime-local" class="form-control" name="date" value="<?= $consultation_date; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary" name="validate">Modifier la consultation</button>
                </form>
                <?php
            }
        ?>

    </div>
</body>
</html>