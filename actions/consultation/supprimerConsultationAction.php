<?php
//Vérifie si l'utilisateur est authen
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../connection.php');
}

require('../database.php');

//Vérifie si l'id du medecin et la date du rdv est rentrer en paramètre dans l'url
if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['date']) AND !empty($_GET['date'])){

    //id du medecin en paramètre
    $idmedecin=$_GET['id'];
    $date = $_GET['date'];
    

    //suprimer la consultation en fonction de l'id rentrer en paramètre et de la date
    $supprimerconsultation = $bdd->prepare('DELETE  FROM rdv WHERE id_medecin = ? AND date_rdv = ?');
    $req = $supprimerconsultation->execute(array($idmedecin,$date));
    if (!$req){
        echo "Erreur DELETE execute";
    } else{
        //redirige l'utilisateur vers les infos des consultations
        header('Location: ../../afficherconsultation.php');
    }
    
}else{
    echo "Pas de Supression possible";
}