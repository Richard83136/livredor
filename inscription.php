<?php

include('connect.php');
include('header.php');


if (isset($_SESSION['login']) == TRUE) { ?>
  
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
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="livre-or.php">livre d'or</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profil.php">Ton profil</a>
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
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="livre-or.php">livre d'or</a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="connexion.php">Connection</a>
            </li>
            
            </ul>
        </div>
      </div>
    </nav>
    
          <?php
      }

if (isset($_POST['submit'])) {

    $login = htmlspecialchars($_POST['login']);
    $password = ($_POST['password']);
    $confirm_password = ($_POST['password_confirm']);

    if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['password_confirm'])) {


        $loginlenght = strlen($login);
        if ($loginlenght >= 2 && $loginlenght <= 18) {
            $getlogin = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = ?");
            $getlogin->execute(array($login));
            $logincount = $getlogin->rowCount();

            if ($logincount == 0) {
                if ($password == $confirm_password) {
                    $inserusers = $pdo->prepare("INSERT INTO utilisateurs ( login, password ) VALUES (?, ?)");
                    $inserusers->execute(array($login, $password ));
                    $reussi = "<br>Vous avez créer votre compte";
                    header('Location: ./connexion.php');
                } else {
                    $erreur = "<br>Vos mots de passe ne sont pas identiques";
                }
            } else {
                $erreur = "<br>Compte deja existant !";
            }
        } else {
            $erreur = "<br>Votre login n'est pas valide";
        }
    } else {
        $erreur = "<br>Veuillez remplir tout les champs !";
    }
}

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Inscription</title>
</head>
<div style="height:100vh;">
<div class="pageinscription">
    <header>
        <h1>Page d'inscription</h1>
    </header>
    <main>
        <div class="formu">
        <form action="" method="POST">
        <table>
            <tr>
                <td>Login</td>
                <td><input type="text" name="login" require></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="password" name="password" require></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="password" name="password_confirm" require></td>
            </tr>
        </table>
        </div><br>

            <?php
            if (isset($erreur)) { ?>

                <p class="error" style="font-family: Arial, Helvetica, sans-serif;color: white;font-size:30px; text-align:center;"><?php echo $erreur; ?></p>
            <?php
            } elseif (isset($reussi)) { ?>
                <p style="font-family: Arial, Helvetica, sans-serif;color: green; "><?php echo  $reussi; ?></p>
            <?php
            }
            ?>

            <div class="valider">
                <button type="submit" name="submit" class="btn btn-info">
                    S'inscrire
                </button>
            </div>

            
        </form>
    </main>
</div></div>
    <?php
    include('footer.php');
    ?>
</body>

</html>