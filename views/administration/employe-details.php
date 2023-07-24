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
                                                    <input type="password" value="<?= $dataEmploye->password ?>" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                                                    <label for="floatingPassword">Mot de Passe<span style="color: red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input class="form-control" value="<?= $dataEmploye->Nom_employer ?>" type="text" placeholder="Address" id="floatingAdress" name="adresse" required>
                                                    <label for="floatingAdress">Addresse</label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="floatingDirection" aria-label="Direction" name="direction">
                                                        <?php
                                                        foreach ($dataDirection as $data) {
                                                            ?>
                                                            <option value="<?= $data->Id_direction ?>" data-value="<?= $data->code_direction ?>"><?= $data->Nom_direction ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingDirection">Direction<span style="color: red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <select class="form-select" id="floatingService" aria-label="Service" name="service">
                                                        <?php
                                                        foreach ($dataService as $datas) {
                                                            ?>
                                                            <option value="<?= $datas->Id_service ?>" data-label="<?= $datas->Id_direction ?>" data-value="<?= $datas->code_service ?>"><?= $datas->Nom_service ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingService">Service<span style="color: red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="col-md-12 form-floating">
                                                    <select class="form-select" id="floatingCategorie" aria-label="Categorie" name="categorie">
                                                        <option  value="Employe" selected="selected">Employe</option>
                                                        <option value="Technicien">Technicien</option>
                                                    </select>
                                                    <label for="floatingCategorie">Categorie <span style="color: red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="row mb-3">
                                                    <legend class="col-form-label col-sm-8 pt-0" style="font-weight: bold">Associé En tant que Directeur ?</legend>
                                                    <div class="col-sm-3 d-flex gap-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="directeur" id="directeur1" value="oui">
                                                            <label class="form-check-label" for="directeur1">
                                                                Oui
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="directeur" id="directeur2" value="non" checked>
                                                            <label class="form-check-label" for="directeur2">
                                                                Non
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="row mb-3">
                                                    <legend class="col-form-label col-sm-8 pt-0" style="font-weight: bold">Associé En tantque Chef Service?</legend>
                                                    <div class="col-sm-4 d-flex gap-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="cs" id="cs1" value="oui">
                                                            <label class="form-check-label" for="cs1">
                                                                Oui
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="cs" id="cs2" value="non" checked>
                                                            <label class="form-check-label" for="cs2">
                                                                Non
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" id="sendEmployeValue"><i class="bi bi-person-fill-add"></i> Enregistrer L'Employé</button>
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
