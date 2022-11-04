<?php
require ('actions/database.php');

//Récupère les medecins qui ont des rdv et fait la somme de toutes les durées de leurs consultations
$afficherHeureMedecin = $bdd->query('SELECT m.nom,m.prenom, rdv.id_medecin , sum(duree) FROM medecin as m, rdv WHERE m.id_medecin = rdv.id_medecin group by m.nom, m.prenom, rdv.id_medecin ');


//Compte le nombres d'hommes de moins de 25 ans 
$affcherHommeMoinsvc = $bdd->query ('SELECT count(*) as nb from usager where civilite = "Homme" AND date_naiss BETWEEN "1997-01-01" AND "2022-01-01";');

//Compte le nombres de femmes de moins de 25 ans 
$affcherFemmeMoinsvc = $bdd->query ('SELECT count(*) as nb from usager where civilite = "Femme" AND date_naiss BETWEEN "1997-01-01" AND "2022-01-01";');

//Compte le nombres d'hommes entre 25 et 50 ans
$affcherHommePlusvc = $bdd->query ('SELECT count(*) as nb from usager where civilite = "Homme" AND date_naiss BETWEEN "1972-01-01" AND "1997-01-01";');

//Compte le nombres de femmes entre 25 et 50 ans  
$affcherFemmePlussvc = $bdd->query ('SELECT count(*) as nb from usager where civilite = "Femme" AND date_naiss BETWEEN "1972-01-01" AND "1997-01-01";');

//Compte le nombres d'hommes de plus de 50 ans 
$affcherHommePlusca = $bdd->query ('SELECT count(*) as nb from usager where civilite = "Homme" AND date_naiss < "1972-01-01";');

//Compte le nombres de femmes de plus de 50 ans 
$affcherFemmePlusca = $bdd->query ('SELECT count(*) as nb from usager where civilite = "Femme" AND date_naiss < "1972-01-01" ;');