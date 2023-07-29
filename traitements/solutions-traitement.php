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
    (isset($data["id"])) ? $idSolution = $data["id"] : $idSolution = "";
    $action = $data["action"];
    $nomSolution = $data["nomSolution"];
    $tacheAsso = $data["tacheAsso"];
    $description = $data["description"];

    if ($action == "modifier") {
        $data = [
            $nomSolution, $description, $tacheAsso, $idSolution
        ];
        //update-request
        $rq = "UPDATE solution SET libelle_solution = ?, description_solution = ? , Id_tache = ? WHERE Id_solution = ?";
        $update = $taches->updateTache($rq, $data);
        if ($update) {
            $response = array("message" => "Donnée Modifiée Avec Succès!");
            echo json_encode($response);
        }
    }

    if ($action == "ajouter") {
        $data = [
            $nomSolution, $description, $tacheAsso, $idSolution
        ];
        //update-request
        $rq = "INSERT INTO taches (libelle_solution, description_solution, Id_tache) VALUES (?, ?, ?) ";
        $insert = $taches->insertData($rq, $data);
        if ($insert) {
            $response = array("message" => "Donnée Modifiée Avec Succès!");
            echo json_encode($response);
        }
    }
}