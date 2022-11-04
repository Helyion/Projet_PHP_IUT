<?php
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['civilite'])){

        //Les données à faire passer dans la requête
        $new_medecin_nom = htmlspecialchars($_POST['nom']);
        $new_medecin_prenom = htmlspecialchars($_POST['prenom']);
        $new_medecin_civilite = htmlspecialchars($_POST['civilite']);
    
        $id = $_GET['id'];

        //Modifier les informations de la medecin qui possède l'id rentré en paramètre dans l'URL
        $editmedecinOnWebsite = $bdd->prepare('UPDATE medecin SET nom = ?, prenom = ?, civilite = ? WHERE id_medecin = ?');
        $req = $editmedecinOnWebsite->execute(array($new_medecin_nom, $new_medecin_prenom, $new_medecin_civilite, $id));
        if (!$req){
            echo "Erreur UPDATE execute";
        } else  {
            //Redirection vers la page d'affichage des medecins de l'utilisateur
            header('Location: affichermedecin.php');
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}