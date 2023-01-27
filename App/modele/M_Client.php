<?php

class M_Client {

    public static function creerClient($identifiant, $password, $nom, $prenom, $rue, $cp, $ville, $mail) {
        if($erreurs = static::estValide($identifiant, $password, $nom, $prenom, $rue, $cp, $ville, $mail)){
            return $erreurs;
        };

        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare('INSERT INTO client(identifiant, mot_de_passe, nom, prenom, adresse_rue, cp, ville, mail) VALUES :identifiant, :password, :nom, :prenom, :rue, :cp, :ville, :mail)');
        $stmt->bindParam(':identifiant', $identifiant);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':rue', $rue);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
    
        // var_dump(AccesDonnees::getPdo()->errorInfo());
    }
    
    public static function lastClient(){
        $idClient = AccesDonnees::getPdo()->lastInsertId();
        return $idClient;
    }

    public static function trouverClientParId($idClient){
        $req = "select * from client where id = '$idClient'";
        $res = AccesDonnees::query($req);
        $client = $res->fetch(PDO::FETCH_ASSOC);
        return $client;
    }

    public static function trouverClientParIdentifiantEtMDP($identifiant, $password){
        $req = "select * from client where identifiant = '$identifiant' AND mot_de_passe = '$password'";
        $res = AccesDonnees::query($req);
        $client = $res->fetch(PDO::FETCH_ASSOC);
        //var_dump(AccesDonnees::getPdo()->errorInfo());
        return $client;
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
        if ($prenom== "") {
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