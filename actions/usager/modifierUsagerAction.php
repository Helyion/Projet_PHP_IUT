<?php
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse'])){

        //Les données à faire passer dans la requête
        $new_usager_nom = htmlspecialchars($_POST['nom']);
        $new_usager_prenom = htmlspecialchars($_POST['prenom']);
        $new_usager_civilite = htmlspecialchars($_POST['civilite']);
        $new_usager_adresse = htmlspecialchars($_POST['adresse']);
        $new_usager_cdp = htmlspecialchars($_POST['cdp']);
        $new_usager_ville = htmlspecialchars($_POST['ville']);
        $new_usager_lieu_naiss = htmlspecialchars($_POST['lieu_naiss']);
        $new_usager_num_secu = htmlspecialchars($_POST['num_secu']);
        $new_usager_date_naiss = date($_POST['date_naiss']);
        
        $id = $_GET['id'];

        //Modifier les informations de la usager qui possède l'id rentré en paramètre dans l'URL
        $editusagerOnWebsite = $bdd->prepare('UPDATE usager SET nom = ?, prenom = ?, civilite = ?, adresse = ?, cdp = ?, ville = ?, lieu_naiss = ?, num_secu = ?, date_naiss = ? WHERE id_usager = ?');
        $req = $editusagerOnWebsite->execute(array($new_usager_nom, $new_usager_prenom, $new_usager_civilite, $new_usager_adresse, $new_usager_cdp,$new_usager_ville,$new_usager_lieu_naiss,$new_usager_num_secu,$new_usager_date_naiss, $id));
        if (!$req){
            echo "Erreur UPDATE execute";
        } else{
            //Redirection vers la page d'affichage des usagers de l'utilisateur
            header('Location: afficherusager.php');
        }
        

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}