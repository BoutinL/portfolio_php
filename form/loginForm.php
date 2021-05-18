<?php

$error = null;
if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $sql = 'SELECT * FROM users WHERE email="'.$_POST['email'].'" LIMIT 1';
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            //echo _dump($result->fetch_assoc());
            $users = $result->fetch_assoc();
            if (password_verify($_POST['password'], $users['password']) === true) {
                $_SESSION['msg-flash'] = 'Salut '.$users['email'];
                $_SESSION['users'] = $users;
                redirectToRoute('index.php');
            }
        } 
        $error = 'Pseudo ou mot de passe incorrect !!';
        /* Libération du jeu de résultats */
        $result->close();
    }
}