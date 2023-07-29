<?php

class Employe
{
    public function getAllEmployes(){
        try {
            $db =  new databaseClass();
            $rq  = "SELECT * FROM employer where status = 0";
            $donnees = $db->databaseConnect()->prepare($rq);
            $donnees->execute();

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
        }
        /*retourne toutes les  lignes de la requete
        * PDO::FETCH_ASSOC precise qu'on veut le resultat avec seulement les noms de colonnes
        */
        return $donnees->fetchAll(PDO::FETCH_OBJ);
    }

    public function getEmploye($data){
        try {
            $datas = [
                $data
            ];
            $db =  new databaseClass();
            $rq  = "SELECT * FROM employer WHERE Id_employer = ?";
            $donnees = $db->databaseConnect()->prepare($rq);
            $donnees->execute($datas);

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
        }
        /*retourne toutes les  lignes de la requete
        * PDO::FETCH_ASSOC precise qu'on veut le resultat avec seulement les noms de colonnes
        */
        return $donnees->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertEmploye($data){
        try {
            $db =  new databaseClass();
            $requete = "INSERT INTO employer(Matricule, Nom_employer, Prenom_employer, username, email, mot_de_passe, Categorie, Id_direction, Id_service) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $donnees = $db->databaseConnect()->prepare($requete);
            $donnees->execute($data);
            return true;

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
            return $this->sqlError;
        }
        /*retourne toutes les  lignes de la requete
        * PDO::FETCH_ASSOC precise qu'on veut le resultat avec seulement les noms de colonnes
        */

    }

    public function updateEmploye($requete, $data){
        try {
            $db =  new databaseClass();
            $donnees = $db->databaseConnect()->prepare($requete);
            $donnees->execute($data);
            return true;

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
            return  $this->sqlError;
        }
        /*retourne toutes les  lignes de la requete
        * PDO::FETCH_ASSOC precise qu'on veut le resultat avec seulement les noms de colonnes
        */
    }
}