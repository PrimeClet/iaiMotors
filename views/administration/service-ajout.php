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
$dataService = $services->getAllServices();
$dataDirection = $directions->getAllDirections();
$dataEmploye = $employes->getAllEmployes();
$count = count($dataEmploye) + 1;
$yearNbre = date("Y").str_pad($count, 3, "0", STR_PAD_LEFT)
?>
<?php require '../../layouts/dashboad-layout-header.php' ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./dashboad.php">Accueil</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
                                <?php if ($notif_type) { ?>
                                    <div class="alert alert-<?= $notif_type ?> alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle me-1"></i>
                                        <?= $notif_msg ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <div class="card">
                                    <div class="card-body p-5">
                                        <h5 class="card-title">Ajouter Un Service <i class="bi bi-person-fill-add"></i></h5>

                                        <!-- Floating Labels Form -->
                                        <form id="addEmploye" class="row g-3" action="../../traitements/employe-traitement.php" method="post">
                                            <div class="col-md-12 my-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingcode" placeholder="Code Service" >
                                                    <label for="floatingDirection">Nom Service</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-2">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingcode" placeholder="Code Service">
                                                    <label for="floatingcode">Code Service</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-2">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="floatingDirection" aria-label="Direction" name="direction">
                                                        <?php
                                                        foreach ($dataDirection as $datas) {
                                                            ?>
                                                            <option value="<?= $datas->Id_direction ?>" data-value="<?= $datas->code_direction ?>" ><?= $datas->Nom_direction ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingDirection">Direction Associée</label>
                                                </div>
                                                <div class="col-md-12 my-2">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingDirecteur" aria-label="Directeur" name="directeur">
                                                            <option value="0">-- Selectionner un Chef de Service --</option>
                                                            <?php
                                                            foreach ($dataEmploye as $da) {
                                                                ?>
                                                                <option value="<?= $da->Id_employer ?>" ><?= $da->Nom_employer.' '.$da->Prenom_employer ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingDirecteur">Chef de Service Associé</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" id="sendEmployeValue"><i class="bi bi-person-fill-add"></i> Ajouter Service</button>
                                                <button type="reset" class="btn btn-danger"> <i class="bi bi-person-slash"></i> Réinitialiser</button>
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
<script>
    $(document).ready(function () {
        let direction =  document.getElementById("floatingDirection")
        let service = document.getElementById("floatingService")
        let categorie = document.getElementById("floatingCategorie")
        let nom = document.getElementById("floatingName")
        let username = document.getElementById("floatingUsername")
        let matricule = document.getElementById("floatingMatricule")
        let submit = document.getElementById("sendEmployeValue")

        let directions = direction.options[direction.selectedIndex].getAttribute("data-value");
        let services = service.options[service.selectedIndex].getAttribute("data-value");
        let matricules = matricule.getAttribute("data-value");

        nom.onkeyup = function () {
            username.value  = nom.value
        }

        matricule.value = directions+'_'+services+'_'+matricules
        document.getElementById("floatingPassword").value =  matricule.value

        direction.onchange = function (event) {
            directions = event.target.options[event.target.selectedIndex].getAttribute('data-value')
            matricule.value = directions+'_'+services+'_'+matricules
            document.getElementById("floatingPassword").value =  matricule.value
        }

        service.onchange = function (event) {
            services = event.target.options[event.target.selectedIndex].getAttribute('data-value')
            matricule.value = directions+'_'+services+'_'+matricules
            document.getElementById("floatingPassword").value =  matricule.value
        }


        submit.onclick = function (event) {
            event.preventDefault()
            if (direction.value !== service.options[service.selectedIndex].getAttribute("data-label")){
                alert("Choississez Un service Associé à la direction")
            }else if ((service.value == 1 || service.value == 2) && categorie.value == "Employe") {
                alert("Choississez Une Categorie Valide")
            }else if ((service.value == 3 || service.value == 4 || service.value == 5) && categorie.value == "Technicien") {
                alert("Choississez Une Categorie Valide")
            }else{
                document.getElementById("addEmploye").submit()
            }
        }

        document.getElementById("cs1").onclick = function () {
            if (confirm("Êtes-vous sures de votre choix ?") && !document.getElementById("directeur1").checked){
                document.getElementById("cs1").checked = true;
            }else {
                if(document.getElementById("directeur1").checked){
                    alert("Impossible d'être directeur et Chef de Service")
                }
                document.getElementById("cs2").checked = true;
            }
        }

        document.getElementById("directeur1").onclick = function () {
            if (confirm("Êtes-vous sures de votre choix ?") && !document.getElementById("cs1").checked){
                document.getElementById("directeur1").checked = true;
            }else {
                if(document.getElementById("cs1").checked){
                    alert("Impossible d'être directeur et Chef de Service")
                }
                document.getElementById("directeur2").checked = true;
            }
        }

        //implemention d'une logique de suppresion d'option à partir d'un autre select
        // document.body.onload = function () {
        //     for (let i = 0; i < service.options.length ; i++) {
        //         if(direction.value !== service.options[i].getAttribute("data-label")){
        //             service.remove(i)
        //         }
        //     }
        //
        // }
    });


</script>
