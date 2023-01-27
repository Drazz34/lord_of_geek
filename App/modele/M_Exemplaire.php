<?php

/**
 * Requetes sur les exemplaires  de jeux videos
 *
 * @author Loic LOG
 */
class M_Exemplaire {

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeCategorie($idCategorie) {
        $req = "SELECT etat, jeux.nom AS jeu_nom, consoles.nom AS console_nom, exemplaires.id, exemplaires.description, etat_exemplaire_id, prix, image, categorie_id, jeux_id, consoles_id FROM exemplaires
        JOIN etat_exemplaire ON exemplaires.etat_exemplaire_id = etat_exemplaire.id
        JOIN jeux ON exemplaires.jeux_id = jeux.id
        JOIN consoles ON consoles.id = exemplaires.consoles_id WHERE categorie_id = '$idCategorie'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDuTableau($desIdJeux) {
        $nbProduits = count($desIdJeux);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdJeux as $unIdProduit) {
                $req = "SELECT etat, jeux.nom AS jeu_nom, consoles.nom AS console_nom, exemplaires.id, exemplaires.description, etat_exemplaire_id, prix, image, categorie_id, jeux_id, consoles_id FROM exemplaires
                JOIN etat_exemplaire ON exemplaires.etat_exemplaire_id = etat_exemplaire.id
                JOIN jeux ON exemplaires.jeux_id = jeux.id
                JOIN consoles ON consoles.id = exemplaires.consoles_id WHERE exemplaires.id = '$unIdProduit'";
                $res = AccesDonnees::query($req);
                $unProduit = $res->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }

       /**
     * Retourne tous les jeux sous forme d'un tableau associatif
     *
     * @return le tableau associatif des jeux
     */
    public static function trouveTousLesJeux() {
        $req = "SELECT etat, jeux.nom AS jeu_nom, consoles.nom AS console_nom, exemplaires.id, exemplaires.description, etat_exemplaire_id, prix, image, categorie_id, jeux_id, consoles_id FROM exemplaires
        JOIN etat_exemplaire ON exemplaires.etat_exemplaire_id = etat_exemplaire.id
        JOIN jeux ON exemplaires.jeux_id = jeux.id
        JOIN consoles ON consoles.id = exemplaires.consoles_id";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    // Je récupère le nom de chaque jeux
// public function trouveJeuParId($idJeu)
// {
//     $query = AccesDonnees::getPdo()->prepare("SELECT nom FROM jeux WHERE id = :idJeu");
//     $query->bindValue(':idJeu', $idJeu);
//     $query->execute();
//     $result = $query->fetch();
//     $nom = $result['nom'];
//     return $nom;
// }
    

}
