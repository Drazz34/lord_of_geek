<?php

include "App/modele/M_Commande.php";
include "App/modele/M_Client.php";

// $commandesClient = [];

// if (!empty($clientSession)) {
//     $commandesClient = M_Commande::afficherCommandes($clientSession['id']);
// }

switch ($action) {
    case "changerProfil":
        $nom = filter_input(INPUT_POST, "nom");
        $prenom = filter_input(INPUT_POST, "prenom");
        $rue = filter_input(INPUT_POST, "rue");
        $cp = filter_input(INPUT_POST, "cp");
        $ville = filter_input(INPUT_POST, "ville");
        $mail = filter_input(INPUT_POST, "mail");
        $erreurs = M_Client::changerInfoClient($clientSession['id'], $nom, $prenom, $rue, $cp, $ville, $mail);

        if ($erreurs) {
            afficheErreurs($erreurs);
        } else {
            afficheMessage("Vos changements ont bien été enregistrés.");
        }

        $_SESSION['client'] = M_Client::trouverClientParId($clientSession['id']);

        header("Location: index.php?uc=compte");
        die();
        break;

    default:
        break;
}

