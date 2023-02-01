<?php

include 'App/modele/M_Client.php';

switch ($action) {

    case 'loginClient':
        $identifiant = filter_input(INPUT_POST, 'identifiant');
        $password = filter_input(INPUT_POST, 'password');
        $client = M_Client::trouverClientParIdentifiantEtMDP($identifiant, $password);
       
        if (!$client) {
            afficheErreur("Entrez votre identifiant et votre mot de passe ou enregistrez-vous sur la page 'Inscription', merci !");
        } else {
            $_SESSION['client'] = $client;
            supprimerPanier();
            header('Location: index.php');
        }
        break;

    case 'logoutClient':
        supprimerPanier();
        unset($_SESSION['client']);
        header('Location: index.php');
        die();
        break;
}