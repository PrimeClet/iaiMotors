<?php
session_start();
$_SESSION['path'] = "../../";
require_once "../../models/Panne.php";
require_once "../../models/Solution.php";
require_once "../../models/Tache.php";


$pannes = new Panne();
$taches = new Tache();
$solutions = new Solution();
$panneDatas = $pannes->getAllPannes();
$solutionDatas = $solutions->getAllSolutions();
$tacheDatas = $taches->getAllTaches();
?>
<?php require '../../layouts/dashboad-layout-header.php' ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../dashboard.php">Accueil</a></li>
                <li class="breadcrumb-item active">Liste Pannes</li>
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
                                <h5 class="card-title">Pannes <span>| Aujourd'hui</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-wrench""></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= count($panneDatas) ?></h6>
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
                                <h5 class="card-title">Taches <span>| Aujourd'hui</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-wrench-adjustable"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= count($tacheDatas) ?></h6>
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
                                <h5 class="card-title">Solutions <span>| Aujourd'hui</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-wrench-adjustable-circle"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= count($solutionDatas) ?></h6>
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
                                <button class="btn btn-outline-primary btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#ajouter"><i class="bi bi-wrench"></i> Ajouter Panne</button>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Liste des Pannes <span>| Aujourd'hui</span></h5>

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
                                                <th scope="col" data-sortable="" style="width: 15.9111%;">
                                                    <a href="#" class="dataTable-sorter">Code Panne</a>
                                                </th>
                                                <th scope="col" data-sortable="" style="width: 30.9635%;">
                                                    <a href="#" class="dataTable-sorter">Libelle Panne</a>
                                                </th>
                                                <th scope="col" data-sortable="" style="width: 20.1772%;">
                                                    <a href="#" class="dataTable-sorter">Type de Moteur Associé</a>
                                                </th>
                                                <th scope="col" data-sortable="" style="width: 15.0919%;">
                                                    <a href="">actions</a>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($panneDatas as $data) { ?>
                                                <tr <?php if($data->status === 0) { ?> >
                                                    <th scope="row" style="vertical-align: middle;">
                                                        <a href="#"><?= $data->code_panne ?></a>
                                                    </th>
                                                    <td style="vertical-align: middle;"><?= $data->Libelle_panne ?></td>
                                                    <td style="vertical-align: middle;"><?= $data->Type_Engin ?></td>
                                                    <td style="vertical-align: middle;">
                                                        <p class="d-flex gap-1">
                                                            <button  class="btn btn-outline-success btn-sm"><i class="bi bi-eye-fill" data-bs-toggle="modal" data-bs-target="#details<?= $data->Id_panne ?>"></i></button>
                                                            <button  class="btn btn-outline-danger btn-sm"><i class="bi bi-person-x" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $data->Id_panne ?>" ></i></button>
                                                            <button  class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#modify<?= $data->Id_panne ?>"></i></button>
                                                        </p>
                                                    </td>
                                                    <div class="modal fade" id="details<?= $data->Id_panne ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Details Pannes</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="floatingcode" placeholder="Code Panne" value="<?= $data->code_panne ?>" disabled>
                                                                            <label for="floatingcode">Code Panne</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="floatinglibelle" placeholder="libelle panne" value="<?= $data->Libelle_panne ?>" disabled>
                                                                            <label for="floatinglibelle">Libelle Panne</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="moteur" placeholder="Type de Moteur Associé" value="<?= 'Moteur '.$data->Type_Engin ?>" disabled>
                                                                            <label for="moteur">Type de Moteur Associé</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" id="close<?= $data->Id_panne ?>" class="btn btn-outline-primary" data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="button" class="btn btn-outline-danger" >Supprimer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="modify<?= $data->Id_panne ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Modifier Panne</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="floatingcode" placeholder="Code Panne" value="<?= $data->code_panne ?>">
                                                                            <label for="floatingcode">Code Panne</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="floatinglibelle" placeholder="libelle panne" value="<?= $data->Libelle_panne ?>">
                                                                            <label for="floatinglibelle">Libelle Panne</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <div class="col-md-12 my-2">
                                                                            <div class="form-floating mb-3">
                                                                                <select class="form-select" id="floatingDirecteur" aria-label="Directeur" name="directeur">
                                                                                    <option value="leger" <?php if ($data->Type_Engin === 'leger') { echo "selected";} ?>>Moteur Leger</option>
                                                                                    <option value="lourd" <?php if ($data->Type_Engin === 'lourd') { echo "selected";} ?>>Moteur Lourd</option>
                                                                                </select>
                                                                                <label for="floatingDirecteur">Type de Moteur Associe</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 my-2">
                                                                        <h6 class="">Ajouter Une Description</h6>

                                                                        <!-- Quill Editor Default -->
                                                                        <textarea id="description-modify" class="form-control">
                                                                            <?= $data->description ?>
                                                                        </textarea>
                                                                        <!-- End Quill Editor Default -->

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="close<?= $data->Id_panne ?>" class="btn btn-outline-primary" data-bs-dismiss="modal">Annuler</button>
                                                                        <button type="button" class="btn btn-outline-danger" onclick="modifierPanne('modify<?= $data->Id_panne ?>', <?= $data->Id_panne ?>)">Modifier</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </tr <?php } ?>>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <div class="modal fade" id="ajouter" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ajouter Panne</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12 my-2">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="floatingcode" placeholder="Code Panne">
                                                                <label for="floatingcode">Code Panne</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 my-2">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="floatinglibelle" placeholder="libelle panne">
                                                                <label for="floatinglibelle">Libelle Panne</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 my-2">
                                                            <div class="col-md-12 my-2">
                                                                <div class="form-floating mb-3">
                                                                    <select class="form-select" id="floatingDirecteur" aria-label="Directeur" name="directeur">
                                                                        <option value="leger" >Moteur Leger</option>
                                                                        <option value="lourd" >Moteur Lourd</option>
                                                                    </select>
                                                                    <label for="floatingDirecteur">Type de Moteur Associe</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 my-2">
                                                            <h6 class="">Ajouter Une Description</h6>

                                                            <!-- Quill Editor Default -->
                                                            <textarea id="description-add" class="form-control">

                                                            </textarea>
                                                            <!-- End Quill Editor Default -->

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" id="closeAdd" class="btn btn-outline-primary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="button" class="btn btn-outline-success" onclick="ajouterPanne()">Ajouter</button>
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
    tinymce.init({
        selector: 'textarea#description-modify'
    });
    tinymce.init({
        selector: 'textarea#description-add'
    });

    function modifierPanne(data, ids) {
        let id = "close"+ids
        action = "modifier"
        const modal = document.getElementById(data);
        let selects = modal.getElementsByTagName("select")
        let inputs = modal.getElementsByTagName("input")
        codePanne = inputs[0].value
        typeMoteur = selects[0].value
        nomPanne = inputs[1].value
        const editor = tinymce.activeEditor;
        const description = editor.getContent();

        datas = {
            id: ids,
            action: action,
            codePanne: codePanne,
            typeMoteur: typeMoteur,
            nomPanne: nomPanne,
            description: description
        }
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../traitements/pannes-traitements.php", true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === XMLHttpRequest.DONE) {
                if (xhttp.status === 200) {
                    const response = JSON.parse(xhttp.responseText);
                    document.getElementById(id).click();
                    // document.getElementById("success1").click();
                    location.reload()
                } else {
                    console.error("Request failed:", xhttp.status);
                }
            }
        };
        xhttp.send(JSON.stringify(datas));
    }

    function ajouterPanne() {
        let id = "closeAdd"
        action = "ajouter"
        const modal = document.getElementById("ajouter");
        let selects = modal.getElementsByTagName("select")
        let inputs = modal.getElementsByTagName("input")
        codePanne = inputs[0].value
        typeMoteur = selects[0].value
        nomPanne = inputs[1].value
        const editor = tinymce.activeEditor;
        const description = editor.getContent();

        datas = {
            action: action,
            codePanne: codePanne,
            typeMoteur: typeMoteur,
            nomPanne: nomPanne,
            description: description
        }
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../traitements/pannes-traitements.php", true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === XMLHttpRequest.DONE) {
                if (xhttp.status === 200) {
                    const response = JSON.parse(xhttp.responseText);
                    document.getElementById(id).click();
                    // document.getElementById("success1").click();
                    location.reload()
                } else {
                    console.error("Request failed:", xhttp.status);
                }
            }
        };
        xhttp.send(JSON.stringify(datas));
    }
</script>
