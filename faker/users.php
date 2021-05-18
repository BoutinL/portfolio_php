<?php

require_once '../vendor/autoload.php';
require_once '../vendor/fzaninotto/faker/src/autoload.php';
require_once '../config/configuration.php';
require_once '../config/connect.php';

function removeSpecialChar(string $text): string {
  return preg_replace('/[^A-Za-z0-9\-]/', '', $text);
}

$number = isset($_GET['faker']) && is_numeric($_GET['faker']) && $_GET['faker'] > 0 ? $_GET['faker'] : null;

if (null !== $number) {
  //echo $number;
  for ($i = 1; $i <= $number; ++$i) {
    $faker = Faker\Factory::create('fr_FR');
    $email = removeSpecialChar(strtolower($faker->lastName.rand().$faker->firstName));
    $pseudo = $faker->name;
    $password = '@@__'.$email;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $email = $email.'@'.$faker->freeEmailDomain;
    $roles = json_encode(['user']);
    $sql = "INSERT INTO users(email,password,pseudo,roles) VALUES ('$email','$password','$pseudo','$roles')";

    if($mysql->query($sql) === true ){
      echo '<h4>Profil '.$i.'</h4>';
      echo '<strong>Pseudo:</strong> '.$faker->name.'<br>';
      echo '<strong>Email:</strong> '.$email.'@'.$faker->freeEmailDomain.'<br>';
      echo '<strong>Password:</strong> '.$password.'<br>';
      echo '<strong>Password Hash: </strong> '.$password_hash.'<br>';
      echo '<br><br>';
    }
  }
}

?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Faker Users</title>
  </head>
  <body>
   
   <h1>Faker users</h1>

   <form>
  <div>
    <label for="faker">Nombre de fake users à générer:</label>
    <input type="number"  id="faker" name="faker" min="1">
  </div>
  <button type="submit" class="btn btn-primary">Confirmer</button>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>