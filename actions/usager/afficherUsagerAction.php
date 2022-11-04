<?php
require ('actions/database.php');

//Récuperer Tous les usager par défaut sans recherche
$afficherUsager = $bdd->query('SELECT nom, prenom, date_naiss,id_usager FROM usager ORDER BY nom DESC');

//Vérifie si une recherche à été rentrée par l'utilisateur
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){

    //La recherche
    $usagerRecherche = $_GET['recherche'];

    //Récuperer les Usager qui conrespondent à la recherche
    $afficherUsager = $bdd->query('SELECT nom, prenom, date_naiss, id_usager FROM usager WHERE nom LIKE "%'.$usagerRecherche.'%" ORDER BY nom');
}