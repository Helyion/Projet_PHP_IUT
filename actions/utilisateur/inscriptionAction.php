<?php
session_start();
require('actions/database.php');

//page facultative si l'on souhaite avoir plusieurs utilisateurs (secrétaires)

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'utilisateur a bien complété tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
        
        //Les données de l'utilisateur
        $utilisateur_pseudo = htmlspecialchars($_POST['pseudo']);
        $utilisateur_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Vérifier si l'utilisateur existe déjà sur le site
        $checkIfutilisateurAlreadyExists = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE pseudo = ?');
        $checkIfutilisateurAlreadyExists->execute(array($utilisateur_pseudo));

        if($checkIfutilisateurAlreadyExists->rowCount() == 0){
            
            //Insérer l'utilisateur dans la bdd
            $insertutilisateurOnWebsite = $bdd->prepare('INSERT INTO utilisateur(pseudo, mdp)VALUES(?, ?)');
            $insertutilisateurOnWebsite->execute(array($utilisateur_pseudo, $utilisateur_password));

            //Récupérer les informations de l'utilisateur
            $getInfosOfThisutilisateurReq = $bdd->prepare('SELECT pseudo, mdp FROM utilisateurs WHERE pseudo = ?');
            $getInfosOfThisutilisateurReq->execute(array( $utilisateur_pseudo));

            $utilisateursInfos = $getInfosOfThisutilisateurReq->fetch();

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $utilisateursInfos['id'];
            $_SESSION['pseudo'] = $utilisateursInfos['pseudo'];

            //Rediriger l'utilisateur vers la page d'accueil
            header('Location: index.php');

        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}