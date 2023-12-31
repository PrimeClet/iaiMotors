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
    $dataEmploye = $employes->getAllEmployes()
?>
<?php require '../../layouts/dashboad-layout-header.php' ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../dashboard.php">Accueil</a></li>
                <li class="breadcrumb-item active">Liste Employés</li>
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
                                <a href="../administration/ajouter-employer.php" class="btn btn-outline-primary btn-sm mr-4"><i class="bi bi-person-fill-add"></i> Ajouter Employe</a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Liste des Employés <span>| Aujourd'hui</span></h5>

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
                                                <a href="#" class="dataTable-sorter">Matricule</a>
                                            </th>
                                            <th scope="col" data-sortable="" style="width: 15.9635%;">
                                                <a href="#" class="dataTable-sorter">Nom</a>
                                            </th>
                                            <th scope="col" data-sortable="" style="width: 15.1772%;">
                                                <a href="#" class="dataTable-sorter">Prenom</a>
                                            </th>
                                            <th scope="col" data-sortable="" style="width: 10.89134%;">
                                                <a href="#" class="dataTable-sorter">categorie</a>
                                            </th>
                                            <th scope="col" data-sortable="" style="width: 19.0919%;">
                                                <a href="#" class="dataTable-sorter">direction</a>
                                            </th>
                                            <th scope="col" data-sortable="" style="width: 15.0919%;">
                                                <a href="#" class="dataTable-sorter">service</a>
                                            </th>
                                            <th scope="col" data-sortable="" style="width: 15.0919%;">
                                                <a href="">actions</a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($dataEmploye as $data) { ?>
                                         <tr <?php if($data->status === 0) { ?> >
                                            <th scope="row" style="vertical-align: middle;">
                                                <a href="#"><?= $data->Matricule ?></a>
                                            </th>
                                            <td style="vertical-align: middle;"><?= $data->Nom_employer ?></td>
                                            <td style="vertical-align: middle;"><?= $data->Prenom_employer ?></td>
                                            <td style="vertical-align: middle;">
                                                <?php if ($data->Categorie === "directeur" || $data->Categorie === "Directeur") { ?>
                                                    <span class="badge bg-success"><?=$data->Categorie?></span>
                                                <?php }?>
                                                <?php if ($data->Categorie === "technicien" || $data->Categorie === "Technicien") { ?>
                                                    <span class="badge bg-warning text-dark"><?=$data->Categorie?></span>
                                                <?php }?>
                                                <?php if ($data->Categorie === "employe" || $data->Categorie === "Employe") { ?>
                                                    <span class="badge bg-secondary text-dark"><?=$data->Categorie?></span>
                                                <?php }?>
                                                <?php if ($data->Categorie === "chef service" || $data->Categorie === "Chef Service") { ?>
                                                    <span class="badge bg-info text-dark"><?=$data->Categorie?></span>
                                                <?php }?>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <?php echo $directions->getDirection($data->Id_direction)[0]->Nom_direction ?>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <?php echo $services->getService($data->Id_service)[0]->Nom_service; ?>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <p class="d-flex gap-1">
                                                    <a href="employe-details.php?id=<?= $data->Id_employer ?>" class="btn btn-outline-success btn-sm"><i class="bi bi-eye-fill"></i></a>
                                                    <button  class="btn btn-outline-danger btn-sm"><i class="bi bi-person-x" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $data->Id_employer ?>"></i></button>
                                                    <a href="modifier-employe.php?id=<?= $data->Id_employer ?>"  class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                                </p>
                                            </td>
                                             <div class="modal fade" id="verticalycentered<?= $data->Id_employer ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                                 <div class="modal-dialog modal-dialog-centered">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h5 class="modal-title">Supprimer employé</h5>
                                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                         </div>
                                                         <div class="modal-body">
                                                             <div class="d-flex flex-row align-items-center">
                                                                 <img src="../../assets/images/remove.svg" alt="" class="mx-auto" width="50%" height="30%">
                                                             </div>
                                                             <br>
                                                             <h2 class="my-3 text-center">Êtes-vous sûre de vouloir Supprimer?</h2>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button type="button" id="close<?= $data->Id_employer ?>" class="btn btn-outline-primary" data-bs-dismiss="modal">Annuler</button>
                                                             <button type="button" class="btn btn-outline-danger" onclick="supprimerUser(<?= $data->Id_employer ?>, '<?= $data->Categorie ?>', <?= $data->Id_service ?>, <?= $data->Id_direction ?>)">Supprimer</button>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>

                                         </tr <?php } ?>>
                                        <?php } ?>
                                        </tbody>
                                    </table>
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
    function supprimerUser(data, categorie, service, direction) {
        let id = "close"+data
        datas = {
            id: data,
            categorie: categorie,
            idService: service,
            idDirection: direction
        }
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../traitements/supprimerUser.php", true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === XMLHttpRequest.DONE) {
                if (xhttp.status === 200) {
                    const response = JSON.parse(xhttp.responseText);
                    document.getElementById(id).click();
                    location.reload()
                } else {
                    console.error("Request failed:", xhttp.status);
                }
            }
        };
        xhttp.send(JSON.stringify(datas));
    }
</script>
