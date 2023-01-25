<?php

include 'App/modele/M_Client.php';

switch ($action) {

    case 'loginClient':
        $identifiant = filter_input(INPUT_POST, 'identifiant');
        $password = filter_input(INPUT_POST, 'password');
        $client = M_Client::trouverClientParIdentifiantEtMDP($identifiant, $password);
       
        if (!$client) {
            afficheMessage("Vous devrez être enregistré");
        } else {
            $_SESSION['client'] = $client;
        }

        if(!empty($_SESSION['redirect'])){
            $redirect = $_SESSION['redirect'];
            header('Location: index.php?uc=' . $redirect['us'] . '&action=' . $redirect['action']);
            die();
        } else {
            header('Location: index.php');
            die();
        }

        break;

    case 'logoutClient':
        unset($_SESSION['client']);
        header('Location: index.php');
        die();
        break;
}