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
			<legend>Saisie d'un nouvel usager</legend>
			<br><br>
			<form action="ajouterUsager.php" method="POST">
				<p>  NOM <input type="text" name="nom" required /></p>
				<p>  PRENOM <input type="text" name="prenom" required /></p>
				<p>  CIVILITE <input type="text" name="civilite" required /></p>
				<p>  ADRESSE <input type="text" name="adresse" required /></p>
				<p>  CODE POSTAL <input type="text" name="cdp" required /></p>
				<p>  VILLE <input type="text" name="ville" required /></p>
				<p>  LIEU DE NAISSANCE <input type="text" name="lieu_naiss" required /></p>
				<p>  DATE DE NAISSANCE <input type="date" name="date_naiss" required /></p>
				<p>  NUM SECURITE SOCIALE <input type="text" name="num_secu" required /></p>
				<p>  ID MEDECIN <input type="text" name="id_med" /></p>
				<p>
					<input class="btn btn-danger" type="reset" name="reset" value="Reinitialiser ">
					<input class="btn btn-success" type="submit" name="save" value="Ajouter">
				</p>
			</form>
		</fieldset>

		<?php 
		require ('actions/database.php');
			if(isset($_POST['num_secu'] )){
				$nom = htmlspecialchars($_POST['nom']);
				$prenom = htmlspecialchars($_POST['prenom']);
				$civilite =htmlspecialchars($_POST['civilite']);
				$adresse =htmlspecialchars($_POST['adresse']);
				$cdp =htmlspecialchars($_POST['cdp']);
				$ville =htmlspecialchars($_POST['ville']);
				$lieu_naiss =htmlspecialchars($_POST['lieu_naiss']);
				$date_naiss = $_POST['date_naiss'];
				$num_secu =htmlspecialchars($_POST['num_secu']);
				$id_med =htmlspecialchars($_POST['id_med']);

				//Vérifie si l'usager existe dans la BDD
				$UtilisateurExiste = $bdd->prepare('SELECT num_secu FROM usager WHERE num_secu =? ');
				$req = $UtilisateurExiste ->execute(array($num_secu));
				if (!$req){
					echo "Erreur SELECT execute";
				}

				if($UtilisateurExiste->rowCount() == 0){
						//inserer l'usager dans la bdd
						// Prend en compte si le medecin réferent est entrer ou pas 
						if(!empty($_POST['id_med'])){

							$insererUsager = $bdd->prepare('INSERT INTO usager(nom, prenom, civilite, adresse, cdp, ville, lieu_naiss, date_naiss, num_secu, id_medecin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)');
							$req = $insererUsager ->execute(array($nom,$prenom,$civilite,$adresse,$cdp,$ville,$lieu_naiss,$date_naiss,$num_secu,$id_med));
							if (!$req){
								echo "Erreur 1.1 SELECT execute";
							} else {
								echo "Bien ajouter"; 
							}
						}else{
							$insererUsager = $bdd->prepare('INSERT INTO usager(nom, prenom, civilite, adresse, cdp, ville, lieu_naiss, date_naiss, num_secu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
							$req = $insererUsager ->execute(array($nom,$prenom,$civilite,$adresse,$cdp,$ville,$lieu_naiss,$date_naiss,$num_secu));
							if (!$req){
								echo "Erreur 1.2 SELECT execute";
							} else {
								echo "Bien ajouter"; 
							}
						}
				}else{
					echo "usager déja dans la bdd";
					}
			}else {
				echo "Veillez remplir les champs du formulaire SVP";
			}	
		?>
		</div>
	</body>
</html>