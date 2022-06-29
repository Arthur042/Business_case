<?php
    session_start();    // on crée une session
    session_destroy();  // on détruit la session

    setcookie('session', '', -1, "/");    // on supprime le cookie de session
    unset($_COOKIE['session']);            // on supprime la variable de session

    setcookie('isConnected', '', -1, "/");    // on supprime le cookie isConnected
    unset($_COOKIE['isConnected']);           // on supprime la variable isConnected

    setcookie('name', '', -1, "/");   // on supprime le cookie name
    unset($_COOKIE['name']);        // on supprime la variable name

    header('Location: ../index.php');   // on redirige l'utilisateur vers la page d'accueil
?>