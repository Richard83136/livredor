<?php
session_start();
include('connect.php');
include('header.php');

?>
<?php

    if (isset($_SESSION['admin']) == TRUE) {?> 
    
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
          <a class="nav-link" href="commentaire.php"> Commentaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deconnexion.php">Déconnexion</a>
        </li>
        </ul>
    </div>
  </div>
</nav>
       <?php
         } else {
      header('location:index.php');
  }


$login_sess = $_SESSION['login'];
$req = $pdo->prepare("SELECT *  FROM utilisateurs WHERE login= '$login_sess'");
$req->execute();
$result = $req->fetchAll();
$login =$result[0][1];
$password =$result[0][2];

if (isset($_POST['submit'])) {

    $logins = $_POST['login'];
    $passwords = $_POST['password'];

    if ($logins != 'admin') {
        $requete = $pdo->query("UPDATE utilisateurs SET login = '$logins' ,  password = '$passwords'  WHERE login = '$login_sess'");
        $_SESSION['login'] = $logins ;
          header('location:index.php');
    }
    die('pour plus de sécurité si vous modifier le login modifier le mot de passe également');
}
?>

        <div style="height:100vh;">   
        <div class="formu"  > 
            
            <form method="post">
                <table >
                    <thead>
                    <tr>
                        <th>Login</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="login" value="<?php echo $login; ?>"></td>
                        <td><input type="password" name="password" value="<?php echo $password; ?>"></td>
                    </tr>
                </tbody>
                </table><br>
                <button class="btn btn-success d-block mx-auto" name="submit">Modifier</button>
            </form>
        </div>
        </div>   
    <?php
    include('footer.php');
    ?>    
  
</body>

</html>