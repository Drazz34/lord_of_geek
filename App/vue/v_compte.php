<!-- <p style="text-align: center;">
    <img src="./public/images/a_venir.png" width="500px" hight="auto">
</p> -->

<section id="compte">
    <a href="">Mes commandes</a>
    <table class="commandes">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Nom de jeu</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>État</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>The Legend of zelda sur NES</td>
                <td>30.00</td>
                <td>Aventure</td>
                <td>neuf</td>
                <td>commande</td>
            </tr>
        </tbody>
    </table>
    <form method="POST" action="index.php?uc=compte&action=changerProfil">
        <fieldset>
            <legend>Mon compte</legend>
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
                <input id="rue" type="text" name="rue"  value="<?= $clientSession['adresse_rue'] ?>" maxlength="90">
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
                <input id="mail" type="text"  name="mail" value="<?= $clientSession['mail'] ?>" maxlength="100">
            </p> 
            <p>
                <input type="submit" value="Valider" name="Valider">
                <input type="reset" value="Annuler" name="Annuler"> 
            </p>
    </form>
</section>