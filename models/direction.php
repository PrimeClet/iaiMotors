<?php

class direction
{
    public function getAllDirections(){
        try {
            $db =  new databaseClass();
            $rq  = "SELECT * FROM direction";
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

    public function getDirection($data){
        try {
            $datas = [
              $data
            ];
            $db =  new databaseClass();
            $rq  = "SELECT * FROM direction WHERE Id_direction = ?";
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

    public function updateDirection($requete, $cond,$data){
        try {
            $datas = [
                $data, $cond
            ];
            $db =  new databaseClass();
            $donnees = $db->databaseConnect()->prepare($requete);
            $donnees->execute($datas);
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