<?php
    session_start();
    $_SESSION['path'] = "../../";
    require_once "../../models/services.php";
    require_once "../../models/direction.php";
    require_once "../../models/Employe.php";

    //on recupère les valeurs des notifiacations
    $notif_type = $_SESSION['notification-type'];
    $notif_msg = $_SESSION['notification-message'];
    $_SESSION['notification-type'] = "";
    $_SESSION['notification-message'] = "";
    //fin de la recupération remise à vide

    $services = new services();
    $directions = new direction();
    $employes = new Employe();
    $dataEmploye = $employes->getEmploye($_GET["id"])[0];
?>
<?php require '../../layouts/dashboad-layout-header.php' ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../dashboad.php">Accueil</a></li>
                <li class="breadcrumb-item active">Employé Détails</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Ajouter Un employé Card -->
                    <div class="col-xxl-8 offset-xxl-2 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body p-5">
                                <div class="card">
                                    <div class="card-body p-5">
                                        <h5 class="card-title">Employé détails</h5>

                                        <!-- Floating Labels Form -->
                                        <form class="row g-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingName" value="<?= $dataEmploye->Nom_employer ?>" name="nom" placeholder="Nom de l'employé" required>
                                                    <label for="floatingName">Nom Employé</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingSurname" value="<?= $dataEmploye->Prenom_employer ?>" name="prenom" placeholder="PreNom de l'employé">
                                                    <label for="floatingSurname">Prenom Employé</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="floatingEmail" name="email" value="<?= $dataEmploye->email ?>" placeholder="Email Employé" required>
                                                    <label for="floatingEmail">Email Employé</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingUsername" name="username" value="<?= $dataEmploye->username ?>" placeholder="Username Employé" required>
                                                    <label for="floatingEmail">Username Employé</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingMatricule" placeholder="Matricule" name="matricule" value="<?= $dataEmploye->Matricule ?>" required>
                                                    <label for="floatingMatricule">Matricule</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="password" value="<?= $dataEmploye->Matricule ?>" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                                                    <label for="floatingPassword">Mot de Passe</label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="floatingDirection" aria-label="Direction" name="direction">
                                                        <option value="<?= $dataEmploye->Id_direction ?>" ><?php echo $directions->getDirection($dataEmploye->Id_direction)[0]->Nom_direction ?></option>
                                                    </select>
                                                    <label for="floatingDirection">Direction</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <select class="form-select" id="floatingService" aria-label="Service" name="service">
                                                        <option value="<?= $dataEmploye->Id_service ?>" ><?php echo $services->getService($dataEmploye->Id_service)[0]->Nom_service ?></option>
                                                    </select>
                                                    <label for="floatingService">Service</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="col-md-12 form-floating">
                                                    <select class="form-select" id="floatingCategorie" aria-label="Categorie" name="categorie">
                                                        <option value="<?= $dataEmploye->Categorie ?>" ><?= $dataEmploye->Categorie ?></option>
                                                    </select>
                                                    <label for="floatingCategorie">Categorie</label>
                                                </div>
                                            </div>
                                        </form><!-- End floating Labels Form -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Employé Card -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->

<?php require '../../layouts/dashboard-layout-footer.php' ?>
