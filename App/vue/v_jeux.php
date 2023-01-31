<section id="visite">
    <aside id="categories">
        <ul>
            <?php
            // Parcours de la table catégorie
            foreach ($lesCategories as $uneCategorie) {
                $idCategorie = $uneCategorie['id'];
                $libCategorie = $uneCategorie['nom'];
            ?>
                <li>
                    <a href="index.php?uc=visite&categorie=<?= $idCategorie ?>&action=voirJeux"><?= $libCategorie ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </aside>
    <section id="jeux">
        <?php

        if (isset($lesJeux) && count($lesJeux) > 0) {

            foreach ($lesJeux as $unJeu) {
                $id = $unJeu['id'];
                $description = $unJeu['description'];
                $idJeu = $unJeu['jeux_id'];
                $etat_exemplaire = $unJeu['etat_exemplaire_id'];
                $prix = $unJeu['prix'];
                $image = $unJeu['image'];
                $idConsole = $unJeu['consoles_id'];
                $nom = $unJeu['jeu_nom'];
                $etat = $unJeu['etat'];
                $console = $unJeu['console_nom'];
                $version = $unJeu['version'];

        ?>
                <article>
                    <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" />
                    <p><b>Titre :</b> <?= $nom ?></p>
                    <p><b>Version :</b> <?= $version ?></p>
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
        }
        ?>
    </section>
</section>