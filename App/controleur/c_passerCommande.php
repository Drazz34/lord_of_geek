<?php

include 'App/modele/M_Commande.php';

/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
switch ($action) {
    case 'passerCommande' :

        $n = nbJeuxDuPanier();
        if ($n > 0) {
            if (isset($idClient) && !empty($idClient)) {
                $lesIdJeu = getLesIdJeuxDuPanier();
                try {
                    M_Commande::creerCommande($idClient, $lesIdJeu);
                    afficheMessage("Commande passée avec succès !");
                    supprimerPanier();
                } catch (PDOException $e) {
                    afficheErreur("Erreur lors de la commande : " . $e->getMessage());
                }
            }
        } else {
            afficheMessage("Panier vide !!");
            $uc = '';
        }
        break;
//     case 'confirmerCommande' :
//         $id = filter_input(INPUT_POST, 'id');
//         $prenom = filter_input(INPUT_POST, 'prenom');
//         $rue = filter_input(INPUT_POST, 'rue');
//         $ville = filter_input(INPUT_POST, 'ville');
//         $cp = filter_input(INPUT_POST, 'cp');
//         $mail = filter_input(INPUT_POST, 'mail');
//         $errors = M_Commande::estValide($nom, $rue, $ville, $cp, $mail);
//         if (count($errors) > 0) {
//             // Si une erreur, on recommence
//             afficheErreurs($errors);
//         } else {
//             $lesIdJeu = getLesIdJeuxDuPanier();
//             M_Commande::creerCommande($nom, $prenom, $rue, $cp, $ville, $mail, $lesIdJeu);
//             supprimerPanier();
//             afficheMessage("Commande enregistrée");
//             $uc = '';
//         }
//         break;
}



