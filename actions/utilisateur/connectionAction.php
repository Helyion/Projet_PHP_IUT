<?php
session_start();
require ('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){


    //Vérifie que les champs soit OK
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
       
        //Les données de l'utilisateur
        $utilisateur_pseudo = htmlspecialchars($_POST['pseudo']);
        $utilisateur_mdp = htmlspecialchars($_POST['mdp']);


        //Vérifie que l'utilisateur existe
        $RegardeutilisateurExiste = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo= ?');
        $req = $RegardeutilisateurExiste->execute(array($utilisateur_pseudo));
        if (!$req){
            echo "Erreur SELECT execute";
        }
        if($RegardeutilisateurExiste ->rowCount()>0){ 
            //Récuperer les données de l'utilisateur
            $utilisateurInfos= $RegardeutilisateurExiste->fetch();

            //Vérifie que le mot de passe est correct
            if(password_verify($utilisateur_mdp, $utilisateurInfos['mdp'])){

            //si le Nom et le num de sécu corresponde ->Ouverture de session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $utilisateurInfo['id'];
            $_SESSION['pseudo']= $utilisateurInfo['pseudo'];

             //Redirige l'utilisateur vers la page d'acceuil
             header('Location: index.php');
        }else{
            $errorMsg="Votre mot de passe est incorrect";
        }

        }else{
            $errorMsg ="Les champs rentrer sont pas correct";
        }
    }else{
        $errorMsg ="Les champs ne sont pas tous rentrer !!";
    }
}