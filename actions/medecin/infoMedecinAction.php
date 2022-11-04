<?php

require('actions/database.php');

//Vérifier si l'id de l'medecin est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idmedecin = $_GET['id'];

    //Vérifier si le medecin existe
    $verifiermedecinexiste = $bdd->prepare('SELECT * FROM medecin WHERE id_medecin = ?');
    $req = $verifiermedecinexiste->execute(array($idmedecin));
    if (!$req){
        echo "Erreur SELECT execute";
    }
    if($verifiermedecinexiste->rowCount() > 0){

        //Récupérer les données du medecin
        $medecinInfo = $verifiermedecinexiste->fetch();
            $medecin_nom = $medecinInfo['nom'];
            $medecin_prenom = $medecinInfo['prenom'];
            $medecin_civilite = $medecinInfo['civilite'];
    }else{
        $errorMsg = "Erreur le medecin n'existe pas";
    }

}else{
    $errorMsg = "Erreur ID inexistant";
}