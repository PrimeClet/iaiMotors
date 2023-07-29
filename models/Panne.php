<?php
$path  = $_SESSION['path'];
require_once $path.'database/databaseClass.php';

class Panne
{
    /**
     * @return void
     */
    public function getAllPannes(){
        try {
            $db =  new databaseClass();
            $rq  = "SELECT * FROM panne";
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
    public function getPanne($data){
        try {
            $datas = [
                $data
            ];
            $db =  new databaseClass();
            $rq  = "SELECT * FROM panne WHERE Id_panne = ?";
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
    public function insertPanne($requete, $data){
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
    public function updatePanne($requete, $data){
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