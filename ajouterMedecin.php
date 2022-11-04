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
			<legend>Saisie d'un Medecin</legend>
			<br><br>
			<form action="ajouterMedecin.php" method="POST">
				<p>NOM <input type="text" name="nom" required /></p>
				<p>PRENOM <input type="text" name="prenom" required /></p>
				<p>CIVILITE <input type="text" name="civilite" required /></p>
				<p>
					<input class="btn btn-danger" type="reset" name="reset" value="Reinitialiser ">
					<input class="btn btn-success" type="submit" name="save" value="Ajouter">
				</p>
			</form>
		</fieldset>

		<?php 
		require ('actions/database.php');
			if(isset($_POST['civilite'] )){
				$nom = htmlspecialchars($_POST['nom']);
				$prenom = htmlspecialchars($_POST['prenom']);
				$civilite =htmlspecialchars($_POST['civilite']);
				
				//Vérifie si le medecin existe dans la BDD
				$MedecinExiste = $bdd->prepare('SELECT nom, prenom FROM medecin WHERE nom =? AND prenom = ?');
				$req = $MedecinExiste ->execute(array($nom,$prenom));
				if (!$req){
					echo "Erreur SELECT execute";
				}

				if($MedecinExiste->rowCount() == 0){
					//inserer l'usager dans la bdd
					$insererMedecin = $bdd->prepare('INSERT INTO medecin(nom, prenom, civilite) VALUES (?, ?, ?)');
						if(!$insererMedecin){
							echo "Erreur prepare";
						}
					$req = $insererMedecin ->execute(array($nom,$prenom,$civilite));
					if (!$req){
						echo "Erreur SELECT execute";
					} else {
						echo "Bien ajouter";
					}
				}else{
				echo "Le medecin est déja dans la bdd";
				}
			}else {
				echo "Veillez remplir les champs du formulaire SVP";
			}	
		?>
		</div>
	</body>
</html>
