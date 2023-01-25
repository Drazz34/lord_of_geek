<section id="authentification">
    <form method="POST" action="index.php?uc=authentication&action=loginClient">
        <fieldset>
            <legend>Authentication</legend>
            <p>
                <label for="identifiant">Identifiant</label>
                <input id="identifiant" type="text" name="identifiant" maxlength="90">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" minlength="6" maxlength="90">
            </p>
            <p>
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler" name="annuler"> 
            </p>
    </form>
</section>