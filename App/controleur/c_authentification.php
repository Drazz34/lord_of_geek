<?php

include 'App/modele/M_Client.php';

switch ($action) {

    case 'loginClient':
        $identifiant = filter_input(INPUT_POST, 'identifiant');
        $password = filter_input(INPUT_POST, 'password');
        $client = M_Client::trouverClientParIdentifiantEtMDP($identifiant, $password);
       
        if (!$client) {
            afficheMessage("Entrez votre identifiant et votre mot de passe ou enregistrez-vous sur la page 'Inscription', merci !");
        } else {
            $_SESSION['client'] = $client;
        }

        if (!empty($_SESSION['redirect'])) {
            $redirect = $_SESSION['redirect'];
            unset($_SESSION['redirect']);
            header('Location: index.php?uc=' . $redirect['uc'] . '&action=' . $redirect['action']);
            die();
        } else {
            header('Location: index.php');
            die();
        }
        break;

    case 'logoutClient':
        supprimerPanier();
        unset($_SESSION['client']);
        header('Location: index.php');
        die();
        break;
}