<section id="visite">
    <aside id="categories">
        <ul>
            <?php
            foreach ($lesCategories as $uneCategorie) {
                $idCategorie = $uneCategorie['id'];
                $libCategorie = $uneCategorie['nom'];
            ?>
                <li>
                    <a href=index.php?uc=visite&categorie=<?php echo $idCategorie ?>&action=voirJeux><?php echo $libCategorie ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </aside>
    <section id="jeux">
        <?php

        if (empty($lesJeux)) {
            $lesJeux = M_Exemplaire::trouveTousLesJeux();
            $categorie = null;
        }

        foreach ($lesJeux as $unJeu) {
            $id = $unJeu['id'];
            $description = $unJeu['description'];
            $idJeu = $unJeu['jeux_id'];
            $etat_exemplaire = $unJeu['etat_exemplaire_id'];
            $prix = $unJeu['prix'];
            $image = $unJeu['image'];
            $idConsole = $unJeu['consoles_id'];
            // $nom = "";
            // $etat = "";

            // Je récupère le nom de chaque jeux

            $query = AccesDonnees::getPdo()->prepare("SELECT nom FROM jeux WHERE id = :idJeu");
            $query->bindValue(':idJeu', $idJeu);
            $query->execute();
            $result = $query->fetch();
            $nom = $result['nom'];

            // Je récupère l'état de chaque jeux

            $query1 = AccesDonnees::getPdo()->prepare("SELECT etat FROM etat_exemplaire WHERE id = :idEtat");
            $query1->bindValue(':idEtat', $etat_exemplaire);
            $query1->execute();
            $result1 = $query1->fetch();
            $etat = $result1['etat'];

            // Je récupère la console de chaque jeux

            $query2 = AccesDonnees::getPdo()->prepare("SELECT nom FROM consoles WHERE id = :idConsole");
            $query2->bindValue(':idConsole', $idConsole);
            $query2->execute();
            $result2 = $query2->fetch();
            $console = $result2['nom'];

        ?>
            <article>
                <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" />
                <p><b>Titre :</b> <?= $nom ?></p>
                <p><b>Console :</b> <?= $console ?></p>
                <p><b>Etat du jeu :</b> <?= $etat ?></p>
                <p><?= $description ?></p>
                <p><?= "Prix : " . $prix . " Euros" ?>
                    <a href="index.php?uc=visite&categorie=<?= $categorie ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                        <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add" />
                    </a>
                </p>
            </article>
        <?php
        }
        ?>
    </section>
</section>