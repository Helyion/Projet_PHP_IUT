<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/medecin/afficherstat.php');
?>


<!DOCTYPE html>
<html lang="fr">
<?php include 'inclure/head.php'; ?>

<body>
    <?php include 'inclure/navbar.php'?>
    <div class="container">
    <h1>Les Statistiques du cabinet médical</h1>
        <?php 
            while($Medecin = $afficherHeureMedecin->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        NOM : <?= $Medecin[0]; ?>
                        <br>
                        PRENOM : <?= $Medecin[1]; ?>
                        <br>
                        Nombres de minutes de consultation : <?= $Medecin[3]; ?>
                        <br>
                        <?php 
                        $heures = (int)$Medecin[3]/60;?>
                        Nombres d'heures de consultation : <?= $heures; ?>
                    </div>
                </div>
                <br>
                <?php
            }
        ?> 
        </div>

            <?php
            $nbHInf25 =$affcherHommeMoinsvc ->fetch();
            $nbFInf25 =$affcherFemmeMoinsvc ->fetch();
            $nbHSup25 =$affcherHommePlusvc ->fetch();
            $nbFSup25 =$affcherFemmePlussvc ->fetch();
            $nbHSup50 =$affcherHommePlusca ->fetch();
            $nbFSup50 =$affcherFemmePlusca ->fetch();
            ?>
<br>
<div class="container" >
    <table class="table table-light" id="tab">
    <thead class="thead-light">
        <tr>
        <th scope="col">Tranche D'âge</th>
        <th scope="col">Nombres Hommes</th>
        <th scope="col">Nombres Femmes</th>
        </tr>
    </thead>

    <tbody>
        <tr>
        <th scope="row">Moins de 25 ans</th>
        <td><?= $nbHInf25['nb']?></td>
        <td><?= $nbFInf25['nb']?></td>
        </tr>
        <tr>
        <th scope="row">Entre 25 et 50 ans</th>
        <td><?= $nbHSup25['nb']?></td>
        <td><?= $nbFSup25['nb']?></td>
        </tr>
        <tr>
        <th scope="row">Plus de 50 ans</th>
        <td><?= $nbHSup50['nb']?></td>
        <td><?= $nbFSup50['nb']?></td>
        </tr>
    </tbody>
    </table> 
</div>
 </div>        
    
</body>
</html>