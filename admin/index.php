<?php

require 'php/function.php';
session_start();
if (empty($_SESSION['iduser'])) {
    echo "<script>
    alert('Maaf Anda Belum Login');
    window.location.assign('../login.php');
    </script>";
}
if ($_SESSION['role'] != 'admin') {
    echo "<script>
    alert('Maaf Anda Bukan Sesi admin');
    window.location.assign('../login.php');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mirorim</title>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link href="../css/styles.css" rel="stylesheet" />
    <style>
        .zoomable {
            width: 100px;
        }

        .zoomable:hover {
            transform: scale(2.8);
            transition: 0.3s ease;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Toko Mirorim</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-6">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#"><?= $_SESSION['nama_user'];?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Toko</div>
                        <a class="nav-link" href="index.php?url=task">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Task Pending
                            </a>
                        <a class="nav-link" href="index.php?url=product">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Product
                        </a>
                        <a class="nav-link" href="index.php?url=refill">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Req Gudang Refill
                        </a>
                        <a class="nav-link" href="index.php?url=request">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                           Req Gudang Request
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-pen-alt"></i></div>
                            Approval
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php?url=approve">Approve Item</a>
                                <a class="nav-link" href="index.php?url=approveadmin">Approve Admin</a>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="medium">Logged in as: <?= $_SESSION['nama_user'];?></div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>

                <?php
                $file = @$_GET['url'];
                if (empty($file)) {
                    echo " <div class='card'>
                    <div class='card-body text-center'>
                    <p class='card-text'><h4>Selamat Datang di Halaman Toko.</h4> </p>
                    </div>";
                } else {
                    include $file . '.php';
                }

                ?>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
    
</body>

</html>