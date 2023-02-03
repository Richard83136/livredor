<?php
session_start();
include('connect.php');
include('header.php');

?>
<body class="page">
<?php

    if (isset($_SESSION['login']) == TRUE) { ?>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  
    <a class="navbar-brand" href="#">Site L D OR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active text-dark" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="profil.php">Votre profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="commentaire.php"> Commentaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" aria-current="page" href="livre-or.php">Livre d'or</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="deconnexion.php">Déconnexion</a>
        </li>
        </ul>
    </div>
  </nav>
  </div>

  <?php
        echo '<h1>   
        Bienvenue '.$_SESSION['login'].'! </h1>';?>
        <div class="texte">
          <p style="font-size:30px; color:black;">Vous pouvez laisser des commentaires sur notre site</p>
          <?php
          if ($_SESSION['login']=='admin') {?>
            <button class="modifadmin btn btn-success"><a href="modifier.php">Modifier les commentaires</a></button><?php
            
          }?>
        </div><?php

         } else {?>
     <div class="container-fluid">
         <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  
    <a class="navbar-brand" href="#">Site L D OR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <!--<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="livre-or.php">Livre d'or</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link text-dark" href="inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="connexion.php">Connexion</a>
        </li>
        
        </ul>
    </div>
  
</nav>
      
        <?php
  }
  ?>
  <div style="height:100vh;"></div>
</div>
<?php
include('footer.php');
?>