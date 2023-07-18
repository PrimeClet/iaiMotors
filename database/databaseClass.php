<?php

class databaseClass
{
    private $server = "localhost";
    private $database = "iai_motors";
    private $password = "";
    private $username = "root";
    private $pdo;

    /**
     * @param string $database
     * @param string $password
     * @param string $username
     * @param string $server
     */
    public function __construct(string $server, string $database, string $username, string $password)
    {
        $this->database = $database;
        $this->password = $password;
        $this->username = $username;
        $this->server = $server;
    }

    public function databaseConnect() {
        try {
            if ($this->pdo === null) {
                $this->pdo = new PDO("mysql:host=$this->server;dbname=$this->database;charset=utf8", $this->username,$this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            }

        } catch (SQLException $e) {
            $_SESSION["alert"]['danger'] = "ERREUR DE CONNECTION A LA BD: ".$e->getMessage();
            die ('<h1 class="error">IMPOSSIBLE DE SE CONNECTER A LA BASE DE DONNEES</h1>
                </br><h4 style="color: darkorange;">DETAILS DES PARAMETRES DE CONNEXION: '.$this->getParameters().' </h4> 
                </br>l\'ERREUR EST :'.$e);
        }
        return $this->pdo;
    }

    /* retourne plusieurs lignes d'une requete avec ou sans parametres*/
    /**
     * @param $requete
     * @param $data
     * @return mixed
     */
    public  function getRows($requete,$data=null){
        try {
            // echo("req = ".$requete."<br>");
            $donnees = $this->getPDO()->prepare($requete);
            $donnees->execute($data);

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();

            $this->sqlError = $e->getMessage();
        }
        /*retourne toutes les  lignes de la requete
        * PDO::FETCH_ASSOC precise qu'on veut le resultat avec seulement les noms de colonnes
        */
        return $donnees->fetchAll(PDO::FETCH_ASSOC);
    }

    /*retourne une seule ligne de la requete sous forme de tableau associatif*/
    /**
     * @param $requete
     * @param $data
     * @return void
     */
    public  function getRow($requete,$data=null){
        try {

            $donnees = $this->getPDO()->prepare($requete);
            $donnees->execute($data);

            /*retourne une seule ligne de la requete sous forme de tableau clef=>valeur*/
            return $donnees->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            $_SESSION["alert"]['danger'] = "ERREUR SQL : ".$e->getMessage();
            $this->sqlError = $e->getMessage();
        }


    }




}