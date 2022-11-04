<?php
require ('actions/database.php');

//Récuperer Tous les Medecin par défaut sans recherche
$afficherMedecin = $bdd->query('SELECT nom, prenom, civilite, id_medecin FROM medecin ORDER BY nom DESC');

//Vérifie si une recherche à été rentrée par l'utilisateur
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){

    //La recherche
    $MedecinRecherche = $_GET['recherche'];

    //Récuperer les Medecin qui conrespondent à la recherche
    $afficherMedecin = $bdd->query('SELECT nom, prenom, civilite, id_medecin  FROM medecin WHERE nom LIKE "%'.$MedecinRecherche.'%" ORDER BY nom');
}