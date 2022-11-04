<?php
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['duree']) AND !empty($_POST['date'])){

        //Les données à faire passer dans la requête
        $new_date_rdv = $_POST['date'];
        $new_duree_rdv = htmlspecialchars($_POST['duree']);
        
        $id = $_GET['id'];
        $date = $_GET['date'];

        //Modifier les informations du rdv avec comme medecin l'id rentré en paramètre dans l'URL
        $editConsultationOnWebsite = $bdd->prepare('UPDATE rdv SET duree = ?, date_rdv = ? WHERE id_medecin = ? AND date_rdv = ?');
        $req = $editConsultationOnWebsite->execute(array($new_duree_rdv,$new_date_rdv, $id, $date));
        if (!$req){
            echo "Erreur UPDATE execute";
        } else  {
            //Redirection vers la page d'affichage des medecins de l'utilisateur
            header('Location: afficherconsultation.php');
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}