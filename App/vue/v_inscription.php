<section id="inscription">
    <form method="POST" action="index.php?uc=inscription&action=creerClient">
        <fieldset>
            <legend>Inscription</legend>
            <p>
                <label for="identifiant">Identifiant</label>
                <input id="identifiant" type="text" name="identifiant" maxlength="90">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" minlength="6" maxlength="90">
            </p>
            <p>
                <label for="nom">Nom</label>
                <input id="nom" type="text" name="nom" maxlength="90">
            </p>
            <p>
                <label for="prenom">Prenom</label>
                <input id="prenom" type="text" name="prenom" maxlength="90">
            </p>
            <p>
                <label for="ville">Ville</label>
                <input id="ville" type="text" name="ville" maxlength="45">
            </p>
            <p>
                <label for="cp">Code postal</label>
                <input id="cp" type="text" name="cp" size="5" maxlength="5">
            </p>
            <p>
                <label for="rue">Rue</label>
                <input id="rue" type="text" name="rue" maxlength="255">
            </p>
            <p>
                <label for="mail">Email </label>
                <input id="mail" type="text"  name="mail" maxlength="100">
            </p> 
            <p>
                <input type="submit" value="Valider" name="Valider">
                <input type="reset" value="Annuler" name="Annuler"> 
            </p>
    </form>
</section>