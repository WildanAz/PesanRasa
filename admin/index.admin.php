<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PesanRasa Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PesanRasa Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard Pemesanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tabel
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="tabelmenu.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Tabel Menu</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tabelpesanan.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Pesanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">





                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">wildan</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../index.php">
                                    <i class="fas  fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Kembali
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    // Contoh hitung jumlah status (pakai koneksi kamu)
                    include 'koneksi_crud.php';

                    function countByStatus($status)
                    {
                        global $conn;
                        $stmt = mysqli_prepare($conn, "SELECT COUNT(*) FROM pesanan WHERE status = ?");
                        mysqli_stmt_bind_param($stmt, "s", $status);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $count);
                        mysqli_stmt_fetch($stmt);
                        return $count;
                    }

                    $totalDiterima = countByStatus('Diterima');
                    $totalDiproses = countByStatus('Diproses');
                    $totalDiantarkan = countByStatus('Diantarkan');
                    $totalSelesai = countByStatus('Selesai');
                    ?>




                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- Diterima -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Pesanan Diterima</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalDiterima ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-inbox fa-2x text-gray-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Diproses -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pesanan
                                                Diproses</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?= $totalDiproses ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hammer fa-2x text-gray-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Diantarkan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pesanan Diantarkan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalDiantarkan ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-motorcycle fa-2x text-gray-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Selesai -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pesanan Selesai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSelesai ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle fa-2x text-gray-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php
                    include 'koneksi_crud.php';

                    // Ambil data pesanan dari database
                    $pesananDiterima = mysqli_query($conn, "SELECT * FROM pesanan WHERE status = 'Diterima'");
                    $pesananDiproses = mysqli_query($conn, "SELECT * FROM pesanan WHERE status = 'Diproses'");
                    $pesananDiantarkan = mysqli_query($conn, "SELECT * FROM pesanan WHERE status = 'Diantarkan'");
                    $pesananSelesai = mysqli_query($conn, "SELECT * FROM pesanan WHERE status = 'Selesai'");
                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pesanan Diterima</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Nomor Meja</th>
                                            <th>Makanan</th>
                                            <th>Minuman</th>
                                            <th>Waktu Pesan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($pesananDiterima)): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                                                <td><?= htmlspecialchars($row['nomor_meja']) ?></td>
                                                <td><?= htmlspecialchars($row['makanan']) ?></td>
                                                <td><?= htmlspecialchars($row['minuman']) ?></td>
                                                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                                                <td><?= htmlspecialchars($row['status']) ?></td>
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pesanan Diproses</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Nomor Meja</th>
                                            <th>Makanan</th>
                                            <th>Minuman</th>
                                            <th>Waktu Pesan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($pesananDiproses)): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                                                <td><?= htmlspecialchars($row['nomor_meja']) ?></td>
                                                <td><?= htmlspecialchars($row['makanan']) ?></td>
                                                <td><?= htmlspecialchars($row['minuman']) ?></td>
                                                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                                                <td><?= htmlspecialchars($row['status']) ?></td>
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pesanan Diantarkan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Nomor Meja</th>
                                            <th>Makanan</th>
                                            <th>Minuman</th>
                                            <th>Waktu Pesan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($pesananDiantarkan)): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                                                <td><?= htmlspecialchars($row['nomor_meja']) ?></td>
                                                <td><?= htmlspecialchars($row['makanan']) ?></td>
                                                <td><?= htmlspecialchars($row['minuman']) ?></td>
                                                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                                                <td><?= htmlspecialchars($row['status']) ?></td>
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pesanan Selesai</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Nomor Meja</th>
                                            <th>Makanan</th>
                                            <th>Minuman</th>
                                            <th>Waktu Pesan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($pesananSelesai)): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                                                <td><?= htmlspecialchars($row['nomor_meja']) ?></td>
                                                <td><?= htmlspecialchars($row['makanan']) ?></td>
                                                <td><?= htmlspecialchars($row['minuman']) ?></td>
                                                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                                                <td><?= htmlspecialchars($row['status']) ?></td>
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-lg-6 mb-4">

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>