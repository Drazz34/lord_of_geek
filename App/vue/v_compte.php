<!-- <p style="text-align: center;">
    <img src="./public/images/a_venir.png" width="500px" hight="auto">
</p> -->

<section id="compte">


    <?php if (!empty($commandesClient)) : ?>
        <p>Mes jeux achetés</p>
        <table class="commandes">
            <thead>
                <tr>
                    <th>Jeu</th>
                    <th>Version</th>
                    <th>Console</th>
                    <th>État</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                </tr>
            </thead>
        <?php endif; ?>

        <tbody>

            <?php foreach ($commandesClient as $key => $commandes) : ?>
                <tr>
                    <?php foreach ($commandes as $value) : ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>

        </tbody>
        </table>
        <br><br>
        <form method="POST" action="index.php?uc=compte&action=changerProfil">
            <fieldset>
                <legend>Modifier les informations de mon compte</legend>
                <p>
                    <label for="nom">Nom</label>
                    <input id="nom" type="text" name="nom" value="<?= $clientSession['nom'] ?>" maxlength="45">
                </p>
                <p>
                    <label for="prenom">Prenom</label>
                    <input id="prenom" type="text" name="prenom" value="<?= $clientSession['prenom'] ?>" maxlength="45">
                </p>
                <p>
                    <label for="ville">Rue</label>
                    <input id="rue" type="text" name="rue" value="<?= $clientSession['adresse_rue'] ?>" maxlength="90">
                </p>
                <p>
                    <label for="cp">Code postal</label>
                    <input id="cp" type="text" name="cp" value="<?= $clientSession['cp'] ?>" size="5" maxlength="5">
                </p>
                <p>
                    <label for="rue">Ville</label>
                    <input id="ville" type="text" name="ville" value="<?= $clientSession['ville'] ?>" maxlength="90">
                </p>
                <p>
                    <label for="mail">Email </label>
                    <input id="mail" type="text" name="mail" value="<?= $clientSession['mail'] ?>" maxlength="100">
                </p>
                <p>
                    <input type="submit" value="Modifier" name="Valider">
                    <input type="reset" value="Annuler" name="Annuler">
                </p>
        </form>
</section>