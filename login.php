<?php 

require_once 'login.php';
$error = null;
if (isset($_POST) && !empty($_POST)) {
  //_dump($_POST);
  echo $_POST['email'].'<br>';
  echo $_POST['password'].'<br>';
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
    <link href="css/login.css" rel="stylesheet" />
    <title>Se connecter</title>
  </head>
  <body>
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
                <a class="nav-link active text-white" aria-current="page" href="register.php">Créer un compte</a>
              </li>
              <li class="nav-item">
                                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark btn-rounded position-absolute" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Se connecter
                </button>
              </li>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
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
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="nom@example.com" value="" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" value="" required>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme" >
                <label class="form-check-label" for="rememberme">Se souvenir de moi</label>
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
