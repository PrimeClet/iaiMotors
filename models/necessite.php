<?php

class necessite
{
    /**
     * @return void
     */
    public function getAllNecessites(){
        try {
            $db =  new databaseClass();
            $rq  = "SELECT * FROM necessite";
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
    public function getOneData($data){
        try {
            $datas = [
                $data
            ];
            $db =  new databaseClass();
            $rq  = "SELECT * FROM necessite WHERE Id_tache = ?";
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
    public function updateData($requete, $data){
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