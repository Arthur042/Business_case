<?php
    // on crée une session
        session_start();

    // création temporaire d'unutilisateur en dure pour tester la connexion
        $user = [
            'mail' => 'arthur.andre042@gmail.com',
            'password' => sha1('admin'),
            'name' => 'Arthur'
        ];


    // Si l'utilisateur a soumis le formulaire de connexion
    if(!empty($_POST['emailConnexion']) && !empty($_POST['password'])) {
        // on nettoye le mail
            $mail = filter_var($_POST['emailConnexion'], FILTER_SANITIZE_EMAIL);
        // on hache le mot de passe
            $password = sha1($_POST['password']);
            // on vérifie que le mail est valide
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    // on vérifie que les identifiants sont corrects
                        if ($mail === $user['mail'] && $password === $user['password']) {
                                // on définit la variable de session
                                    $_SESSION['isConnected'] = true;
                                    $_SESSION['name'] = $user['name'];
                            // on crée un cookie de session
                                setcookie('session', session_id(), time() + (86400 * 30), "/");
                                setcookie('isConnected', true, time() + (86400 * 30), "/");
                                setcookie('name', $user['name'], time() + (86400 * 30), "/");
                            // on redirige l'utilisateur vers la page d'accueil
                                header('Location: ../index.php');
                        } else {
                            // on redirige vers la page d'accueil 
                                header("Location: ../index.php");
                        }
                } else {
                    // on redirige vers la page d'accueil 
                        header("Location: ../index.php");
                }
    } else {
        // on redirige vers la page d'accueil 
            header("Location: ../index.php");
    }