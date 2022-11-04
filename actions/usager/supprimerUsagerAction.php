<?php
//Vérifie si l'utilisateur est authen
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../connection.php');
}

require('../database.php');

//Vérifie si l'id est rentrer en paramètre dans l'url
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //id de lusager en paramètre
    $idusager=$_GET['id'];

    //suprimer lusager en fonction de l'id rentrer en param
    $supprimerUsager = $bdd->prepare('DELETE FROM usager WHERE id_usager = ?');
    $req = $supprimerUsager->execute(array($idusager));
    if (!$req){
        echo "Erreur DELETE execute";
    } else{
        //redirige l'utilisateur vers les infos des usagers
        header('Location: ../../afficherUsager.php');
    }
    
}else{
    echo "Pas de Supression possible";
}