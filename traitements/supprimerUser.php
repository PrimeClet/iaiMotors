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
    $status = 1;
    $service = $data["idService"];
    $direction = $data["idDirection"];
    $categorie = $data["categorie"];
    $id = $data["id"];

    if(($categorie === "Chef Service" || $categorie === "chef service") && isset($service) ){
        $dataEmploye = [
            $status, $id
        ];
        $rq1 = "UPDATE employer SET status = ? WHERE Id_employer = ?";
        $insert = $employes->updateEmploye($rq1, $dataEmploye);
        //update-request
        $rq = "UPDATE service SET Id_employer = NULL WHERE Id_service = ?";
        $datas = [
            $service
        ];
        $update = $services->updateService($rq, $datas);
        if ($insert && $update) {
            $response = array("message" => "Donnée Supprimé Avec Succès!");
            echo json_encode($response);
        }
    }else if(($categorie === "Directeur" || $categorie === "directeur") && isset($direction) ){
        $dataEmploye = [
            $status, $id
        ];
        $rq1 = "UPDATE employer SET status = ? WHERE Id_employer = ?";
        $insert = $employes->updateEmploye($rq1, $dataEmploye);
        //update-request
        $rq = "UPDATE direction SET Id_employer = NULL WHERE Id_direction = ?";
        $datas = [
            $service
        ];
        $update = $services->updateService($rq, $datas);
        if ($insert && $update) {
            $response = array("message" => "Donnée Supprimé Avec Succès!");
            echo json_encode($response);
        }
    } else {
        $dataEmploye = [
            $status, $id
        ];
        $rq1 = "UPDATE employer SET status = ? WHERE Id_employer = ?";
        $insert = $employes->updateEmploye($rq1, $dataEmploye);
        if ($insert) {
            $response = array("message" => "Donnée Supprimé Avec Succès!");
            echo json_encode($response);
        }
    }
    // Process the data received from the client
    // For example, you can save it to a database or perform any other server-side operation

    // Respond with a message (this will be sent back to the client)

}