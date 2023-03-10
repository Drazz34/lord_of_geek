<?php

class M_Client {

    public static function creerClient($identifiant, $password, $nom, $prenom, $rue, $cp, $ville, $mail) {
        if($erreurs = static::estValide($identifiant, $password, $nom, $prenom, $rue, $cp, $ville, $mail)){
            return $erreurs;
        };

        $pdo = AccesDonnees::getPdo();
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare('INSERT INTO client(identifiant, mot_de_passe, nom, prenom, adresse_rue, cp, ville, mail) VALUES (:identifiant, :password, :nom, :prenom, :rue, :cp, :ville, :mail)');
        $stmt->bindParam(':identifiant', $identifiant);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':rue', $rue);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
    }
    
    // public static function lastClient(){
    //     $idClient = AccesDonnees::getPdo()->lastInsertId();
    //     return $idClient;
    // }

    public static function trouverClientParId($idClient) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM client WHERE id = :id");
        $stmt->bindParam(":id", $idClient);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        return $client;
    }

    public static function trouverClientParIdentifiantEtMDP($identifiant, $password) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM client WHERE identifiant = :identifiant");
        $stmt->bindParam(":identifiant", $identifiant);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($client && password_verify($password, $client["mot_de_passe"])) {
            return $client;
        }
        return false;
    }
    
    public static function changerInfoClient($id, $nom, $prenom, $rue, $cp, $ville, $mail) {
        if($erreurs = static::estProfilValide($nom, $prenom, $rue, $cp, $ville, $mail)) {
            return $erreurs;
        }
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("UPDATE client SET nom = :nom, prenom = :prenom, adresse_rue = :rue, cp = :cp, ville = :ville, mail = :mail WHERE client.id = :id");
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":rue", $rue);
        $stmt->bindParam(":cp", $cp);
        $stmt->bindParam(":ville", $ville);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

    }

    public static function estValide($identifiant, $password, $nom, $prenom, $rue, $cp, $ville, $mail) {
        $erreurs = [];
        if ($identifiant == "") {
            $erreurs[] = "Il faut saisir le champ identifiant";
        }
        if ($password == "") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
        }
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prenom";
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


    public static function estProfilValide($nom, $prenom, $rue, $cp, $ville, $mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prenom";
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