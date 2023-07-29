<?php

class Solution
{
    /**
     * @return array|false
     */
    public function getAllSolutions(){
        try {
            $db =  new databaseClass();
            $rq  = "SELECT * FROM solution";
            $donnees = $db->databaseConnect()->prepare($rq);
            $donnees->execute();

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
        }
        return $donnees->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $data
     * @return array|false
     */
    public function getSolution($data){
        try {
            $datas = [
                $data
            ];
            $db =  new databaseClass();
            $rq  = "SELECT * FROM solution WHERE Id_solution = ?";
            $donnees = $db->databaseConnect()->prepare($rq);
            $donnees->execute($datas);

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
        }
        return $donnees->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $requete
     * @param $data
     * @return bool|string
     */
    public function insertData($requete, $data){
        try {
            $db =  new databaseClass();
            $donnees = $db->databaseConnect()->prepare($requete);
            $donnees->execute($data);
            return true;

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
            return $this->sqlError;
        }

    }

    /**
     * @param $requete
     * @param $data
     * @return bool|string
     */
    public function updateSolution($requete, $data){
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
    }
}