<?php

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