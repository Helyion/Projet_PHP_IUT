<?php

require('actions/database.php');

//Vérifier si l'id de l'usager est bien passé en paramètre dans l'URL
//Vérifie si l'id du medecin et la date du rdv est rentrer en paramètre dans l'url
if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['date']) AND !empty($_GET['date'])){

    //id du medecin en paramètre
    $idmedecin=$_GET['id'];
    $date = $_GET['date'];


    //Vérifier si la consultation existe 
    $verifierConsultationExiste = $bdd->prepare('SELECT * FROM rdv WHERE id_medecin = ? AND date_rdv = ? ');
    $req = $verifierConsultationExiste->execute(array($idmedecin,$date));
    if (!$req){
        echo "Erreur SELECT execute";
    }
    if($verifierConsultationExiste->rowCount() > 0){

        //Récupérer les données de la consultation
        $consultationInfo = $verifierConsultationExiste->fetch();
            $consultation_duree = $consultationInfo['duree'];
            $consultation_medecin = $consultationInfo['id_medecin'];
            $consultation_date = $consultationInfo['date_rdv'];
            $consultation_usager = $consultationInfo['id_usager'];
           
    }else{
        $errorMsg = "Erreur la consultation  n'existe pas";
    }

}else{
    $errorMsg = "Erreur ID ou DATE pas rentrer";
}