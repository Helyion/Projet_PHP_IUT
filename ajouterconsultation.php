<?php require('actions/utilisateur/securiteAction.php');?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<?php include 'inclure/head.php'; ?>
	
	<body class="bl">
	<?php include 'inclure/navbar.php'; ?>
	<div class="container">
        <br/>
		<fieldset>
			<legend>Saisie d'une Consultation</legend>
			<br><br>
			<form action="ajouterconsultation.php" method="POST">
				<p>NOM  <input type="text" name="nom_u" required /></p>
				<p>PRENOM <input type="text" name="prenom_u" required /></p>
				<p>NOM MEDECIN <input type="text" name="nom_m" required /></p>
                <p>PRENOM MEDECIN <input type="text" name="prenom_m" required /></p>
                <p>DATE <input type="datetime-local" name="dateh" required /></p>
                <p>DUREE <input type="text" name="duree" required /></p>
				<p>
					<input class="btn btn-danger" type="reset" name="reset" value="Reinitialiser ">
					<input class="btn btn-success" type="submit" name="save" value="Ajouter">
				</p>
			</form>
		</fieldset>

		<?php 
		require ('actions/database.php');
			if(isset($_POST['duree'] )){
				$nom_u = htmlspecialchars($_POST['nom_u']);
				$prenom_u = htmlspecialchars($_POST['prenom_u']);
				$nom_m =htmlspecialchars($_POST['nom_m']);
                $prenom_m = htmlspecialchars($_POST['prenom_m']);
				$dateh = $_POST['dateh'];
				$duree = htmlspecialchars($_POST['duree']);
				
				//Vérifie si l'usager existe
				$usagerExiste = $bdd->prepare('SELECT num_secu, nom, prenom, id_usager FROM usager WHERE nom = ? AND prenom = ? ');
				$usagerExiste ->execute(array($nom_u,$prenom_u));

				
				if($usagerExiste->rowCount() !==0){
					//Si oui on vérifie que le médecin existe
					$MedecinExiste = $bdd->prepare('SELECT nom, prenom, id_medecin FROM medecin WHERE nom =? AND prenom = ?');
					$MedecinExiste ->execute(array($nom_m,$prenom_m));

					if($MedecinExiste ->rowCount() !== 0){
						//On vérifie que le medecin soit libre
						$consultationExiste = $bdd->prepare('SELECT m.nom, m.prenom, rdv.date_rdv
                                                    		 FROM rdv, medecin as m
                                                    		 WHERE rdv.id_medecin = m.id_medecin
                                                     		 AND m.nom = ?
                                                    		 AND m.prenom = ?
                                                    		 AND rdv.date_rdv = ?');
						$consultationExiste ->execute(array($nom_m,$prenom_m,$dateh));
						if($consultationExiste ->rowCount() == 0){
							//On ajoute la consultation
							$medecin = $MedecinExiste->fetch();
							$usager = $usagerExiste->fetch();

							$insererConsultation = $bdd->prepare('INSERT INTO rdv(id_medecin, date_rdv, duree, id_usager) VALUES (?, ?, ?, ?)');
							$insererConsultation ->execute(array($medecin['id_medecin'],$dateh,$duree,$usager['id_usager']));

						}else{
							echo "Ce medecin n'est pas disponible pour la période demmander";
						}

					}else{
						echo "Le médecin n'éxiste pas dans la BDD";
					}

				}else{
					echo "l'usager n'existe pas dans la BDD";
				}
			}else {
				echo "Veillez remplir les champs du formulaire SVP";
			}	 
		?>
		</div>
	</body>
</html>
