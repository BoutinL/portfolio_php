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
    $error['password'] = 'Votre mot de passe doit comporter minimum 3 caracrère et 30 maximum';
    }

    if (strlen($_POST['pseudo']) < 3 AND strlen($_POST['pseudo']) > 30) {
      $error['pseudo'] = 'Votre pseudo doit comporter minimum 3 caracrère et 30 maximum';
      }
    if (preg_match(" \^[a-zA-Z0-9_-]{3,30}$\ ", $_POST['user_name'])) {
      //if (preg_match(" \^[a-zA-Z0-9_-'ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]{3,30}$\ ", $_POST['user_name'])) {
      $error['user_name'] = 'Votre pseudo dois comporter 3 caractères minimum et 30 maximum. des caratères de 0 à 9, des lettre minuscules ou majuscules, des tirets et underscores !';
    }

  if (empty($error)) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $email = $_POST['email'];
      $pseudo = $_POST['pseudo'];
      $roles = json_encode(['user']);

      $sql = "INSERT INTO users(email,password,pseudo,roles) VALUES ('$email','$password','$pseudo','$roles')";
      if ($mysqli->query($sql) === true) {
          $_SESSION['msg-flash'] = 'Votre compte à été créer avec succès !';
          redirectToRoute('login.php');
      } else {
          $error = 'Une erreur est survenue, compte non créer !';
      }
  }
}
