<?php
$path  = $_SESSION['path'];
require_once $path.'database/databaseClass.php';

class services
{

    public function getAllServices(){
        try {
            $db =  new databaseClass();
            $rq  = "SELECT * FROM service";
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

    public function getService($data){
        try {
            $datas = [
                $data
            ];
            $db =  new databaseClass();
            $rq  = "SELECT * FROM service WHERE Id_service = ?";
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

    public function insertService($data){
        try {
            $db =  new databaseClass();
            // echo("req = ".$requete."<br>");
            $donnees = $db->databaseConnect()->prepare($requete);
            $donnees->execute($data);

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
        }
        /*retourne toutes les  lignes de la requete
        * PDO::FETCH_ASSOC precise qu'on veut le resultat avec seulement les noms de colonnes
        */
        return $donnees->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateService($requete,$data){
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

    public function deleteService($requete,$data){
        try {
            $db =  new databaseClass();
            // echo("req = ".$requete."<br>");
            $donnees = $db->databaseConnect()->prepare($requete);
            $donnees->execute($data);

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
        }
        /*retourne toutes les  lignes de la requete
        * PDO::FETCH_ASSOC precise qu'on veut le resultat avec seulement les noms de colonnes
        */
        return $donnees->fetchAll(PDO::FETCH_OBJ);
    }
}