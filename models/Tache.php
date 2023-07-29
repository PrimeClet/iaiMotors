<?php
$path  = $_SESSION['path'];
require_once $path.'database/databaseClass.php';
class Tache
{
    /**
     * @return array|false
     */
    public function getAllTaches(){
        try {
            $db =  new databaseClass();
            $rq  = "SELECT * FROM taches";
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
    public function getTache($data){
        try {
            $datas = [
                $data
            ];
            $db =  new databaseClass();
            $rq  = "SELECT * FROM taches WHERE Id_tache = ?";
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
    public function updateTache($requete, $data){
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