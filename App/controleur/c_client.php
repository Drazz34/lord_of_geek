<?php

include 'App/modele/M_Client.php';

switch ($action) {
    case 'creerClient' :
        $identifiant = filter_input(INPUT_POST, 'identifiant');
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $ville = filter_input(INPUT_POST, 'ville');
        $cp = filter_input(INPUT_POST, 'cp');
        $rue = filter_input(INPUT_POST, 'rue');
        $mail = filter_input(INPUT_POST, 'mail');
        $password = filter_input(INPUT_POST, 'password');
        $erreurs = M_Client::creerClient($identifiant, $password, $nom, $prenom, $rue, $cp, $ville, $mail);
       
      
        if ($erreurs) {
            afficheErreurs($erreurs);
        } else {
            afficheMessage("Vous êtes bien inscrit, félicitations !");
        }

        break;

    case 'voirClient':
        $id = filter_input(INPUT_GET, 'id');
        $client = M_Client::trouverClientParId($id);
        break;


    default:
        $client = [];
        break;
}