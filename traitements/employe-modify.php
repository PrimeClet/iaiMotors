<?php
session_start();
$_SESSION['path'] = "../";
require_once "../models/employe.php";
require_once "../models/direction.php";
require_once "../models/services.php";

$id = $_POST["id"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$matricule= $_POST["matricule"];
$direction = $_POST["direction"];
$service = $_POST["service"];
$categorie = $_POST["categorie"];
$is_director = $_POST["directeur"];
$is_cs = $_POST["cs"];

$services = new services();
$directions = new direction();
$employes = new Employe();

if ($is_director === "oui"){
    $categorie = "Directeur";
    $dataEmploye = [
        $matricule, $nom, $prenom, $username, $email, $password, $categorie, $direction, $service, $id
    ];
    $rq1 = "UPDATE employer SET Matricule = ?, Nom_employer = ?, Prenom_employer = ?, username = ?, email = ?, mot_de_passe = ?, Categorie = ?, Id_direction = ?, Id_service = ? WHERE Id_employer = ?";
    $insert = $employes->updateEmploye($rq1, $dataEmploye);
    //update-request
    $rq = "UPDATE direction SET Id_employer = ? WHERE Id_direction = ?";
    $data = [
        $id, $direction
    ];
    $update = $directions->updateDirection($rq, $data);
    if ($insert && $update) {
        $_SESSION['notification-type'] = "success";
        $_SESSION['notification-message'] = "Employé Modifie avec Succès";
        header('Location: ../views/administration/modifier-employe.php?id='.$id);
    }
} else if ($is_cs === "oui"){
    $categorie = "Chef Service";
    $dataEmploye = [
        $matricule, $nom, $prenom, $username, $email, $password, $categorie, $direction, $service, $id
    ];
    $rq1 = "UPDATE employer SET Matricule = ?, Nom_employer = ?, Prenom_employer = ?, username = ?, email = ?, mot_de_passe = ?, Categorie = ?, Id_direction = ?, Id_service = ? WHERE Id_employer = ?";
    $insert = $employes->updateEmploye($rq1, $dataEmploye);
    //update-request
    $rq = "UPDATE service SET Id_employer = ? WHERE Id_service = ?";
    $datas = [
        $id, $service
    ];
    $update = $services->updateService($rq, $datas);
    if ($insert && $update) {
        $_SESSION['notification-type'] = "success";
        $_SESSION['notification-message'] = "Employé Modifie avec Succès";
        header('Location: ../views/administration/modifier-employe.php?id='.$id);
    }
} else {
    $dataEmploye = [
        $matricule, $nom, $prenom, $username, $email, $password, $categorie, $direction, $service, $id
    ];
    $rq1 = "UPDATE employer SET Matricule = ?, Nom_employer = ?, Prenom_employer = ?, username = ?, email = ?, mot_de_passe = ?, Categorie = ?, Id_direction = ?, Id_service = ? WHERE Id_employer = ?";
    $insert = $employes->updateEmploye($rq1, $dataEmploye);
    if ($insert) {
        $_SESSION['notification-type'] = "success";
        $_SESSION['notification-message'] = "Employé Modifie avec Succès";
        header('Location: ../views/administration/modifier-employe.php?id='.$id);
    }
}