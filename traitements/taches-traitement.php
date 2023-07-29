<?php
session_start();
$_SESSION['path'] = "../";
require_once "../models/Panne.php";
require_once "../models/Solution.php";
require_once "../models/Tache.php";
require_once "../models/necessite.php";


$pannes = new Panne();
$taches = new Tache();
$solutions = new Solution();
$necessites = new necessite();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    (isset($data["id"])) ? $idTache = $data["id"] : $idTache = "";
    $action = $data["action"];
    $codeTache = $data["codeTache"];
    $panneAssocie = $data["panneAssocie"];
    $nomTache = $data["nomTache"];
    $description = $data["description"];

    if ($action == "modifier") {
        $data = [
            $codeTache, $nomTache, $description, $idTache
        ];

        $datas = [
            $idTache, $panneAssocie, $idTache
        ];
        //update-request
        $rq = "UPDATE taches SET code_tache = ?, Libelle_tache = ? , description = ? WHERE Id_tache = ?";
        $update = $taches->updateTache($rq, $data);

        //update-request
        $rq = "UPDATE necessite SET Id_tache = ?, Id_panne = ? WHERE Id_tache = ?";
        $update = $necessites->updateData($rq, $datas);
        if ($update) {
            $response = array("message" => "Donnée Modifiée Avec Succès!");
            echo json_encode($response);
        }
    }

    if ($action == "ajouter") {
        $data = [
            $codeTache, $nomTache, $description
        ];
        $idTache = count($taches->getAllTaches())+1;
        $datas = [
            $idTache, $panneAssocie
        ];
        //update-request
        $rq = "INSERT INTO taches (code_tache, Libelle_tache, description) VALUES (?, ?, ?) ";
        $rq1 = "INSERT INTO necessite (Id_tache, Id_panne) VALUES (?, ?) ";
        $insert = $taches->insertData($rq, $data);
        if ($insert) {
            $InsertTwo = $necessites->insertData($rq1, $datas);
            if ($InsertTwo){
                $response = array("message" => "Donnée Modifiée Avec Succès!");
                echo json_encode($response);
            }
        }
    }
}