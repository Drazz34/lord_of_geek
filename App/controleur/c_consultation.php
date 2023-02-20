<?php
include 'App/modele/M_Categorie.php';
include 'App/modele/M_Exemplaire.php';

$categorie = null;

// $m_exemplaire->trouveJeuParId();

/**
 * Controleur pour la consultation des exemplaires par catégorie ou tous les jeux
 * @author Loic LOG
 */
switch ($action) {
    case 'voirJeux':
        $categorie = filter_input(INPUT_GET, 'categorie');
        if ($categorie) {
            $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        }
        break;
    case 'ajouterAuPanier':
        $idJeu = filter_input(INPUT_GET, 'jeu');
        $categorie = filter_input(INPUT_GET, 'categorie');
        if (!ajouterAuPanier($idJeu)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        } else {
            afficheMessage("Ce jeu a été ajouté au panier");
        }
        break;
    case 'voirCategories':
        $lesJeux = M_Exemplaire::trouveTousLesJeux();
        break;
    default:
        $lesJeux = M_Exemplaire::trouveTousLesJeux();
        break;
}

$lesCategories = M_Categorie::trouveLesCategories();
