<?php
session_start();
$_SESSION['path'] = "../../";
require_once "../../models/services.php";
require_once "../../models/direction.php";
require_once "../../models/Employe.php";


$services = new services();
$directions = new direction();
$employes = new Employe();
$dataService = $services->getAllServices();
$dataDirection = $directions->getAllDirections();
$dataEmploye = $employes->getAllEmployes()
?>
<?php require '../../layouts/dashboad-layout-header.php' ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../dashboard.php">Accueil</a></li>
                <li class="breadcrumb-item active">Liste Directions</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Directions <span>| Aujourd'hui</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-buildings"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= count($dataDirection) ?></h6>
                                        <span class="text-success small pt-1 fw-bold">1%</span> <span class="text-muted small pt-2 ps-1">Ajout</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Services <span>| Aujourd'hui</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi bi-building"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= count($dataService) ?></h6>
                                        <span class="text-success small pt-1 fw-bold">1%</span> <span class="text-muted small pt-2 ps-1">Ajout</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Employés <span>| Aujourd'hui</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= count($dataEmploye) ?></h6>
                                        <span class="text-danger small pt-1 fw-bold">1%</span> <span class="text-muted small pt-2 ps-1">Ajout</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales">
                            <div class="filter pr-4">
                                <button class="btn btn-outline-primary btn-sm mr-4"><i class="bi bi-plus-circle-fill"></i> Ajouter Directions</button>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Liste des Directions <span>| Aujourd'hui</span></h5>

                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns"> <div class="dataTable-top">
                                        <div class="dataTable-dropdown">
                                            <label>
                                                <select class="dataTable-selector">
                                                    <option value="5">5</option>
                                                    <option value="10" selected="">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                </select> Entrées Par Page </label>
                                        </div>
                                        <div class="dataTable-search">
                                            <input class="dataTable-input" placeholder="Search..." type="text">
                                        </div>
                                    </div>
                                    <div class="dataTable-container">
                                        <table class="table table-borderless datatable dataTable-table">
                                            <thead>
                                            <tr>
                                                <th scope="col" data-sortable="" style="width: 30.9111%;">
                                                    <a href="#" class="dataTable-sorter">Nom Direction</a>
                                                </th>
                                                <th scope="col" data-sortable="" style="width: 10.9635%;">
                                                    <a href="#" class="dataTable-sorter">Code Direction</a>
                                                </th>
                                                <th scope="col" data-sortable="" style="width: 25.1772%;">
                                                    <a href="#" class="dataTable-sorter">Directeur Asssocie</a>
                                                </th>
                                                <th scope="col" data-sortable="" style="width: 15.0919%;">
                                                    <a href="">actions</a>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($dataDirection as $data) { ?>
                                                <tr <?php if($data->status === 0) { ?> >
                                                    <th scope="row" style="vertical-align: middle;">
                                                        <a href="#"><?= $data->Nom_direction ?></a>
                                                    </th>
                                                    <td style="vertical-align: middle;"><?= $data->code_direction ?></td>
                                                    <td style="vertical-align: middle;">
                                                        <?php if ($data->Id_employer !== NULL) { ?>
                                                            <span class="badge bg-success"><?= $employes->getEmploye($data->Id_employer)[0]->Nom_employer.' '.$employes->getEmploye($data->Id_employer)[0]->Prenom_employer ?></span>
                                                        <?php }?>
                                                        <?php if ($data->Id_employer === NULL) { ?>
                                                            <span class="badge bg-danger text-dark">Pas de Directeur Associé</span>
                                                        <?php }?>
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p class="d-flex gap-1">
                                                            <button  class="btn btn-outline-success btn-sm"><i class="bi bi-eye-fill" data-bs-toggle="modal" data-bs-target="#details<?= $data->Id_direction ?>"></i></button>
                                                            <button  class="btn btn-outline-danger btn-sm"><i class="bi bi-person-x" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $data->Id_direction ?>" ></i></button>
                                                            <button  class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#modify<?= $data->Id_direction ?>"></i></button>
                                                        </p>
                                                    </td>
                                                    <div class="modal fade" id="details<?= $data->Id_direction ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Details Services</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="floatingName" placeholder="Nom Direction" value="<?=$data->Nom_direction ?>" disabled>
                                                                            <label for="floatingName">Nom Direction</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="floatingcode" placeholder="Code Direction" value="<?=$data->code_direction ?>" disabled>
                                                                            <label for="floatingcode">Code Direction</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="directeur" placeholder="Direction Associée" value="<?= ($data->Id_employer !== NULL) ? $employes->getEmploye($data->Id_employer)[0]->Nom_employer.' '.$employes->getEmploye($data->Id_employer)[0]->Prenom_employer : 'Pas encore Attribué' ?>" disabled>
                                                                            <label for="directeur">Directeur Associé</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" id="close<?= $data->Id_direction ?>" class="btn btn-outline-primary" data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="button" class="btn btn-outline-danger" >Supprimer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="modify<?= $data->Id_direction ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Modifier Services</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="floatingName" placeholder="Nom Direction" value="<?=$data->Nom_direction ?>" >
                                                                            <label for="floatingName">Nom Direction</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="floatingcode" placeholder="Code Direction" value="<?=$data->code_direction ?>" >
                                                                            <label for="floatingcode">Code Direction</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-floating mb-3">
                                                                                <select class="form-select" id="floatingDirecteur" aria-label="Directeur" name="directeur">
                                                                                    <option value="0">-- Selectionner un Directeur --</option>
                                                                                    <?php
                                                                                    foreach ($dataEmploye as $da) {
                                                                                        ?>
                                                                                        <option value="<?= $da->Id_employer ?>" <?php if ($da->Id_employer === $data->Id_employer) { echo "selected";} ?> ><?= $da->Nom_employer.' '.$da->Prenom_employer ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <label for="floatingDirecteur">Directeur Associé</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="close<?= $data->Id_direction ?>" class="btn btn-outline-primary" data-bs-dismiss="modal">Annuler</button>
                                                                        <button type="button" class="btn btn-outline-danger" onclick="modifierDirection('modify<?= $data->Id_direction ?>', <?= $data->Id_direction ?>)">Modifier</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </tr <?php } ?>>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <button  class="btn btn-outline-danger btn-sm" style="visibility: hidden"><i id="success1" class="bi bi-person-x" data-bs-toggle="modal" data-bs-target="#success" ></i></button>
                                        <div class="modal fade" id="success" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Supprimer employé</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <img src="../../assets/images/delete-done.svg" alt="" class="mx-auto" width="70%" height="50%">
                                                        </div>
                                                        <br>
                                                        <h2 class="my-3 text-center">Action exécutée avec Succès !</h2>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="close" class="btn btn-outline-primary" data-bs-dismiss="modal" onclick="function () {
                                                          location.reload()
                                                        }">Fermer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="dataTable-bottom">
                                        <div class="dataTable-info">Showing 1 to 10 of 12 entries</div>
                                        <nav class="dataTable-pagination">
                                            <ul class="dataTable-pagination-list"></ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
</main>
<?php require '../../layouts/dashboard-layout-footer.php' ?>
<script>
    function modifierDirection(data, ids) {
        let id = "close"+ids
        categorie = "Directeur"
        action = "modifier"
        const modal = document.getElementById(data);
        let selects = modal.getElementsByTagName("select")
        let inputs = modal.getElementsByTagName("input")
        direction = inputs[0].value
        directeur = selects[0].value
        code = inputs[1].value

        datas = {
            id: ids,
            categorie: categorie,
            action: action,
            codeDirection: code,
            directionName: direction,
            idDirecteur: directeur
        }
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../traitements/direction-traitement.php", true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === XMLHttpRequest.DONE) {
                if (xhttp.status === 200) {
                    const response = JSON.parse(xhttp.responseText);
                    document.getElementById(id).click();
                    // document.getElementById("success1").click();
                    location.reload()
                    setTimeout(function () {
                        document.getElementById("success1").click()
                    }, 10000)
                } else {
                    console.error("Request failed:", xhttp.status);
                }
            }
        };
        xhttp.send(JSON.stringify(datas));
    }
</script>
