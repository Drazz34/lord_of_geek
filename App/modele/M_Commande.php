<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande {

    /**
     * Crée une commande
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $nom
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $listJeux

     */
    // public static function creerCommande($nom, $prenom, $rue, $cp, $ville, $mail, $listJeux) {
    //     $req = "insert into client(nomPrenom, adresseRue, cp, ville, mail) values ('$nom','$rue','$cp','$ville','$mail')";
    //     $res = AccesDonnees::exec($req);
        
    //     $idCommande = AccesDonnees::getPdo()->lastInsertId();
    //     foreach ($listJeux as $jeu) {
    //         $req = "insert into lignes_commande(commande_id, exemplaire_id) values ('$idCommande','$jeu')";
    //         $res = AccesDonnees::exec($req);
    //     }
    // }

    public static function creerCommande($idClient, $listJeux) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("INSERT INTO commandes(created_at, client_id) VALUES (NOW(), :idClient)");
        $stmt->bindParam(":idClient", $idClient);
        $stmt->execute();

        $idCommande = AccesDonnees::getPdo()->lastInsertId();

        foreach ($listJeux as $jeu) {
            $pdo = AccesDonnees::getPdo();
            $stmt = $pdo->prepare("INSERT INTO lignes_commande(commande_id, exemplaire_id) VALUES (:idCommande, :jeu)");
            $stmt->bindParam(":idCommande", $idCommande);
            $stmt->bindParam(":jeu", $jeu);
            $stmt->execute();
        }
    }

    // public static function afficherCommandes($idClient) { //DISTINCT commandes.id
    //     $pdo = Accesdonnees::getPdo();
    //     $stmt = $pdo->prepare("SELECT exemplaires.description, exemplaires.prix, etat_exemplaire.etat, categories.nom 
    //     FROM commandes 
    //     JOIN lignes_commande ON lignes_commande.exemplaire_id = exemplaires.id
    //     JOIN commandes ON commandes.id = lignes_commande.commande_id
    //     JOIN client ON client.id = commandes.client_id
    //     WHERE client.id = :clientId");
    //     $stmt->bindParam(":clientId", $idClient);
    //     $stmt->execute();
    //     $lesCommandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $lesCommandes;
    // }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : chaîne
     * @param $mail : chaîne
     * @return : array
     */
    public static function estValide($nom, $rue, $ville, $cp, $mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($rue == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }

}
