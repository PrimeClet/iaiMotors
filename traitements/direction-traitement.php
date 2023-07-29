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
    $idDirection = $data["id"];
    $categorie = $data["categorie"];
    $action = $data["action"];
    $nomDirection = $data["directionName"];
    $codeDirection = $data["codeDirection"];
    $idDirecteur = $data["idDirecteur"];

    if ($action == "modifier") {
        if ($idDirecteur == 0){
            $data = [
                $nomDirection, $codeDirection, $idDirection
            ];
            //update-request
            $rq = "UPDATE direction SET Nom_direction = ?, code_direction = ? , Id_employer = NULL WHERE Id_direction = ?";

            $update = $directions->updateDirection($rq, $data);
            if ($update) {
                $response = array("message" => "Donnée Modifiée Avec Succès!");
                echo json_encode($response);
            }
        } else {
            $data = [
                $nomDirection, $codeDirection, $idDirecteur, $idDirection
            ];
            //update-request
            $rq = "UPDATE direction SET Nom_direction = ?, code_direction = ? , Id_employer = ? WHERE Id_direction = ?";
            $update = $directions->updateDirection($rq, $data);;

            //update employe section
            $dataEmploye = [
                $categorie, $idDirecteur
            ];
            $rq1 = "UPDATE employer SET Categorie = ? WHERE Id_employer = ?";
            $insert = $employes->updateEmploye($rq1, $dataEmploye);
            if ($insert && $update) {
                $response = array("message" => "Donnée Modifiée Avec Succès!");
                echo json_encode($response);
            }
        }
    }

    if ($action == "ajouter") {
        if ($idDirecteur == 0){
            $data = [
                $nomDirection, $codeDirection, $idDirection
            ];
            //update-request
            $rq = "UPDATE direction SET Nom_direction = ?, code_direction = ? , Id_employer = NULL WHERE Id_direction = ?";

            $update = $directions->updateDirection($rq, $data);
            if ($update) {
                $response = array("message" => "Donnée Modifiée Avec Succès!");
                echo json_encode($response);
            }
        } else {
            $data = [
                $nomDirection, $codeDirection, $idDirecteur, $idDirection
            ];
            //update-request
            $rq = "UPDATE direction SET Nom_direction = ?, code_direction = ? , Id_employer = ? WHERE Id_direction = ?";
            $update = $directions->updateDirection($rq, $data);;

            //update employe section
            $dataEmploye = [
                $categorie, $idDirecteur
            ];
            $rq1 = "UPDATE employer SET Categorie = ? WHERE Id_employer = ?";
            $insert = $employes->updateEmploye($rq1, $dataEmploye);
            if ($insert && $update) {
                $response = array("message" => "Donnée Modifiée Avec Succès!");
                echo json_encode($response);
            }
        }
    }

}
