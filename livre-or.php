<?php
session_start();
include('connect.php');
include('header.php');


?>
<body class="pagelivreor">
<?php

    if (isset($_SESSION['login']) == TRUE) {?> 
    
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Site L D OR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profil.php">Ton profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="commentaire.php">Commentaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deconnexion.php">Déconnexion</a>
        </li>
        </ul>
    </div>
  </div>
</nav>
      <?php
         } else {?>
         <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Site L D OR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="connexion.php">Connexion</a>
        </li>
        
        </ul>
    </div>
  </div>
</nav>
      <?php
  }
  
  ?>   
  <?php

$req = $pdo->query("SELECT login,commentaire, date FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC ");
?>
<div style="height:100vh;">
    <h1>Les commentaires</h1><br><br>
    <table  class="formu ">
        
        <thead>
            <tr style="border:1px solid black;" >
                <th style="border:1px solid black;text-align:center;padding:2%;">Commentaires</th>
                <th style="border:1px solid black;text-align:center;">Posté par :</th>
                <th style="border:1px solid black;text-align:center;">Date :</th>
            </tr>
        </thead>
        <?php
        while($res = $req->fetch()){
        
        ?>
            <tbody >
                <tr>
                    <td style="border:1px solid black; text-align:center;min-width:300px;"><?php echo $res['commentaire'] ?></td>
                    <td style="border:1px solid black; text-align:center;min-width:150px"><?php echo  $res['login'] ?></td>
                    <td style="border:1px solid black; text-align:center;min-width:150px;"><?php echo $res['date'] ?></td>
                </tr>
            </tbody>
        <?php
        } 
        ?>
    </table>

      </div>
    <?php
         
         include('footer.php');
         
    ?>
    
</body>

</html>