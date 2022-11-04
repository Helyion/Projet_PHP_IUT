<?php
require ('actions/database.php');

//Récuperer Tous les consultation par défaut sans recherche
$afficherconsultation = $bdd->query('SELECT u.nom, u.prenom, date_rdv, m.nom, m.prenom, duree, rdv.id_medecin
                                     FROM rdv, medecin as m, usager as u 
                                     WHERE rdv.id_medecin = m.id_medecin
                                     AND rdv.id_usager = u.id_usager
                                     ORDER BY date_rdv DESC');

//Vérifie si une recherche à été rentrée par l'utilisateur
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){

    //La recherche
    $consultationRecherche = $_GET['recherche'];

    //Récuperer les consultation qui correspondent à la recherche
    $afficherconsultation = $bdd->query('SELECT u.nom, u.prenom, date_rdv, m.nom, m.prenom, duree, rdv.id_medecin
                                        FROM rdv, medecin as m, usager as u 
                                        WHERE rdv.id_medecin = m.id_medecin
                                        AND rdv.id_usager = u.id_usager
                                        AND m.nom LIKE "%'.$consultationRecherche.'%"
                                        ORDER BY date_rdv');
}