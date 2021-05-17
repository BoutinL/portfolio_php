<?php 

require_once 'config/connect.php';
require_once 'form/registerForm.php';

$error = null;

if (isset($_POST) AND !empty($_POST)) {

  $error = [];

  if (empty($_POST['password']) AND $_POST['password'] !== $_POST['passwordb']) {
    $error['password'] = 'Mot de passes non indentiques !';
  }

  if (empty($_POST['email']) AND $_POST['email'] !== $_POST['emailb'] AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    $error['email'] = 'Emails non indentiques !';
  }

  if (strlen($_POST['password']) < 3 AND strlen($_POST['password']) > 30) {
  $error['passwprd'] = 'Votre mot de passe doit comporter minimum 3 caracrère et 30 maximum';
  }

  if (empty($error)) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $email = $_POST['email'];
      $roles = json_encode(['user']);
      $sql = "INSERT INTO users(email,password) VALUES ('$email','$password')";
      if ($mysqli->query($sql) === true) {
          $_SESSION['msg-flash'] = 'Votre compte à été créer avec succès !!';
          redirectToRoute('login.php');
      } else {
          $error = 'Une erreur est survenue, compte non créer !!';
      }
  }
}

?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="css/register.css" rel="stylesheet" />
    <title>Créer un compte</title>
  </head>

  <body <?= $error !== null ? 'data-error="'.$error.'"' : ''; ?>>
  <script>
      if (typeof($('body').data('error')) != 'undefined') {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
          keyboard: false
        });
        myModal.toggle();
      }
    </script>
    <header id="header">
      <nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark ">
        <div class="container-fluid">
          
          <a class="navbar-brand text-white" href="index.php"><b>Accueil</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="about.php">A propos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="login.php">Se connecter</a>
              </li>
              <li class="nav-item">
                                <!-- Button modal -->
                <button type="button" class="btn btn-dark btn-rounded position-absolute" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Créer un compte
                </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>


    <!-- Modal -->
    <?php
      if ($error !== null) {
        echo '<p style="text-align:center;color:red">'.$error.'</p>';
      }
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content border-3 border-info rounded">
          <div class="modal-header">
            <div class="imgcontainer">
              <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
              <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
            <form method="post">
              <div class="mb-3">
                <label for="InputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="InputEmail"  name="email" placeholder="nom@example.com" required>
              </div>
              <div class="mb-3">
                <label for="InputEmailb" class="form-label"> Confirmation de l'Email</label>
                <input type="email" class="form-control" id="InputEmailb"  name="emailb" placeholder="nom@example.com" required>
              </div>
              <div class="mb-3">  
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="passwordb" class="form-label">Confirmation mot de passe</label>
                <input type="password" class="form-control" id="passwordb" name="passwordb" required>
              </div>
                <button type="submit" class="btn btn-dark btn-rounded position-absolute bottom-10 start-50 translate-middle-x"> Valider </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>