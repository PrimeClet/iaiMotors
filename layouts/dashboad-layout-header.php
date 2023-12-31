<?php
    $path  = $_SESSION['path'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - IAIMOTORS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= $path; ?>assets/images/logo%20IAI%20MOTORS%202.png" rel="icon">
    <link href="<?= $path; ?>assets/dashboard/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= $path; ?>assets/dashboard/css/root.css" rel="stylesheet">
    <link href="<?= $path; ?>plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="<?= $path; ?>plugins/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= $path; ?>plugins/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= $path; ?>plugins/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= $path; ?>plugins/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= $path; ?>plugins/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= $path; ?>assets/dashboard/css/style.css" rel="stylesheet">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= $path; ?>dashboard.php" class="logo d-flex align-items-center">
            <img src="<?= $path; ?>assets/images/logo-iai-motors.gif" alt="">
            <span class="d-none d-lg-block">DashBoard</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        Vous Avez 4 Nouvelles notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Voir tout</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Afficher Toutes Les Notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        Vous Avez 3 Messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Tout Lire</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= $path; ?>assets/dashboard/img/messages-1.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= $path; ?>assets/dashboard/img/messages-2.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= $path; ?>assets/dashboard/img/messages-3.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Lire Tous Les Messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?= $path; ?>assets/dashboard/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Kevin Anderson</h6>
                        <span>Technicien</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Paramètres</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>besoin d'aide?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Deconnexion</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#employe-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Gestions des Employes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="employe-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= $path; ?>views/administration/liste-employes.php">
                        <i class="bi bi-circle"></i><span>Liste des Employés</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $path; ?>views/administration/ajouter-employer.php">
                        <i class="bi bi-circle"></i><span>Ajouter un Employé</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Employes Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#direction-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-buildings"></i><span>Gestions des Directions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="direction-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= $path; ?>views/administration/directions-liste.php">
                        <i class="bi bi-circle"></i><span>Liste des Directions</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Direction Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#service-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-building"></i><span>Gestions des Services</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="service-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= $path; ?>views/administration/services-liste.php">
                        <i class="bi bi-circle"></i><span>Liste des Services</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $path; ?>views/administration/service-ajout.php">
                        <i class="bi bi-circle"></i><span>Ajouter un Service</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Service Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#intervention-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tools"></i><span>Gestion des Interventions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="intervention-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Liste des Interventions</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Nouvelle Intervention</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Interventions Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pannes-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wrench"></i><span>Gestion des Pannes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pannes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= $path; ?>views/administration/pannes-management.php">
                        <i class="bi bi-circle"></i><span>Gestions Pannes des Pannes</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Pannes Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#taches-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wrench-adjustable"></i><span>Gestion des Tâches</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="taches-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= $path; ?>views/administration/taches-management.php">
                        <i class="bi bi-circle"></i><span>Gestion des Tâches</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tâches Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#solutions-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wrench-adjustable-circle"></i><span>Gestion des Solutions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="solutions-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= $path; ?>views/administration/solutions-management.php">
                        <i class="bi bi-circle"></i><span>Gestion des Solutions</span>
                    </a>
                </li>
            </ul>
        </li><!-- End solutions Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#engin-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-car-front"></i><span>Gestion des Engins</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="engin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Liste des Engins</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Ajouter Engin</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Engins Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#commandes-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Gestion des Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="commandes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Liste des Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Ajouter Commande</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Commandes Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#facture-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-text"></i><span>Gestion des Factures</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="facture-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Liste des Factures</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Ajouter Facture</span>
                    </a>
                </li>
            </ul>
        </li><!-- End factures Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#fournisseur-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-rolodex"></i><span>Gestion des Fournisseurs</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="fournisseur-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Liste des Fournisseurs</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Ajouter Un Fournisseur</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Piece Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#rapport-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-bar-graph"></i><span>Gestion des Rapports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="rapport-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Liste des Rapports</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Ajouter Un Rapport</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Rapport Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#piece-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Gestion des Pieces</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="piece-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Liste des Pieces</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Ajouter Une Piece</span>
                    </a>
                </li>
            </ul>
        </li><!-- End fournisseur Nav -->


        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>A-Propos</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

