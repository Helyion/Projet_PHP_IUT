<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Gestion d'un cabinet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php 
          //si l'utilisateur est connecté il a accès au site
          if(isset($_SESSION['auth'])){
            ?>
            <li class="nav-item">
                <a class="nav-link" href="afficherUsager.php">Usagers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherMedecin.php">Médecins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherConsultation.php">Consultations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherStatistique.php">Statistiques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="actions/utilisateur/deconnexion.php">Déconnexion</a>
            </li>
            <?php
          }else{
            //sinon il est renvoyer sur la page de connection
            ?>
          <li class="nav-item">
            <a class="nav-link" href="connection.php">Se connecter</a>
          </li>
          <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>