<?php

require('actions/database.php');

//Vérifier si l'id de l'usager est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idusager = $_GET['id'];

    //Vérifier si l'usager existe
    $verifierusagerexiste = $bdd->prepare('SELECT * FROM usager WHERE id_usager = ?');
    $req = $verifierusagerexiste->execute(array($idusager));
    if (!$req){
        echo "Erreur SELECT execute";
    }
    if($verifierusagerexiste->rowCount() > 0){

        //Récupérer les données de la usager
        $usagerInfo = $verifierusagerexiste->fetch();
            $usager_nom = $usagerInfo['nom'];
            $usager_prenom = $usagerInfo['prenom'];
            $usager_adresse = $usagerInfo['adresse'];
            $usager_civilite = $usagerInfo['civilite'];
            $usager_cdp = $usagerInfo['cdp'];
            $usager_ville = $usagerInfo['ville'];
            $usager_lieu_naiss = $usagerInfo['lieu_naiss'];
            $usager_num_secu = $usagerInfo['num_secu'];
            $usager_date_naiss = $usagerInfo['date_naiss'];


    }else{
        $errorMsg = "Erreur l'usage n'existe pas";
    }

}else{
    $errorMsg = "Erreur ID inexistant";
}