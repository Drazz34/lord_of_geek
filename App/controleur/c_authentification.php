<?php

include 'App/modele/M_Client.php';

switch ($action) {

    case 'loginClient':
        $identifiant = filter_input(INPUT_POST, 'identifiant');
        $password = filter_input(INPUT_POST, 'password');
        $client = M_Client::trouverClientParIdentifiantEtMDP($identifiant, $password);
       
        if (!$client) {
            afficheMessage("Vous devez vous enregistrer sur la page 'Inscription', merci !");
        } else {
            $_SESSION['client'] = $client;
        }
        break;

    case 'logoutClient':
        unset($_SESSION['client']);
        header('Location: index.php');
        die();
        break;
}