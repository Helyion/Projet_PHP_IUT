<?php
//Vérifie si l'utilisateur est authen
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../connection.php');
}

require('../database.php');

//Vérifie si l'id est rentrer en paramètre dans l'url
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //id de lmedecin en paramètre
    $idmedecin=$_GET['id'];

    //suprimer le medecin en fonction de l'id rentrer en param
    $supprimermedecin = $bdd->prepare('DELETE FROM medecin WHERE id_medecin = ?');
    $req = $supprimermedecin->execute(array($idmedecin));

    //supprime le medecin referent aux usagers
    $suprimref = $bdd ->prepare('DELETE id_medecin FROM usager WHERE id_medecin = ?');
    $suprimref ->execute(array($idmedecin));

    if (!$req){
        echo "Erreur DELETE execute";
    } else {
        //redirige l'utilisateur vers les infos des medecins
        header('Location: ../../affichermedecin.php');
    }
    
}else{
    echo "Pas de Supression possible";
}