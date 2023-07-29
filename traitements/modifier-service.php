<?php
session_start();
$_SESSION['path'] = "../";
require_once "../models/services.php";
require_once "../models/direction.php";
require_once "../models/Employe.php";

$services = new services();
$directions = new direction();
$employes = new Employe();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = json_decode(file_get_contents("php://input"), true);
    $idService = $data["id"];
    $categorie = $data["categorie"];
    $nomService = $data["idService"];
    $codeService = $data["codeService"];
    $codeService = $data["codeService"];
    $idDirection = $data["idDirection"];
    $idChefService = $data["idChefService"];

    if ($idChefService == 0){
        $data = [
            $nomService, $codeService, $idDirection, $idService
        ];
        //update-request
        $rq = "UPDATE service SET Nom_service = ?, code_service = ? , Id_direction = ?, Id_employer = NULL WHERE Id_service = ?";

        $update = $services->updateService($rq, $data);
        if ($update) {
            $response = array("message" => "Donnée Modifiée Avec Succès!");
            echo json_encode($response);
        }
    } else {
        $data = [
            $nomService, $codeService, $idDirection, $idChefService, $idService
        ];
        //update-request
        $rq = "UPDATE service SET Nom_service = ?, code_service = ? , Id_direction = ?, Id_employer = ? WHERE Id_service = ?";
        $update = $services->updateService($rq, $data);

        //update employe section
        $dataEmploye = [
            $categorie, $idChefService
        ];
        $rq1 = "UPDATE employer SET Categorie = ? WHERE Id_employer = ?";
        $insert = $employes->updateEmploye($rq1, $dataEmploye);
        if ($insert && $update) {
            $response = array("message" => "Donnée Modifiée Avec Succès!");
            echo json_encode($response);
        }
    }
}