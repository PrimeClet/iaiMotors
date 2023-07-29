<?php
session_start();
$_SESSION['path'] = "../";
require_once "../models/Panne.php";
require_once "../models/Solution.php";
require_once "../models/Tache.php";


$pannes = new Panne();
$taches = new Tache();
$solutions = new Solution();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    (isset($data["id"])) ? $idPanne = $data["id"] : $idPanne = "";
    $action = $data["action"];
    $codePanne = $data["codePanne"];
    $typeMoteur = $data["typeMoteur"];
    $nomPanne = $data["nomPanne"];
    $descriptionPanne = $data["description"];

    if ($action == "modifier") {
        $data = [
            $codePanne, $nomPanne, $descriptionPanne, $typeMoteur, $idPanne
        ];
        //update-request
        $rq = "UPDATE panne SET code_panne = ?, Libelle_panne = ? , description = ?, Type_Engin = ? WHERE Id_panne = ?";
        $update = $pannes->updatePanne($rq, $data);
        if ($update) {
            $response = array("message" => "Donnée Modifiée Avec Succès!");
            echo json_encode($response);
        }
    }

    if ($action == "ajouter") {
        $data = [
            $codePanne, $nomPanne, $descriptionPanne, $typeMoteur
        ];
        //update-request
        $rq = "INSERT INTO panne (code_panne, Libelle_panne, description, Type_Engin) VALUES (?, ?, ?, ?) ";
        $update = $pannes->insertPanne($rq, $data);
        if ($update) {
            $response = array("message" => "Donnée Modifiée Avec Succès!");
            echo json_encode($response);
        }
    }
}